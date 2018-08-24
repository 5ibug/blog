<?php

header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('PRC');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@set_time_limit(1000);
$root_path = dirname(__FILE__);

$database = include_once dirname($root_path) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
if (!isset($database) || !is_array($database) || empty($database)) {
    exit('请先确认好/config/database.php的数据库连接配置！');
}

$lock_file = dirname($root_path) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'installsql.lock';
if (file_exists($lock_file)) {
    header("Location:/");
    return TRUE;
}

$sql_data = dirname($root_path) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'sql.sql';
if (!file_exists($sql_data)) {
    exit('缺少必要的数据库安装文件，如果希望自己创建数据库，请将index.php中的INSTALL_SQL值修改成FALSE!');
}

$dbHost = $database['hostname'];
$dbPort = $database['hostport'];
$dbName = $database['database'];
$dbUser = $database['username'];
$dbPwd = $database['password'];
$dbPrefix = $database['prefix'];

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 2);
$mysqli->real_connect($dbHost, $dbUser, $dbPwd,$dbName);
$query = file_get_contents($sql_data);

$mysqli->query("SET NAMES 'utf8'");
if ($mysqli->multi_query($query)) {
  do {
    $mysqli->store_result();
  } while ($mysqli->next_result());
}
$mysqli->close();

@touch($lock_file);

if (!unlink(dirname($root_path) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'sql.sql')){
    exit('数据库已安装完成,删除目录下的sql文件失败,为了保证安全您可以手动删除.');
}

header("Location:/");
return TRUE;
