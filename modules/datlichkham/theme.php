<?php

if (!defined('NV_IS_MOD_DATLICHKHAM')) {
    exit('Stop!!!');
}

/**
 * Hiển thị form đặt lịch khám
 */
function nv_datlichkham_form($array_benh, $array_bacsi)
{
    global $module_name, $lang_module, $lang_global, $module_info, $meta_property, $client_info, $page_config, $global_config;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    // Truyền danh sách bệnh/khoa vào dropdown
    if (!empty($array_benh)) {
        foreach ($array_benh as $benh) {
            $xtpl->assign('BENH', $benh);
            $xtpl->parse('main.benh_option');
        }
    }

    // Truyền danh sách bác sĩ dạng JSON để JS xử lý
    $xtpl->assign('DOCTORS_JSON', json_encode($array_bacsi));

    $xtpl->parse('main');

    return $xtpl->text('main');
}

/**
 * Hiển thị danh sách lịch khám đã đặt
 */
function nv_datlichkham_list($array_data)
{
    global $module_name, $lang_module, $lang_global, $module_info, $meta_property, $client_info, $page_config, $global_config;

    $xtpl = new XTemplate('list.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    if (!empty($array_data)) {
        foreach ($array_data as $value) {
            $xtpl->assign('DATA', $value);
            $xtpl->parse('main.loop');
        }
    }

    $xtpl->parse('main');

    return $xtpl->text('main');
}
