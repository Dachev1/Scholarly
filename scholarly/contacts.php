<?php
session_start();

if (isset($_GET['message'])) {
    $message = urlencode($_GET['message']);
    $url = "mailto:scholarlyusers@gmail.com?subject=Ново%20Съобщение&body=$message";
    header("Location: $url");
    exit();
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Contact Us </title>
  <link rel="stylesheet" href="css/contacts.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/overflow_hidden.css">
</head>

<body>
  <?php
  require 'elements/navbar.php';
  $slash = "";
  navbar($slash)
  ?>
<form action="contacts.php">
  <small>Въведете съобщението си и натиснете "Изпрати"</small>
  <div class="wrapper centered">
    <article class="letter">
      <div class="side">
        <h1>Свържете се с нас</h1>
        <p>
          <textarea placeholder="Съобщението Ви" name="message"></textarea>
        </p>
      </div>
      <div class="side">
         <button id="sendLetter" type="submit">Изпрати</button>
        </p>
      </div>
    </article>
    <div class="envelope front"></div>
    <div class="envelope back"></div>
  </div>
  <p class="result-message centered">Благодарим Ви за отзива</p>
  <script src="js/contacts.js"></script>
</form>
</body>

</html>
