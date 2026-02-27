<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = $lang_module['list'];
$row = [];

// Nếu người dùng bấm nút Lưu
if ($nv_Request->isset_request('submit1', 'post')) {
    $row['name'] = nv_substr($nv_Request->get_title('name', 'post', ''), 0, 250);
    $row['khoa'] = nv_substr($nv_Request->get_title('khoa', 'post', ''), 0, 250);
    $row['sdt'] = nv_substr($nv_Request->get_title('sdt', 'post', ''), 0, 250);
    $birthday_str = $nv_Request->get_title('birthday', 'post', '');
    $birthday_arr = explode('/', $birthday_str);
    $row['birthday'] = (count($birthday_arr) == 3) ? mktime(0, 0, 0, intval($birthday_arr[1]), intval($birthday_arr[0]), intval($birthday_arr[2])) : 0;
    $row['address'] = nv_substr($nv_Request->get_title('address', 'post', ''), 0, 250);

    // xu ly luu du lieu
    $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (
                name, khoa, sdt, birthday, address) VALUES (
                :name, :khoa, :sdt, :birthday, :address)';
   
    $sth = $db->prepare($_sql);
    $sth->bindParam(':name', $row['name'], PDO::PARAM_STR);
    $sth->bindParam(':khoa', $row['khoa'], PDO::PARAM_STR);
    $sth->bindParam(':sdt', $row['sdt'], PDO::PARAM_STR);
    $sth->bindParam(':birthday', $row['birthday'], PDO::PARAM_INT);
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
