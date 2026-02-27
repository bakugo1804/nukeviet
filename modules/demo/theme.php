<?php

if (!defined('NV_IS_MOD_DEMO')) {
    exit('Stop!!!');
}

function nv_demo_list($array_data)
{
    global $module_name, $lang_module, $lang_global, $module_info, $meta_property, $client_info, $page_config, $global_config;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    // $xtpl->assign('CONTENT', $row);

    if (!empty($array_data)) {
    $stt = 1;
    foreach ($array_data as $value) {
        $value['stt'] = $stt++;
        $value['birthday'] = nv_date('d/m/Y', $value['birthday']);
        $xtpl->assign('DATA', $value);
        $xtpl->parse('main.loop');
    }
    }
    $xtpl->parse('main');

    return $xtpl->text('main');
}
