<?php
require_once 'db/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/overflow_hidden.css">

  <title>Scholarly</title>
  <link rel="icon" href="img/book.png">
 
</head>

<body>
  <?php
  require 'elements/navbar.php';
  navbar($slash)
  ?>
  <!-- main -->
  <div class="container">
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>8</h2>
          <h3>Клас</h3>
          <a href="8_grade/8_grade.php">Разгледай</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">
          <h2>9</h2>
          <h3>Клас</h3>
          <a href="9_grade/9_grade.php">Разгледай</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">
          <h2>10</h2>
          <h3>Клас</h3>
          <a href="10_grade/10_grade.php">Разгледай</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>11</h2>
          <h3>Клас</h3>
          <a href="11_grade/11_grade.php">Разгледай</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">
          <h2>12</h2>
          <h3>Клас</h3>
          <a href="12_grade/12_grade.php">Разгледай</a>
        </div>
      </div>
    </div>
</body>
</html>