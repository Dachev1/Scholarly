<?php 

declare(strict_types=1);

function check_login_errors(){
    if(isset($_SESSION["error_login"])){
        $errors = $_SESSION["error_login"];


        foreach($errors as $error){
            echo '<h1>' . $error . '</h1>';
        }

        unset($_SESSION["error_login"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<br>';
        echo '<h1 class="success">Успешно влезнахте в акаунта си</h1>';
    }
}