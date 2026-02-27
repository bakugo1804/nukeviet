<?php

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

$module_version = [
    'name' => 'DEMO',
    'modfuncs' => 'main',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.5.07',
    'date' => 'Friday, October 24, 2025 4:00:00 PM GMT+07:00',
    'author' => 'bakugo <cyeng1804@gmail.com>',
    'note' => '',
    'uploads_dir' => [
        $module_upload
    ]
];
