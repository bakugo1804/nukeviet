<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="w100">
            <col span="1">
            <col span="2" class="w150">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap text-center">STT</th>
                <th class="text-nowrap text-center">Họ và tên</th>
                <th class="text-nowrap text-center">Khoa</th>
                <th class="text-nowrap text-center">SDT</th>
                <th class="text-nowrap text-center">Ngày tháng năm sinh</th>
                <th class="text-nowrap text-center">Địa chỉ</th>
                <th class="text-nowrap text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr class="text-center">
                <td class="text-nowrap">{DATA.id}</td>
                <td class="text-nowrap">{DATA.name}</td>
                <td class="text-nowrap">{DATA.khoa}</td>
                <td class="text-nowrap">{DATA.sdt}</td>
                <td class="text-nowrap">{DATA.birthday}</td>
                <td class="text-nowrap">{DATA.address}</td>
                <td class="text-nowrap">
                    <a href="{DATA.url_edit}" class="btn btn-sm btn-primary" title="Sửa"><i class="fa fa-edit"></i> Sửa</a>
                    <a href="{DATA.url_del}" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?');"><i class="fa fa-trash"></i> Xóa</a>
                </td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->
