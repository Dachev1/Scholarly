<?php 

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION["error_signup"])){
        $errors = $_SESSION["error_signup"];


        foreach($errors as $error){
            echo '<h1>' . $error . '</h1>';
        }

        unset($_SESSION["error_signup"]);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<h1 class="success">Успешно създадохте своя акаунт</h1>';
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "vrf") {
        echo '<br>';
        echo '<h1 class="vrf">Верификация на имейла</h1>';
    }
}
