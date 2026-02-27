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
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->
