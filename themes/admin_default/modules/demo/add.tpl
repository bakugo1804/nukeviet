<!-- BEGIN: main -->
<div class="table-responsive">
    <form class="navbar-form" method="post" action="">
        <table>
            <tr>
                <td><strong>Name</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="name" id="title" class="w300 form-control" value="{DATA.name}" ></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Khoa</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="khoa" id="title" class="w300 form-control" value="{DATA.khoa}" ></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>SDT</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="sdt" id="title" class="w300 form-control" value="{DATA.sdt}" ></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Ngày tháng năm sinh</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="birthday" class="w300 form-control" value="{DATA.birthday}" ></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><strong>Địa chỉ</strong><sup class="required">(*)</sup></td>
                <td><input type="text" name="address" class="w300 form-control" value="{DATA.address}" ></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td colspan="3" class="text-center">
                    <input name="submit1" type="submit" value="{LANG.save}" class="btn btn-primary w100">
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- END: main -->