<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$ActiveRecord = new \ActiveRecord\ActiveDatabase();
$db_config = array('hostname' => 'localhost', 'username' => 'root', 'password' => 'password', 'database' => 'aa', 'dbdriver' => 'mysqli', 'pconnect' => false, 'db_debug' => true);
// Add Config and give it a name
\ActiveRecord\ActiveDatabase::addConfig("read", $db_config);
$db_ci = \ActiveRecord\ActiveDatabase::get("read");

$log = new SystemLogs\Logs($db_ci);


$log->getLogs();