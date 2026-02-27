<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

// $page_title = $lang_module['list'];
$array = [];

// goi csdl
$query = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_demo');
while ($row = $query->fetch()) {
    $array[$row['id']] = $row;
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);

//hien thi du lieu
if (!empty($array)) {
    foreach ($array as $value) {
        $value['birthday'] = nv_date('d/m/Y', $value['birthday']);
        $xtpl->assign('DATA', $value);
        $xtpl->parse('main.loop');
    }
}


$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
