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


	require 'db_connect.php';
	$add_query = '';

	//Genre Filter
	if ($genre_value > 0){
		$add_query = 'WHERE genre.genre_id = ' . $genre_value . ' ';		
	}
	if ($console_value > 0){
		if ($add_query){
			$add_query .= 'AND consoles.console_id = ' . $console_value . ' ';
		} else {
			$add_query = 'WHERE consoles.console_id = ' . $console_value . ' ';
		}	
	}

	if ($publisher_value > 0){
		if ($add_query){
			$add_query .= 'AND publisher.publisher_id = ' . $publisher_value . ' ';
		} else {
			$add_query = 'WHERE publisher.publisher_id = ' . $publisher_value . ' ';
		}	
	}

	//Minmax 
	
	$max_set = false;

	if ($min_players_value > 1){
		$max_set = true;
		if ($max_players_value >= $min_players_value){
			if ($add_query){
				$add_query .= 'AND game_max_players BETWEEN ' . $min_players_value . ' AND ' . $max_players_value . ' ';
			} else {
				$add_query = 'WHERE game_max_players BETWEEN ' . $min_players_value . ' AND ' . $max_players_value . ' ';
			}	
		} else {
			if ($add_query){
				$add_query .= 'AND game_max_players BETWEEN ' . $min_players_value . ' AND 100 ';
			} else {
				$add_query = 'WHERE game_max_players BETWEEN ' . $min_players_value . ' AND 100 ';
			}	
		}
	}

	if ($max_players_value > 0 && $max_set == false){
		if ($max_players_value >= $min_players_value){
			if ($add_query){
				$add_query .= 'AND game_max_players BETWEEN ' . $min_players_value . ' AND ' . $max_players_value . ' ';
			} else {
				$add_query = 'WHERE game_max_players BETWEEN ' . $min_players_value . ' AND ' . $max_players_value . ' ';
			}	
		} else {
			if ($add_query){
				$add_query .= 'AND game_max_players BETWEEN 1 AND ' . $max_players_value . ' ';
			} else {
				$add_query = 'WHERE game_max_players BETWEEN 1 AND ' . $max_players_value . ' ';
			}	
		}
	}
	
	switch ($sort_value) {
		case 1:
			$query_order = 'ORDER BY game_release_year ASC, game_name ASC';
			break;
		case 2:
			$query_order = 'ORDER BY game_name DESC, game_release_year DESC';
			break;
		case 3:
			$query_order = 'ORDER BY game_name ASC, game_release_year DESC';
			break;
		default:
			$query_order = 'ORDER BY game_release_year DESC, game_name ASC';
			break;
	}



	$sql_query = 'SELECT games.game_id, genre_name, game_name, game_box_art, game_release_year, publisher_name, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games INNER JOIN publisher ON games.publisher_id = publisher.publisher_id INNER JOIN game_consoles ON games.game_id = game_consoles.game_id INNER JOIN consoles ON game_consoles.console_id = consoles.console_id INNER JOIN genre ON games.genre_id = genre.genre_id ';
	
	if ($add_query)
	{
		$sql_query .= $add_query;
	}

	$sql_query .= 'GROUP BY games.game_id ' . $query_order . ' LIMIT 25';

	$db_result = $conn->prepare($sql_query);

	$db_result->execute();

	$row_count = $db_result->rowCount();

	if ($row_count == 0) {
		echo '<div class="grid_item"><div class="card">No results found. Try to change your filters.</div></div>';
	}

	foreach ($db_result as $row)
    {          

		$title = $row['game_name'];
		$boxart = $row['game_box_art'];
		$publisher = $row['publisher_name'];
		$consoles = $row['short_name'];
		$year = $row['game_release_year'];
		$genre = $row['genre_name'];
		$game_id = $row['game_id'];

		$gamecard = '<div class="grid_item">';
		$gamecard .= '<a href="gameinfo.php?game=' . $game_id . '"> <div class="card">';
		$gamecard .= '<h1>' . $title . '</h1>';
		$gamecard .= '<div class="imgbox"> <img src="images/boxart/' . $boxart . '" alt="' . $title . '"/></div>';
		$gamecard .= '<div class="year">' . $year . '</div>';
		$gamecard .= '<div class="year">' . $genre . '</div>';
		$gamecard .= '<div class="publisher">Publisher: ' . $publisher . '</div>';
		$gamecard .= '<div class="consoles">' . $consoles . '</div>';
		$gamecard .= '</div></a></div>';

		echo $gamecard;
	}

	$conn = null;
?>

