<?php

if (!defined('NV_IS_MOD_DEMO')) {
    exit('Stop!!!');
}
// lay du lieu 
$array_data = [];

$query = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_demo');
while ($row = $query->fetch()) {
    $array_data[$row['id']] = $row;
}
$contents = nv_demo_list($array_data);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
