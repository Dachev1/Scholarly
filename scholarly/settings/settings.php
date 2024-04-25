<?php
require_once '../db/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/overflow_hidden.css">
    <link rel="stylesheet" href="../css/add_product.css">
    <link rel="stylesheet" href="../css/settings.css">
    <title>Scholarly</title>
    <link rel="icon" href="img/book.png">

</head>

<body>
    <?php
    require '../elements/navbar.php';
    $slash = "../";
    navbar($slash)
    ?>
    <div class="container">
        <h1>Настройки</h1>
        <hr class="settings_hr">

        <!-- <div class="language setting">
            <h1>Език</h1>
        </div> -->

        <form action="update_img/update_img.php" method="post" enctype="multipart/form-data">
            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Добавете сника</button>

                    <div class="image-upload-wrap">

                        <input class="file-upload-input" type='file' id="image" name="image" onchange="readURL(this);" accept="image/*" />

                        <div class="drag-text">
                            <h3>Поставете вашата снимка тук</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <span class="image-title">Качена снимка</span>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Качване" class="submit-btn">
                
                <script src="../js/upload_img.js"></script>
        </form>


    </div>



</body>

</html>