<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASEPATH', 'HERE');
define('DS', DIRECTORY_SEPARATOR);
define('ENVIRONMENT','development');
date_default_timezone_set('Asia/Jakarta');

function database_config(){
    require_once 'application/config/database.php';
    return ($db['default']);
}

$database_config_ci=database_config();

// die();

$database = $database_config_ci['database'];
$user = $database_config_ci['username'];
$pass =  $database_config_ci['password'];
$host =  $database_config_ci['hostname'];
$dir = dirname(__FILE__) . DS . 'schema_backup'.DS.'schema-'.date('Y-m-d-H-i-s').'-'.uniqid().'.sql';




$mysqlDir = 'C:\xampp\mysql\bin';    // Paste your mysql directory here and be happy

// print_r($argv);
// die();

if ($argv[1] == 'export') {
    $mysqldump = $mysqlDir . DS . 'mysqldump';
    echo "\nBacking up database to {$dir} ";
    echo "\n...\n";
    exec("{$mysqldump} --user={$user} --password={$pass} --host={$host}  {$database} --routines --result-file={$dir} 2>&1", $output);

    foreach ($output as $echo) {
        echo "\n";
        echo $echo;
    }
}

// if ($argv[1] == 'import') {
//     $mysqldump = $mysqlDir . DS . 'mysql';
//     echo "\nImporting database from {$dir} to {$database} ";
//     echo "\n...\n";
//     exec("{$mysqldump} --user={$user} --password={$pass} --host={$host} {$database} < {$dir} ", $output);

//     foreach ($output as $echo) {
//         echo "\n";
//         echo $echo;
//     }
// }