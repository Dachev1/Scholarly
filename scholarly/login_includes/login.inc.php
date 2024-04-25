<?php
require_once '../db/dbh.inc.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        require_once '../db/dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR HANDLERS

        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Оставили сте празни полета!";
        }

        $result = get_user($pdo, $username);

        if (!is_array($result) || (is_array($result) && !is_username_wrong($result)) && is_password_wrong($password, $result["password"])) {
            $errors["login_wrong"] = "Невалидни входни данни!";
        }
        $result = check_if_vrf($pdo, $username);
        if ($result["vrf"] == 0) {
            $errors["acc_not_vrf"] = "Акаунтът не е верифициран";
        }

        //require_once '../db/config_session.inc.php';

        if ($errors) {
            $_SESSION["error_login"] = $errors;
            $result = check_if_vrf($pdo, $username);
            if ($result['vrf'] == 0) {
                header("Location: ../error_page.php?login=vrf_err");
            }
            if($errors){
                $mark = "?";
            } else {
                $mark = "";
            }
            header("Location: ../error_page.php$mark$errors");
            die();
        }
        $result = get_user($pdo, $username);
        // $newSessionId = session_create_id();
        // $sessionId = $newSessionId . "_" . $result["user_id"];
        // session_id($sessionId);
        make_online($pdo, $username);
        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["user_email"] = $result["email"];
        $_SESSION["user_img"] = $result["img"];

        $_SESSION["last_regeneration"] = time();

        header("Location: ../error_page.php?login=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    if( $errors = $_SESSION["error_login"]){
        $errors = $_SESSION["error_login"];
        $mark = "?";
    } else {
        $errors = "";
    }
    header("Location: ../error_page.php.$mark . $errors");
    die();
    die();
}
