<?php

	require 'php/db_connect.php';

	$sql_query = 'SELECT games.game_id, game_name, game_box_art, game_release_year, publisher_name, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games INNER JOIN publisher ON games.publisher_id = publisher.publisher_id INNER JOIN game_consoles ON games.game_id = game_consoles.game_id INNER JOIN consoles ON game_consoles.console_id = consoles.console_id GROUP BY games.game_id ORDER BY game_release_year DESC , game_name LIMIT 12';

	$db_result = $conn->prepare($sql_query);

	$db_result->execute();

	foreach ($db_result as $row)
    {          

		$title = $row['game_name'];
		$boxart = $row['game_box_art'];
		$publisher = $row['publisher_name'];
		$consoles = $row['short_name'];
		$year = $row['game_release_year'];
		$game_id = $row['game_id'];

		$gamecard = '<div class="grid_item">';
		$gamecard .= '<a href="gameinfo.php?game=' . $game_id . '"> <div class="card">';
		$gamecard .= '<h1>' . $title . '</h1>';
		$gamecard .= '<div class="imgbox"> <img src="images/boxart/' . $boxart . '" alt="' . $title . '"/></div>';
		$gamecard .= '<div class="year">' . $year . '</div>';
		$gamecard .= '<div class="publisher">Publisher: ' . $publisher . '</div>';
		$gamecard .= '<div class="consoles">' . $consoles . '</div>';
		$gamecard .= '</div></a></div>';

		echo $gamecard;
	}

	$conn = null;
?>

