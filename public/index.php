<?php

namespace think;

define('INSTALL_SQL', TRUE);
if (INSTALL_SQL) {
    $lock_file = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'installsql.lock';
    if (!file_exists($lock_file)) {
        header('Location:/installsql.php');
        exit;
    }
}

require __DIR__ . '/../thinkphp/base.php';

Container::get('app')->run()->send();
