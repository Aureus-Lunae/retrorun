<!DOCTYPE html>

<html lang="en-US">
<?php 

	if ($_GET){
		$search = $_GET['search'];
	} else {
		$search = 0;
	}
?>

<head>
	<meta charset="UTF-8" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<meta name="author" content="Erwin Korsten" />
	<meta name="viewport content=" width=device-width, initial-scale=1.0,
	 maximum-scale=1.0" />
	<title>Retro Run</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php	require_once 'php/navbar.php' ?>

	<section id="games">
		<div class="game_wrapper">
			<h1>Games</h1>
		</div>
		<div class="grid_layout">

			<?php require_once 'php/searchgame.php'; ?>

		</div>
	</section>


	<section id="consoles">
		<div class="console_wrapper">
			<h1>Consoles</h1>
		</div>
		<div class="grid_layout">
			<?php require_once 'php/searchconsole.php'; ?>
		</div>
	</section>

	<?php include 'html/sidebar.html' ?>

</body>

</html>