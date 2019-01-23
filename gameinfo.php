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
		$name_jap = $result['game_name_jap'];
		$name_us = $result['game_name_us'];
?>


<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Info about the game <?php echo $title; ?>" />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php require_once "php/navbar.php" ?>

<section id="page_container">
	<div id="games_container">
		<?php 
		$html_output = '<div class="grid_layout">';
		$html_output .= '<div class="grid_item colspan-2">'; 
		$html_output .= '<h1>' . $title . '</h1>
			</div>';

		$html_output .=	'<div class="grid_item">';
		$html_output .=	'<div class="game_box">';
		$html_output .='<img src="images/boxart/' . $box_art . '" alt="' . $title . '"/> </div></div>';
		$html_output .= '<div class="item_box"><br />';
			$html_output .= '<label>Japanese name:</label> <span>' . $name_jap . '</span>';
			$html_output .= '<label>US name:</label> <span>' . $name_us . '</span>';
		$html_output .= '</div>';



		echo $html_output;
?>



	</div>

</section>



</body>

</html>