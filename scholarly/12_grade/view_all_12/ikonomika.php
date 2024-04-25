<?php
require_once '../../db/config_session.inc.php';
require_once '../../card_print.php';
require_once '../../db/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/grades_view_all.css">
    <title>Икономика</title>
    <link rel="icon" href="../../img/book.png">
</head>

<body>
    <header class="header">
        <a href="../../index.php" class="logo">Scholarly</a>

        <nav class="navbar">
            <a href="../../index.php">Начален екран</a>
            <a href="../../about_us.php">За нас</a>
            <a href="#">Галерия</a>
            <a href="../../contacts.php">Контакти</a>
            <?php
            if (isset($_SESSION["user_username"])) {
            ?>
                <a><?php echo $_SESSION["user_username"] ?></a>
                <a href="../../db/logout.php">Излезте от акаунта си</a>
            <?php
            } else {
            ?>
                <a href="../../login_register.php">Регистирайте се тук</a>
            <?php
            }
            ?>
        </nav>
    </header>
    <hr class="hr_nav">
    <div class="main_grades">

        <div class="bg">
            <h2 class="title">Икономика</h2>
            <hr class="hr_grades">
            <div class="content">
                <?php

                $subject = "икономика";
                $grade = 12;

                print_cards_all($grade, $subject, $pdo);
                ?>
            </div>
        </div>


</body>

</html>