<?php 

$host = 'localhost:3306';
$dbname = 'books';
$dbusername = 'scholarly';
$dbpassword = 'NJUO)2Wd.zVU/z6U';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->exec('SET NAMES utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
