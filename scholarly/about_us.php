<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Екип</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/about_us.css">
</head>

<body>
	<?php
	require 'elements/navbar.php';
	$slash = "";
	navbar($slash)
	?>

	<section class="team">
		<div class="center">
			<h1>Екипът ни</h1>
		</div>

		<div class="team-content">
			<div class="box">
				<img src="img/dachev.jpg">
				<h3>Иван</h3>
			</div>

			<div class="box">
				<img src="img/aram.jpg">
				<h3>Арам</h3>
			</div>
		</div>
		</div>
	</section>

</body>

</html>