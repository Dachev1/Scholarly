<?php
require_once 'db/config_session.inc.php';
require_once 'db/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вашите продукти</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/grades_view_all.css">
    <link rel="stylesheet" href="css/overflow_hidden.css">
    <link rel="icon" href="img/book.png">
</head>

<body>
    <style>
        div{
            display: flex;
        }
    </style>
    <?php
    require 'elements/navbar.php';
    navbar($slash);
    ?>
    <div class="bg">
        <div class="content">
            <!-- main -->
            <?php

            $username = $_SESSION['user_username'];

            function getProducts(object $pdo)
            {
                $sql = "SELECT * FROM products WHERE username = :user_username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam('user_username', $_SESSION['user_username']);
                $stmt->execute();
                $result = $stmt->fetchAll();

                $counter = 0;
                foreach ($result as $row) {
                    echo "<div class='item'>";
                    echo "<a href='product_info.php?id=" . $row['product_id'] . "'>";
                    echo "<div class='caption'>" . $row['title'] . "</div>";
                    echo "<div class='item_img'><img src='images/" . $row['image'] . "' alt='book image' height='100'></div>";
                    echo "<div class='condition'>" . "Състояние: " . $row['Pcondition'] . "</div>";
                    echo "<div class='from'>" . $row['username'] . "</div>";
                    echo "<div class='price'>" . $row['price'] . " лв" . "</div>";
                    echo "</a>";
                    echo "</div>";

                    $counter++;
                    if ($counter % 4 === 0 && $counter !== count($result)) {
                        echo '</div><br><br><div class="content">';
                    }
                }
                if ($counter == 0) {
                    echo 'Няма учебници';
                }
                echo '</div>';
            }
            getProducts($pdo, $username);
            ?>
                
        </div>
    </div>
</body>

</html>