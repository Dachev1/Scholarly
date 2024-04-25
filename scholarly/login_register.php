<?php
require_once 'db/config_session.inc.php';
require_once 'signup_includes/signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login_register_style.css">
    <link rel="stylesheet" href="css/overflow_hidden.css">
    <title>Login Page | Register Page</title>
    <link rel="icon" href="img/book.png">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="signup_includes/signup.inc.php">
                <h1>Създайте акаунт</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> -->
                <!-- <span>или използвайте имейла си</span> -->

                <input type="text" name="username" id="username" placeholder="Потребителско име" required>
                <input type="email" name="email" placeholder="Имейл" required>
                <input type="password" name="password" placeholder="Парола" required>
                <button type="submit" name="register">Регистрация</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" action="login_includes/login.inc.php">
                <h1>Вход</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> -->
                <!-- <span>or use your email password</span> -->
                <input type="text" name="username" placeholder="Потребителско име" required>
                <!-- <input type="email" name="email" placeholder="Email"> -->
                <input type="password" name="password" placeholder="Парола" required>
                <button type="submit" name="login">Вход</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Добре дошли</h1>
                    <p>Ако имате вече съществуващ акаунт можете да го използвате</p>
                    <button class="hidden" id="login">Вход</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Здравей</h1>
                    <p>Регистрирайте се за да използвате всички функции на сайта</p>
                    <button class="hidden" id="register">Регистрация</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login_register_style.js"></script>
</body>

</html>