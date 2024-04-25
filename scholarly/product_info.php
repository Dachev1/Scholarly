<?php

require_once 'db/config_session.inc.php';

//Взимане на ID от URL
$productId = isset($_GET['id']) ? $_GET['id'] : null;
//Проверка дали има ID
if ($productId) {

    require_once 'db/dbh.inc.php';

    $sql = "SELECT * FROM products WHERE product_id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('productId', $productId);
    $stmt->execute();

    // Дали продукта съществува
    if ($stmt->rowCount() > 0) {
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/index_style.css">
            <link rel="stylesheet" href="css/navbar.css">
            <link rel="stylesheet" href="css/overflow_hidden.css">
            <title>Детайли за продукта</title>
            <link rel="icon" href="img/book.png">
        </head>

        <body>
            <style>
                .product-img {
                    text-align: center;
                }

                .product-text p .description {
                    display: block;
                    overflow-y: auto;
                    margin-bottom: 10px;
                }
            </style>
            <?php
            require 'elements/navbar.php';
            $slash = "";
            navbar($slash)
            ?>
            <div class="wrapper">
                <div class="product-img">
                    <?php echo "<img src='users_img/" . $product['image'] . "' alt='book image' height='350' max-width='466.66' margin-left='auto' margin-right='auto'>" ?>
                </div>
                <div class="product-info">
                    <div class="product-text">
                        <!-- <p> <?php echo $product['title']; ?></p> -->
                        <h1><?php echo $product['subject']; ?></h1>
                        <h2><?php echo $product['Pcondition']; ?></h2>
                        <p>Публикувано от: <?php echo $product['username']; ?></p>
                        <p class="description">Описание: <?php echo $product['description']; ?></p>
                        <p>ID на продукта: <?php echo $product['product_id']; ?></p>
                    </div>
                    <?php 
                    if (isset($_SESSION["user_username"]) && $product['username'] === $_SESSION['user_username']) {
                        echo "<form action='db/delete_product.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='" . $product['product_id'] . "'>";
                        echo "<input class='button' type='submit' value='Изтрий'>";
                        echo "</form>";
                    }
                    
                    if (isset($_SESSION["user_username"]) && $product['username'] !== $_SESSION['user_username']) { ?>
                        <?php echo "<form action='db/send_massage.php?id=" . $product['product_id'] . "' method='post'>"; ?>
                        <input type="hidden" name="receiver_username" value="<?php echo $product['username']; ?>">
                        <input class="comment" type="text" name="message_content" placeholder="Вашето съобщение" autocomplete="off" required></input>
                        <input class="button" type="submit" value="Изпрати">
                        
                        <div class="product-price-btn">
                            <p><span><?php echo $product['price']; ?></span> лв</p>
                        </div>
                    </form>
                    <?php
                    } else {
                    ?>
                        <div class="product-price-btn-bottom">
                            <p><span><?php echo $product['price'];?></span>лв</p>
                        </div>
                        </form>
                    <?php
                    }
                    ?>


                </div>
        </body>
        <script src="js/navigation_manu.js"></script>
        </html>
<?php
    } else {
        echo "Продуктна не е намерен.";
    }
} else {
    echo "ID на продукта липсва.";
}
?>