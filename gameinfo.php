<!DOCTYPE html>

<html lang='en-US'>

<?php
	if (!isset( $_GET["game"]) ){
		header('Location: index.php');
	}
	$game_id = $_GET["game"];
	require 'php/db_connect.php';

	$sql_query = 'SELECT DISTINCT game_name, game_name_jap, game_name_us, game_release_year, game_PAL, game_NTSC_J, game_NTSC, game_min_players, game_max_players, game_box_art, game_plot, game_rating, genre_name, dev_name, publisher_name, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games LEFT OUTER JOIN publisher ON games.publisher_id = publisher.publisher_id LEFT OUTER JOIN game_consoles ON games.game_id = game_consoles.game_id LEFT OUTER JOIN consoles ON game_consoles.console_id = consoles.console_id LEFT OUTER JOIN developer ON games.dev_id = developer.dev_id LEFT OUTER JOIN genre on games.genre_id = genre.genre_id WHERE games.game_id = ' . $game_id;

		$db_result = $conn->query($sql_query);

		$result = $db_result->fetch(PDO::FETCH_ASSOC);
		$title = $result['game_name'];
		$box_art = $result['game_box_art'];
?>


<head>
  <meta charset='UTF-8' />
  <meta name='description' content=' ' />
  <meta name='keywords' content=' ' />
  <meta name='author' content='Erwin Korsten' />
  <meta name='viewport content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <title><?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php require_once "php/navbar.php" ?>

<section id="page_container">
	<div id="games_container">
		<div class="grid_layout">
			<div class='grid-item colspan-2'>
				<h1><?php echo $title; ?></h1>
			</div>
			<div class="grid-item">
				<div class="game_box">
					<?php echo '<img src="images/boxart/' . $box_art . '" alt="' . $title . '"/>'; ?>
				</div>

			</div>
		</div>
	</div>

</section>



</body>

</html>