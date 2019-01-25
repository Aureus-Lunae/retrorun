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
				<label>Sort by:
					<?php echo '<select name="sortGame" id="sortGame" size="1" onchange="GetDataFromSearch(`php/gamesearchsort.php?search='.$search.'`, showData);">' ?> 
						<option value="0">&#9660 Release Year </option>
						<option value="1">&#9650 Release Year </option>
						<option value="2">&#9660 Name</option>
						<option value="3">&#9650 Name</option>
					</select>
				</label>
		</div>
		<div id="game_filters_output" class="grid_layout">

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

	<script src="js/datafilters.js"></script>
</body>

</html>