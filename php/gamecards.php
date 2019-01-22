<?php

require_once 'php/db_connect.php';
$title = '';
$boxart = '';
$publisher = '';
$consoles = '';
//SELECT DISTINCT game_name, game_box_art, publisher_name, con_short_name FROM games INNER JOIN publisher ON games.publisher_id = publisher.publisher_id INNER JOIN game_consoles ON games.game_id = game_consoles.game_id INNER JOIN consoles ON game_consoles.console_id = game_consoles.console_id
//SELECT DISTINCT con_name FROM consoles LEFT OUTER JOIN game_consoles ON game_consoles.console_id = consoles.console_id WHERE game_id = '.$

	$sql_query = 'SELECT game_id, game_name, game_box_art, publisher_name FROM games INNER JOIN publisher ON games.publisher_id = publisher.publisher_id';
	$db_result = $conn->query($sql_query);

	foreach ($db_result as $row)
    {          

		$title = $row['game_name'];
		$boxart = $row['game_box_art'];
		$publisher = $row['publisher_name'];
		$consoles = '';

		$sql_count = 'SELECT DISTINCT COUNT(con_short_name) AS count FROM consoles LEFT OUTER JOIN game_consoles ON game_consoles.console_id = consoles.console_id WHERE game_id = ' .$row['game_id'];

		$db_count = $conn->query($sql_count);

		foreach ($db_count as $count) {
			$num_consoles = $count['count'];
		}
		//$num_consoles -= 1;

		$sql_query_consoles = 'SELECT DISTINCT con_short_name FROM consoles LEFT OUTER JOIN game_consoles ON game_consoles.console_id = consoles.console_id WHERE game_id = '.$row['game_id'] . ' ORDER BY con_release_year';

		$db_result2 = $conn->query($sql_query_consoles);
		$i = 0;

		foreach ($db_result2 as $console){
			$consoles .= $console['con_short_name'];

			if ($i < $num_consoles -1 ) {
				$consoles .= '; ';
				$i++;
			}
		}

		$conn2 = null;

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

