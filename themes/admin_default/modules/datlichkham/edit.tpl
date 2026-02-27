<!-- BEGIN: main -->
<div class="table-responsive">
    <h3 class="text-center mb-3">Chỉnh sửa lịch khám</h3>
    <form class="navbar-form" method="post" action="">
        <table class="table">
            <tr>
                <td style="width: 200px;"><strong>Họ tên bệnh nhân</strong> <sup class="text-danger">(*)</sup></td>
                <td><input type="text" name="namebn" class="form-control w300" value="{DATA.namebn}" required></td>
            </tr>
            <tr>
                <td><strong>Số điện thoại</strong> <sup class="text-danger">(*)</sup></td>
                <td><input type="text" name="sdt" class="form-control w300" value="{DATA.sdt}" required></td>
            </tr>
            <tr>
                <td><strong>Bệnh / Triệu chứng</strong> <sup class="text-danger">(*)</sup></td>
                <td>
                    <select name="benh" id="benh" class="form-control w300" required>
                        <option value="">-- Chọn bệnh/triệu chứng --</option>
                        <!-- BEGIN: benh_option -->
                        <option value="{BENH_OPTION.value}"{BENH_OPTION.selected}>{BENH_OPTION.value}</option>
                        <!-- END: benh_option -->
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Bác sĩ</strong> <sup class="text-danger">(*)</sup></td>
                <td>
                    <select name="bacsi" id="bacsi" class="form-control w300" required>
                        <option value="">-- Chọn bác sĩ --</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input name="submit_edit" type="submit" value="Lưu thay đổi" class="btn btn-primary w150">
                    <a href="{BACK_URL}" class="btn btn-default w150" style="margin-left: 10px;">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<script type="text/javascript">
    var doctorsData = {DOCTORS_JSON};
    var currentBacsi = '{CURRENT_BACSI}';

    function loadDoctors(selectedBenh, selectBacsi) {
        var bacsiSelect = document.getElementById('bacsi');
        bacsiSelect.innerHTML = '';

        if (selectedBenh === '') {
            bacsiSelect.innerHTML = '<option value="">-- Vui lòng chọn bệnh/triệu chứng trước --</option>';
            bacsiSelect.disabled = true;
            return;
        }

        var filteredDoctors = doctorsData.filter(function(doc) {
            return doc.benh === selectedBenh;
        });

        if (filteredDoctors.length === 0) {
            bacsiSelect.innerHTML = '<option value="">-- Không có bác sĩ nào --</option>';
            bacsiSelect.disabled = true;
        } else {
            bacsiSelect.innerHTML = '<option value="">-- Chọn bác sĩ --</option>';
            filteredDoctors.forEach(function(doc) {
                var option = document.createElement('option');
                option.value = doc.name;
                option.textContent = doc.name;
                if (doc.name === selectBacsi) {
                    option.selected = true;
                }
                bacsiSelect.appendChild(option);
            });
            bacsiSelect.disabled = false;
        }
    }

    // Load bác sĩ khi trang vừa mở (giữ lại giá trị cũ)
    var benhSelect = document.getElementById('benh');
    if (benhSelect.value !== '') {
        loadDoctors(benhSelect.value, currentBacsi);
    }

    // Load lại khi đổi bệnh
    benhSelect.addEventListener('change', function() {
        loadDoctors(this.value, '');
    });
</script>
<!-- END: main -->
