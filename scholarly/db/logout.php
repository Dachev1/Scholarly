<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

function make_offline(object $pdo, string $username){
    $query = "UPDATE users SET online = false WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
}


$username = $_SESSION["user_username"];
$query = "UPDATE users SET online = false WHERE username = '$username'";
$pdo->query($query);
session_start();
session_destroy();
header("Location: ../login_register.php");
