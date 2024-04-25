<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

$productId = isset($_GET['id']) ? $_GET['id'] : null;
$username = isset($_GET['user']) ? $_GET['user'] : null;

if($productId){
    $sql = "SELECT * FROM products WHERE product_id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productId', $productId);
    $stmt->execute();

    // Дали продукта съществува
    if ($stmt->rowCount() > 0) {
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender_username = $_SESSION['user_username'];
    $receiver_username = $_POST['receiver_username'];
    $product_id = $product['product_id'];

    $message_content = $_POST['message_content'];

    $answer = false;

    $stmt = $pdo->prepare("INSERT INTO messages (sender_username, receiver_username, product_id, message_content, answer) VALUES (:sender_username, :receiver_username, :product_id, :message_content, :answer)");
    $stmt->bindParam(":sender_username", $sender_username);
    $stmt->bindParam(":receiver_username", $receiver_username);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->bindParam(":message_content", $message_content);
    $stmt->bindParam(":answer", $answer);
    $result = $stmt->execute();

    if ($result) {
        // При успешно изпратено съобщение
        header("Location: ../chat_function/view_message.php?user=" . urlencode($receiver_username));
        exit();
    } else {
        // Грешка
        echo "Възникна грешка.";
    }
}
}
} if ($username) {
    $sql = "SELECT * FROM products WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Дали продукта съществува
    if ($stmt->rowCount() > 0) {
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender_username = $_SESSION['user_username'];
    $receiver_username = $_POST[$user_chat];
    $product_id = $product['product_id'];

    $message_content = $_POST['message_content'];

    $answer = false;

    $stmt = $pdo->prepare("INSERT INTO messages (sender_username, receiver_username, product_id, message_content, answer) VALUES (:sender_username, :receiver_username, :product_id, :message_content, :answer)");
    $stmt->bindParam(":sender_username", $sender_username);
    $stmt->bindParam(":receiver_username", $receiver_username);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->bindParam(":message_content", $message_content);
    $stmt->bindParam(":answer", $answer);
    $result = $stmt->execute();

    if ($result) {
        // При успешно изпратено съобщение
        header("Location: ../chat_function/view_message.php?user=" . urlencode($receiver_username));
        exit();
    } else {
        // Грешка
        echo "Възникна грешка.";
    }
}
}
}

