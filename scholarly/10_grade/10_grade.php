<?php
require_once '../db/config_session.inc.php';
require_once '../db/dbh.inc.php';
require_once '../card_print.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/grades.css">
    <link rel="stylesheet" href="../css/overflow_hidden.css">
    <title>10 клас учебници</title>
    <link rel="icon" href="../img/book.png">
</head>

<body>
<?php
            require '../elements/navbar.php';
            $slash = "../";
            navbar($slash)
            ?>

    <div class="main_grades">

        <div class="bg">
            <h2 class="title">Български език и Литература<a class="view_all" href="view_all_10/BEL.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>

                <?php
                $subject = "БЕЛ";
                $grade = 10;

                print_cards($grade, $subject, $pdo);

                ?>
            </div>
        </div>

        <!-- МАТЕМАТИКА -->
        <div class="bg">
            <h2 class="title">Математика<a class="view_all" href="view_all_10/matematika.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php


                $subject = "математика";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!-- СПЕЦИАЛЕН ПРЕДМЕТ -->
        <div class="bg">
            <h2 class="title">Специален предмет<a class="view_all" href="view_all_10/specialen_predmet.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php


                $subject = "специален предмет";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!-- ФИЗИКА -->
        <div class="bg">
            <h2 class="title">Физика<a class="view_all" href="view_all_10/fizika.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "физика";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--ФИЛОСОФИЯ-->
        <div class="bg">
            <h2 class="title">Философия<a class="view_all" href="view_all_10/filosofiq.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "философия";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--ИКОНОМИКА-->
        <div class="bg">
            <h2 class="title">Икономика<a class="view_all" href="view_all_10/ikonomika.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php


                $subject = "икономика";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <div class="bg">
            <h2 class="title">Химия<a class="view_all" href="view_all_10/himiq.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "химия";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--МУЗИКА-->
        <div class="bg">
            <h2 class="title">Музика<a class="view_all" href="view_all_10/muzika.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "музика";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--РИСУВАНЕ-->
        <div class="bg">
            <h2 class="title">Рисуване<a class="view_all" href="view_all_10/risuvane.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "рисуване";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--ИТ-->
        <div class="bg">
            <h2 class="title">Информационни технологии<a class="view_all" href="view_all_10/IT.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "ИТ";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <div class="bg">
            <h2 class="title">История<a class="view_all" href="view_all_10/istoriq.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                        <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "история";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
        <!--БИОЛОГИЯ-->
        <div class="bg">
            <h2 class="title">Биология<a class="view_all" href="view_all_10/biologiq.php">Вижте всички</a></h2>
            <hr class="hr_grades">
            <div class="content">
                <?php
                if (isset($_SESSION["user_username"])) {
                ?>
                    <a href="../add_product.php">
                        <div class="add_item">
                        <a href="../add_product.php">
                                <div class="plus"><img class="img_upload" src="../img/plus.png"></div>
                                <div class="caption">Добавете продукт</div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <?php

                $subject = "биология";
                $grade = 10;

                print_cards($grade, $subject, $pdo);
                ?>
            </div>
        </div>
    </div>
</body>

</html>