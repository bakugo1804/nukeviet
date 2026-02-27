<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$idbn = $nv_Request->get_int('idbn', 'get', 0);
$row = [];

// Lấy dữ liệu hiện tại
if ($idbn > 0) {
    $sth = $db->prepare('SELECT * FROM ' . NV_PREFIXLANG . '_datlichkham WHERE idbn = :idbn');
    $sth->bindParam(':idbn', $idbn, PDO::PARAM_INT);
    $sth->execute();
    $row = $sth->fetch();

    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }
}

// Lấy danh sách bệnh/khoa từ bảng demo
$array_benh = [];
$query = $db->query('SELECT DISTINCT khoa FROM ' . NV_PREFIXLANG . '_demo ORDER BY khoa ASC');
while ($r = $query->fetch()) {
    $array_benh[] = $r['khoa'];
}

// Lấy danh sách bác sĩ từ bảng demo
$array_bacsi = [];
$query = $db->query('SELECT id, name, khoa FROM ' . NV_PREFIXLANG . '_demo ORDER BY name ASC');
while ($r = $query->fetch()) {
    $array_bacsi[] = [
        'id' => $r['id'],
        'name' => $r['name'],
        'benh' => $r['khoa']
    ];
}

// Xử lý khi bấm nút Lưu
if ($nv_Request->isset_request('submit_edit', 'post')) {
    $row['namebn'] = nv_substr($nv_Request->get_title('namebn', 'post', ''), 0, 250);
    $row['sdt'] = nv_substr($nv_Request->get_title('sdt', 'post', ''), 0, 20);
    $row['benh'] = nv_substr($nv_Request->get_title('benh', 'post', ''), 0, 250);
    $row['bacsi'] = nv_substr($nv_Request->get_title('bacsi', 'post', ''), 0, 250);

    $_sql = 'UPDATE ' . NV_PREFIXLANG . '_datlichkham SET namebn = :namebn, sdt = :sdt, benh = :benh, bacsi = :bacsi WHERE idbn = :idbn';
    $sth = $db->prepare($_sql);
    $sth->bindParam(':namebn', $row['namebn'], PDO::PARAM_STR);
    $sth->bindParam(':sdt', $row['sdt'], PDO::PARAM_STR);
    $sth->bindParam(':benh', $row['benh'], PDO::PARAM_STR);
    $sth->bindParam(':bacsi', $row['bacsi'], PDO::PARAM_STR);
    $sth->bindParam(':idbn', $idbn, PDO::PARAM_INT);
    $exe = $sth->execute();

    if ($exe) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }
}

$row['namebn'] = isset($row['namebn']) ? $row['namebn'] : '';
$row['sdt'] = isset($row['sdt']) ? $row['sdt'] : '';
$row['benh'] = isset($row['benh']) ? $row['benh'] : '';
$row['bacsi'] = isset($row['bacsi']) ? $row['bacsi'] : '';

$xtpl = new XTemplate('edit.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('DATA', $row);
$xtpl->assign('BACK_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);

// Truyền danh sách bệnh/khoa vào dropdown
if (!empty($array_benh)) {
    foreach ($array_benh as $benh) {
        $temp = [
            'value' => $benh,
            'selected' => ($benh == $row['benh']) ? ' selected="selected"' : ''
        ];
        $xtpl->assign('BENH_OPTION', $temp);
        $xtpl->parse('main.benh_option');
    }
}

// Truyền danh sách bác sĩ dạng JSON để JS xử lý
$xtpl->assign('DOCTORS_JSON', json_encode($array_bacsi));
$xtpl->assign('CURRENT_BACSI', $row['bacsi']);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
