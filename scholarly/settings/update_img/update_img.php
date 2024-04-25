<?php
require_once '../../db/config_session.inc.php';

// Check if the image file was uploaded without errors
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get image details
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];

    // Check image size
    if ($image_size > 10485760) { // 10 MB limit
        $error_message = "Изображението е твърде голямо. Моля, изберете друго изображение.";
        $_SESSION['error_message'] = $error_message;
        header("Location: ../../add_product.php?error=imageSizeTooBig");
        exit();
    }

    // Save the uploaded image
    $upload_directory = "users_profile_img/";
    $move_directory = "../../users_profile_img/";
    $image_path = $upload_directory . $image_name;
    $move_path = $move_directory . $image_name;
    move_uploaded_file($image_tmp_name,$move_path);

    // Update the image path in the users table
    $username = $_SESSION["user_username"]; // Assuming you have the username stored in session

    // Perform database operations to update the image path
    require_once '../../db/dbh.inc.php'; // Assuming this file contains database connection

    $query = "UPDATE users SET img = :image_path WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':image_path', $image_path);
    $stmt->bindParam(':username', $username);

    if ($stmt->execute()) {
        function get_user(object $pdo, string $username){
            $query = "SELECT * FROM users WHERE username = :username;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        $result = get_user($pdo, $username);
        // Image path updated successfully
        $_SESSION['success_message'] = "Изображението е качено успешно.";
        $_SESSION['user_img'] = $result["img"];
        header("Location: ../../index.php");
        exit();
    } else {
        // Error occurred while updating image path
        $_SESSION['error_message'] = "Грешка при качването на изображението. Моля, опитайте отново.";
        header("Location: ../../add_product.php?error=uploadError");
        exit();
    }
} else {
    // No file uploaded or some error occurred during file upload
    $_SESSION['error_message'] = "Грешка при качването на изображението. Моля, опитайте отново.";
    header("Location: ../../add_product.php?error=uploadError");
    exit();
}
?>
