<?php
require_once 'db/config_session.inc.php';
require_once 'signup_includes/signup_view.inc.php';
require_once 'login_includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/error_page.css">
    <title>Резултат</title>
</head>

<body>
    <?php
    if (isset($_GET["signup"]) && $_GET["signup"] === "vrf") {
        $email = $_GET['email'];
        $username = $_GET['username'];
    }
    ?>
    <div class="container" id="container">
        <?php
        if (check_signup_errors()) {
            check_signup_errors();
        }

        if (isset($_GET["wait"]) && $_GET["wait"] === "true") {
            echo '<h1>Чакане на верификация</h1>';
        }

        if (check_login_errors()) {
            check_login_errors();
        }
        if (isset($_GET["session"]) && $_GET["session"] === "timeout") {
        ?>
            <h1>Сесията ви изтече</h1>
        <?php } ?>
        <a <?php if (isset($_GET["login"]) && $_GET["login"] === "success") {
            ?> href="index.php" <?php echo '>' ?> <button type="button">Начална страница</button></а>
        <?php  } elseif (isset($_GET["login"]) && $_GET["login"] === "vrf_err") { ?>
            <?php echo '>' ?> <button type="button">Към форма за влизане и регистриране в акаунта</button></а>
        <?php  }
            if (isset($_GET["signup"]) && $_GET["signup"] === "vrf") {
                echo '<a href="email_verification/verification.php?signup=vrf&email=' . urlencode($email) . '&username=' . urlencode($username) . '">';
        ?> <button type="button">Верификация на акаунта</button></а>
        <?php }
            if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
                echo '<a href="login_register.php">';
        ?> <button type="button">Към форма за влизане в акаунта</button></а>
        <?php } else { ?>
            <a href="index.php">
                <?php if (isset($_GET["signup"]) && $_GET["signup"] === "") { ?>
                    <button type="button">Начална страница</button></а>
            <?php
                } 
                 if (isset($_GET["Array"])) { ?>
                    <button type="button">Начална страница</button></а>
            <?php
                }
            } ?>
    </div>
</body>

</html>