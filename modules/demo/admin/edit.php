<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$id = $nv_Request->get_int('id', 'get', 0);
$row = [];

// Lấy dữ liệu hiện tại
if ($id > 0) {
    $sth = $db->prepare('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id = :id');
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $row = $sth->fetch();

    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }
}

// Xử lý khi bấm nút Lưu
if ($nv_Request->isset_request('submit1', 'post')) {
    $row['name'] = nv_substr($nv_Request->get_title('name', 'post', ''), 0, 250);
    $row['Khoa'] = nv_substr($nv_Request->get_title('Khoa', 'post', ''), 0, 250);
    $row['SDT'] = nv_substr($nv_Request->get_title('SDT', 'post', ''), 0, 250);
    $row['birthday'] = $nv_Request->get_int('birthday', 'post', '');
    $row['address'] = nv_substr($nv_Request->get_title('address', 'post', ''), 0, 250);

    $_sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET name = :name, Khoa = :Khoa, SDT = :SDT, birthday = :birthday, address = :address WHERE id = :id';
    $sth = $db->prepare($_sql);
    $sth->bindParam(':name', $row['name'], PDO::PARAM_STR);
    $sth->bindParam(':Khoa', $row['Khoa'], PDO::PARAM_STR);
    $sth->bindParam(':SDT', $row['SDT'], PDO::PARAM_STR);
    $sth->bindParam(':birthday', $row['birthday'], PDO::PARAM_STR);
    $sth->bindParam(':address', $row['address'], PDO::PARAM_STR);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $exe = $sth->execute();

    if ($exe) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }
}

$row['name'] = isset($row['name']) ? $row['name'] : '';
$row['Khoa'] = isset($row['Khoa']) ? $row['Khoa'] : '';
$row['SDT'] = isset($row['SDT']) ? $row['SDT'] : '';
$row['birthday'] = isset($row['birthday']) ? nv_date('d/m/Y', $row['birthday']) : '';
$row['address'] = isset($row['address']) ? $row['address'] : '';

$xtpl = new XTemplate('edit.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('DATA', $row);
$xtpl->assign('BACK_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
