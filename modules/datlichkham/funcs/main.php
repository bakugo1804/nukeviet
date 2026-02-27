<?php

if (!defined('NV_IS_MOD_DATLICHKHAM')) {
    exit('Stop!!!');
}

$error = '';
$success = '';

// Lấy danh sách bệnh/khoa (lấy từ cột Khoa trong bảng demo)
$array_benh = [];
$array_bacsi = [];

$query = $db->query('SELECT DISTINCT khoa FROM ' . NV_PREFIXLANG . '_demo ORDER BY khoa ASC');
while ($row = $query->fetch()) {
    $array_benh[] = $row['khoa'];
}

// Lấy danh sách bác sĩ (id, name, Khoa) để lọc theo bệnh/khoa
$query = $db->query('SELECT id, name, khoa FROM ' . NV_PREFIXLANG . '_demo ORDER BY name ASC');
while ($row = $query->fetch()) {
    $array_bacsi[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'benh' => $row['khoa']
    ];
}

// Xử lý khi người dùng gửi form đặt lịch
if ($nv_Request->isset_request('submit_datlich', 'post')) {
    $row = [];
    $row['namebn'] = nv_substr($nv_Request->get_title('namebn', 'post', ''), 0, 250);
    $row['sdt'] = nv_substr($nv_Request->get_title('sdt', 'post', ''), 0, 20);
    $row['benh'] = nv_substr($nv_Request->get_title('benh', 'post', ''), 0, 250);
    $row['bacsi'] = nv_substr($nv_Request->get_title('bacsi', 'post', ''), 0, 250);

    // Validate
    if (empty($row['namebn'])) {
        $error = 'Vui lòng nhập họ tên bệnh nhân!';
    } elseif (empty($row['sdt'])) {
        $error = 'Vui lòng nhập số điện thoại!';
    } elseif (empty($row['benh'])) {
        $error = 'Vui lòng chọn bệnh/triệu chứng!';
    } elseif (empty($row['bacsi'])) {
        $error = 'Vui lòng chọn bác sĩ!';
    }

    if (empty($error)) {
        $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_datlichkham (namebn, sdt, benh, bacsi) VALUES (:namebn, :sdt, :benh, :bacsi)';
        $sth = $db->prepare($_sql);
        $sth->bindParam(':namebn', $row['namebn'], PDO::PARAM_STR);
        $sth->bindParam(':sdt', $row['sdt'], PDO::PARAM_STR);
        $sth->bindParam(':benh', $row['benh'], PDO::PARAM_STR);
        $sth->bindParam(':bacsi', $row['bacsi'], PDO::PARAM_STR);
        $exe = $sth->execute();

        if ($exe) {
            $success = 'Đặt lịch khám thành công! Chúng tôi sẽ liên hệ với bạn sớm.';
        } else {
            $error = 'Có lỗi xảy ra, vui lòng thử lại!';
        }
    }
}

$contents = nv_datlichkham_form($array_benh, $array_bacsi);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
