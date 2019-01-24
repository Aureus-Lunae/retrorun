<!DOCTYPE html>

<html lang="en-US">
<?php 

	if ($_GET){
		$genre_value = $_GET['genre'];
		$console_value = $_GET['console'];
		$publisher_value = $_GET['publisher'];
		$min_players_value = $_GET['min_players'];
		$max_players_value = $_GET['max_players'];
	} else {
		$max_players_value = $min_players_value = $publisher_value = $console_value = $genre_value = 0;
	}

?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title>Retro Run</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php require_once "php/navbar.php" ?>

	<section id="games">
		<div class="game_wrapper">
	<form action="games.php" method="get">	
				<span class="filters">Filters</span>
					<?php include 'php/filters.php' ?>

					<label>Min Players
						<select name="min_players" id="min_players" size="1">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</label>

					<label>Max Players
						<select name="max_players" id="max_players" size="1">
							<option value="0">No max</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</label>
					<input type="submit" value="Submit">
				</div>

			</form>
		</div>
		<div class="grid_layout">

			<?php require_once 'php/gamecardsfilter.php'; ?>

		</div>
	</section>

</body>

</html>