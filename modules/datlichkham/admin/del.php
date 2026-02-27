<?php

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$idbn = $nv_Request->get_int('idbn', 'get', 0);

if ($idbn > 0) {
    $sth = $db->prepare('DELETE FROM ' . NV_PREFIXLANG . '_datlichkham WHERE idbn = :idbn');
    $sth->bindParam(':idbn', $idbn, PDO::PARAM_INT);
    $sth->execute();
}

nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
