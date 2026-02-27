<!-- BEGIN: main -->
<div class="table-responsive">
    <h3 class="text-center mb-3">Danh sách lịch khám</h3>
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="w50">
            <col span="4">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">STT</th>
                <th class="text-nowrap">Họ tên bệnh nhân</th>
                <th class="text-nowrap">SĐT</th>
                <th class="text-nowrap">Bệnh/Triệu chứng</th>
                <th class="text-nowrap">Bác sĩ</th>
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
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->
