<?php
require_once 'db/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/add_product.css">
    <title>Добавете продукт</title>
    <link rel="icon" href="img/book.png">
</head>

<body>
    <?php
    require 'elements/navbar.php';
    $slash = "";
    navbar($slash)
    ?>

    <div class="main_add_product_form">
        <h1>Добавете обява</h1>

        <form action="upload_books/upload.php" method="post" enctype="multipart/form-data">
            <h2 class="offer-header">Какво предлагаш ?</h3>
                <small>Заглавие*</small>

                <br>

                <input class="title" type="text" id="title" name="title" autocomplete="off" required>



                <h2 class="subject-text">Предмет:</h2>

                <div class="select-container">
                    <select class="select-box" id="subject" name="subject" required>
                        <option>Избери предмет</option>

                        <option value="физика">Физика</option>
                        <option value="философия">Философия</option>
                        <option value="БЕЛ">БЕЛ</option>
                        <option value="математика">Математика</option>
                        <option value="икономика">Икономика</option>
                        <option value="химия">Химия</option>
                        <option value="специален предмет">Специален предмет</option>
                        <option value="музика">Музика</option>
                        <option value="рисуване">Рисуване</option>
                        <option value="ИТ">ИТ</option>
                        <option value="география">География</option>
                        <option value="история">История</option>
                        <option value="биология">Биология</option>
                    </select>
                </div>



                <h2 class="description-header">Описание:</h2>
                <textarea class="description" type="text" id="description" name="description" autocomplete="off" required cols="5" rows="5"></textarea>



                <h2 class="pcondition-header">Състояние:</h2>
                <select class="pcondition-select-box" id="Pcondition" name="Pcondition">
                    <option value="Нов">Нов</option>
                    <option value="Използван">Използван</option>
                </select>



                <h2 class="grades-header">Клас:</h2>
                <select class="grades-select-box" id="grades" name="grades">
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>


                <h2 class="image-header">Снимка:</h2>


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

                <h2 class="price-header">Цена:</h2>
                <input class="price" type="number" id="price" name="price" step="0.01" required>

                <br>
                <br>
                <br>

                <button class="button" type="submit" value="add_product" name="add_product">
                    <span class="button-span">Добави продукт</span>
                </button>
        </form>

        <br>
        <br>
    </div>
    <script src="js/upload_img.js"></script>
</body>

</html>