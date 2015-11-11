<?php
error_reporting(E_ALL & ~E_NOTICE);

file_exists("./vendor/autoload.php") or die ("Chybi sdilene knihovny, spustte `composer update`.");
require "./vendor/autoload.php";

// app settings
$deletePassword = "secret";

// Latte init
$tplDir = './templates';
$latte = new Latte\Engine;

// connect db
define('SQL_HOST',     'localhost');
define('SQL_DBNAME',   'etnetera_demo');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

$dsn = 'mysql:dbname='.SQL_DBNAME.';host='.SQL_HOST;
$user = SQL_USERNAME;
$password = SQL_PASSWORD;

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Nepodařilo se připojit k databázi: ' . $e->getMessage());
}

$pdo->query('SET NAMES UTF8');

?>