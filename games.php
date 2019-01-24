<!DOCTYPE html>

<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title>Games</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php require_once "php/navbar.php" ?>

	<section id="games">
		<div class="game_wrapper">
			<form action="games.php" method="get">	
				<span class="filters">Filters</span>
				<div class="filter_list">
					<label>Genre:
					<select name="genre" id="genre" size="1">
						<option value="1">Game</option>
						<option value="2">Adventure</option>
					</select>
					</label>

					<label>Console:
					<select name="console" id="console" size="1">
						<option value="1">Game</option>
						<option value="2">Adventure</option>
					</select>
					</label>

					<label>Publisher:
					<select name="publisher" id="publisher" size="1">
						<option value="1">Game</option>
						<option value="2">Adventure</option>
					</select>
					</label>

					<label>Min Players
						<select name="min_players" id="min_players" size="1">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</label>

					<label>Max Players
						<select name="max_players" id="max_players" size="1">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</label>

				</div>

			</form>
		</div>
		<div class="grid_layout">

			<?php require_once 'php/gamecards.php'; ?>

		</div>
	</section>


	<section id="consoles">



</body>