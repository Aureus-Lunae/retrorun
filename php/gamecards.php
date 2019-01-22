<?php

require_once 'php/db_connect.php';
$title = '';
$boxart = '';
$publisher = '';
$consoles = '';

	$sql_query = 'SELECT DISTINCT game_name, game_box_art, publisher_name, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games LEFT OUTER JOIN publisher ON games.publisher_id = publisher.publisher_id LEFT OUTER JOIN game_consoles ON games.game_id = game_consoles.game_id LEFT OUTER JOIN consoles ON game_consoles.console_id = consoles.console_id ORDER BY game_release_year';
	$db_result = $conn->query($sql_query);

	foreach ($db_result as $row)
    {          

		$title = $row['game_name'];
		$boxart = $row['game_box_art'];
		$publisher = $row['publisher_name'];
		$consoles = $row['short_name'];

		$gamecard = '<div class="grid_item">';
		$gamecard .= '<div class="card">';
		$gamecard .= '<h1>' . $title . '</h1>';
		$gamecard .= '<img src="images/' . $boxart . '" alt="Sonic_the_hedgehog"/>';
		$gamecard .= '<div class="publisher">Publisher: ' . $publisher . '</div>';
		$gamecard .= '<div class="consoles">' . $consoles . '</div>';
		$gamecard .= '</div></div>';

		echo $gamecard;
	}

	$conn = null;
?>

