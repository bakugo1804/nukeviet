<!-- BEGIN: main -->
<div class="table-responsive">
    <h3 class="text-center mb-3">Danh sách lịch khám</h3>
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="w50">
            <col span="4">
            <col class="w150">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">STT</th>
                <th class="text-nowrap">Họ tên bệnh nhân</th>
                <th class="text-nowrap">SĐT</th>
                <th class="text-nowrap">Bệnh/Triệu chứng</th>
                <th class="text-nowrap">Bác sĩ</th>
                <th class="text-nowrap">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr class="text-center">
                <td class="text-nowrap">{DATA.stt}</td>
                <td class="text-nowrap">{DATA.namebn}</td>
                <td class="text-nowrap">{DATA.sdt}</td>
                <td class="text-nowrap">{DATA.benh}</td>
                <td class="text-nowrap">{DATA.bacsi}</td>
                <td class="text-nowrap">
                    <a href="{DATA.url_edit}" class="btn btn-sm btn-primary" title="Sửa"><i class="fa fa-edit"></i> Sửa</a>
                    <a href="{DATA.url_del}" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa lịch khám này?');"><i class="fa fa-trash"></i> Xóa</a>
                </td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->
