<?php
require_once '../db/config_session.inc.php';
require_once '../db/dbh.inc.php';

if (isset($_POST['add_product'])) {
    $username = $_SESSION['user_username'];
    $description = $_POST['description'];
    $title = $_POST['title'];
    $grades = $_POST['grades'];
    $subject = $_POST['subject'];
    $condition = $_POST['Pcondition'];
    $price = $_POST['price'];

    $query = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // Проверка дали съществува потребителят
    if ($stmt->rowCount() === 0) {
        $error_message = "Invalid user.";
        $_SESSION['error_message'] = $error_message;
        header("Location: ../add_product.php?error=invalidUser");
        exit();
    }


    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];

    if ($image_size >  10485760) {
        // Лимит 10 mb
        // 10485760 bytes
        $error_message = "Изображението е твърде голямо. Моля, изберете друго изображение.";
        $_SESSION['error_message'] = $error_message;
        header("Location: ../add_product.php?error=imageSizeTooBig");
        exit();
    }

    // Снимката се запазва
    $upload_directory = "../users_img/";
    $image_path = $upload_directory . $image_name;
    move_uploaded_file($image_tmp_name, $image_path);

    // Вкарване на данни в бд
    $stmt = $pdo->prepare("INSERT INTO products (username, image, description, title, subject, Pcondition, grades, price) VALUES (:username, :image_path, :description, :title, :subject, :condition, :grades, :price)");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':image_path', $image_path);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':subject', $subject);
    $stmt->bindValue(':condition', $condition);
    $stmt->bindValue(':grades', $grades);
    $stmt->bindValue(':price', $price);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../resultOfUpload.php?successfulProductUpload");
        exit();
    } else {
        header("Location: ../resultOfUpload.php?errorWithUploadingTheProduct");
        exit();
    }
}
