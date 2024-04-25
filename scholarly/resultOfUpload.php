<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/error_page.css">
    <link rel="stylesheet" href="css/overflow_hidden.css">
    <title><?php if (isset($_GET['successfulProductUpload'])) {
                echo "Успешно добавен продукт";
            }
            if (isset($_GET['errorWithUploadingTheProduct'])) {
                echo "Грешка";
            }
            ?></title>
            <link rel="icon" href="img/book.png">
</head>

<body>
    <?php if (isset($_GET['successfulProductUpload'])) {
    ?>
        <div class="container" id="container">
            <h1>Успешно добавен продукт</h1>
            <a href="index.php"> <button type="button">Начална страница</button></a>
        </div>
        <style>
            .container {
                background: linear-gradient(to right, #ad00e4, #ffc9d6);
            }

            h1 {
                color: #ffffff;
                text-align: center;
                margin-top: 25%;
            }

            button {
                color: #ffffff;
                margin-left: 35%;
            }
        </style>


    <?php } ?>

    <?php
    if (isset($_GET['errorWithUploadingTheProduct'])) {
    ?>
        <div class="container" id="container">
            <h1>Възникна грешка</h1>
            <a href="index.php"> <button type="button">Начална страница</button></a>
        </div>
        <style>
            .container {
                background: linear-gradient(to right, #ad00e4, #ffc9d6);
            }

            h1 {
                color: #ffffff;
                text-align: center;
                margin-top: 25%;
            }

            button {
                color: #ffffff;
                margin-left: 35%;
            }
        </style>
    <?php } ?>
</body>

</html>