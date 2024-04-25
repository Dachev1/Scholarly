<?php
require_once '../db/config_session.inc.php';
require_once '../db/dbh.inc.php';

if (isset($_GET["signup"]) && $_GET["signup"] === "vrf") {
    $email = $_GET['email'];
    $username = $_GET['username'];

    function update_verification_status(object $pdo, string $username, string $email) {
        $query = "UPDATE users SET vrf = 1 WHERE username = :username AND email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    $success = update_verification_status($pdo, $username, $email);

    if ($success) {

        header("Location: ../error_page.php?signup=success");
        exit();
    } else {
        echo 'грешка';
        exit();
    }
}
?>
