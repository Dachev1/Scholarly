<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $default_image_path = "users_profile_img/profile.png";
    try {


        require_once '../db/dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS

        $errors = [];

        if (is_input_empty($username, $password, $email)) {
            $errors["empty_input"] = "Остави ли сте празни полета!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Въведете валиден имейл!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Името е заето!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_taken"] = "Имейлът е зает!";
        }

        require_once '../db/config_session.inc.php';


        if ($errors) {
            $_SESSION["error_login"] = $errors;
            if($errors){
                $mark = "?";
            } else {
                $mark = "";
            }
            header("Location: ../error_page.php$mark$errors");
            die();
        }

        create_user($pdo, $username, $password, $email, $default_image_path);

        header("Location: ../error_page.php?signup=vrf&email=" . urlencode($email) . "&username=" . urlencode($username));

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../error_page.php");
    die();
}
