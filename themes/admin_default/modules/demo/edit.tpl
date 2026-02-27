<!-- BEGIN: main -->
<div class="table-responsive">
    <h3 class="text-center mb-3">Chỉnh sửa bác sĩ</h3>
    <form class="navbar-form" method="post" action="">
        <table>
            <tr>
                <td style="width: 200px;"><strong>Name</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="name" class="w300 form-control" value="{DATA.name}" required></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Khoa</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="Khoa" class="w300 form-control" value="{DATA.Khoa}" required></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>SDT</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="SDT" class="w300 form-control" value="{DATA.SDT}" required></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Ngày tháng năm sinh</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="birthday" class="w300 form-control" value="{DATA.birthday}"></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Địa chỉ</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="address" class="w300 form-control" value="{DATA.address}"></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td colspan="3" class="text-center">
                    <input name="submit1" type="submit" value="Lưu thay đổi" class="btn btn-primary w100">
                    <a href="{BACK_URL}" class="btn btn-default" style="margin-left: 10px;">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- END: main -->
