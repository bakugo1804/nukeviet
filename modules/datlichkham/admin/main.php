<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$array = [];

// Lấy danh sách lịch khám
$query = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_datlichkham ORDER BY idbn DESC');
while ($row = $query->fetch()) {
    $array[$row['idbn']] = $row;
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);

// Hiển thị dữ liệu
if (!empty($array)) {
    $stt = 1;
    foreach ($array as $value) {
        $value['stt'] = $stt++;
        $xtpl->assign('DATA', $value);
        $xtpl->parse('main.loop');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
