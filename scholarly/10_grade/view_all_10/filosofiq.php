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
    <title>Философия</title>
    <link rel="icon" href="../../img/book.png">
</head>

<body>
    <?php
    require '../../elements/navbar.php';
    $slash = "../../";
    navbar($slash)
    ?>
    <div class="main_grades">

        <div class="bg">
            <h2 class="title">Философия</h2>
            <hr class="hr_grades">
            <div class="content">
                <?php

                $subject = "философия";
                $grade = 10;

                print_cards_all($grade, $subject, $pdo);
                ?>
            </div>
        </div>


</body>

</html>