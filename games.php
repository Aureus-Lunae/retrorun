<!DOCTYPE html>

<html lang="en-US">
<?php 

	if ($_GET){
		$genre_value = $_GET['genre'];
		$console_value = $_GET['console'];
		$publisher_value = $_GET['publisher'];
		$min_players_value = $_GET['min_players'];
		$max_players_value = $_GET['max_players'];
		$sort_value = $_GET['sort'];
		$min_players_value = (int)$min_players_value;
		$max_players_value = (int)$max_players_value;
	} else {
		$max_players_value = $min_players_value = $sort_value = $publisher_value = $console_value = $genre_value = 0;
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
				<div>
					<span class="filters">Filters</span>
					<br /><input type="submit" value="Submit" id="submit_button">
				</div>
					<div class='filter_list'>
						<?php include 'php/filters.php'; ?>

						<label>Max Players Low
							<input type="text" list="max_players" name="min_players" value="1">
							<datalist id="min_players" size="1">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</datalist>
						</label>

						<label>Max Players High
							<input type="text" list="max_players" name="max_players" value="All higher">
							<datalist id="max_players" size="1">
								<option value="0">All higher</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</datalist>
						</label>
						<label>Sort by:
							<select name="sort" id="sort" size="1">
								<option value="0">&#9660 Release Year </option>
								<option value="1">&#9650 Release Year </option>
								<option value="2">&#9660 Name</option>
								<option value="3">&#9650 Name</option>
							</select>
						</label>
					</div>
			</form>
		</div>

		<div class="grid_layout">

			<?php require_once 'php/gamecardsfilter.php'; ?>

		</div>
	</section>

</body>

</html>