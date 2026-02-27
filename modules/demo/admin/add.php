<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = $lang_module['list'];
$row = [];

// Nếu người dùng bấm nút Lưu
if ($nv_Request->isset_request('submit1', 'post')) {
    $row['name'] = nv_substr($nv_Request->get_title('name', 'post', ''), 0, 250);
    $row['Khoa'] = nv_substr($nv_Request->get_title('Khoa', 'post', ''), 0, 250);
    $row['SDT'] = nv_substr($nv_Request->get_title('SDT', 'post', ''), 0, 250);
    $row['birthday'] = $nv_Request->get_int('birthday', 'post', '');
    $row['address'] = nv_substr($nv_Request->get_title('address', 'post', ''), 0, 250);

    // xu ly luu du lieu
    $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (
                name, Khoa, SDT, birthday, address) VALUES (
                :name, :Khoa, :SDT, :birthday, :address)';
   
    $sth = $db->prepare($_sql);
    $sth->bindParam(':name', $row['name'], PDO::PARAM_STR);
    $sth->bindParam(':Khoa', $row['Khoa'], PDO::PARAM_STR);
    $sth->bindParam(':SDT', $row['SDT'], PDO::PARAM_STR);
    $sth->bindParam(':birthday', $row['birthday'], PDO::PARAM_STR);
    $sth->bindParam(':address', $row['address'], PDO::PARAM_STR);
    $exe = $sth->execute();

    if ($exe) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . 
            '&' . NV_NAME_VARIABLE . '=' . $module_name);
    } 
}

$xtpl = new XTemplate('add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);


$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
