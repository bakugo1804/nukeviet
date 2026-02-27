<!-- BEGIN: main -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mt-4 mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0"><i class="fa fa-calendar-plus-o"></i> Đặt lịch khám bệnh</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="" id="form-datlichkham">
                        <div class="form-group mb-3">
                            <label for="namebn"><strong>Họ và tên bệnh nhân</strong> <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="namebn" id="namebn" class="form-control" placeholder="Nhập họ và tên..." required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sdt"><strong>Số điện thoại</strong> <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại..." required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="benh"><strong>Bệnh / Triệu chứng</strong> <sup class="text-danger">(*)</sup></label>
                            <select name="benh" id="benh" class="form-control" required>
                                <option value="">-- Chọn bệnh/triệu chứng --</option>
                                <!-- BEGIN: benh_option -->
                                <option value="{BENH}">{BENH}</option>
                                <!-- END: benh_option -->
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="bacsi"><strong>Chọn Bác sĩ</strong> <sup class="text-danger">(*)</sup></label>
                            <select name="bacsi" id="bacsi" class="form-control" required disabled>
                                <option value="">-- Vui lòng chọn bệnh/triệu chứng trước --</option>
                            </select>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="submit_datlich" class="btn btn-primary btn-lg">
                                <i class="fa fa-check"></i> Đặt lịch khám
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Danh sách bác sĩ từ database (truyền qua JSON)
    var doctorsData = {DOCTORS_JSON};

    document.getElementById('benh').addEventListener('change', function() {
        var selectedBenh = this.value;
        var bacsiSelect = document.getElementById('bacsi');

        // Xóa các option cũ
        bacsiSelect.innerHTML = '';

        if (selectedBenh === '') {
            bacsiSelect.innerHTML = '<option value="">-- Vui lòng chọn bệnh/triệu chứng trước --</option>';
            bacsiSelect.disabled = true;
            return;
        }

        // Lọc bác sĩ theo bệnh/khoa đã chọn
        var filteredDoctors = doctorsData.filter(function(doc) {
            return doc.benh === selectedBenh;
        });

        if (filteredDoctors.length === 0) {
            bacsiSelect.innerHTML = '<option value="">-- Không có bác sĩ nào trong khoa này --</option>';
            bacsiSelect.disabled = true;
        } else {
            bacsiSelect.innerHTML = '<option value="">-- Chọn bác sĩ --</option>';
            filteredDoctors.forEach(function(doc) {
                var option = document.createElement('option');
                option.value = doc.name;
                option.textContent = doc.name;
                bacsiSelect.appendChild(option);
            });
            bacsiSelect.disabled = false;
        }
    });
</script>
<!-- END: main -->
