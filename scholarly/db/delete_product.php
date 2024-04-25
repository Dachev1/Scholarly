<?php
require_once 'config_session.inc.php';


if (!isset($_SESSION["user_username"])) {

    header("Location: ../login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['product_id'])) {

        $product_id = $_POST['product_id'];

        require_once 'dbh.inc.php';

        $sql = "DELETE FROM products WHERE product_id = :product_id";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();

            header("Location: ../index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
