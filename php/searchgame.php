<?php
	require 'php/db_connect.php';

	$search_query = 'SELECT games.game_id, genre_name, game_name, game_box_art, game_release_year, publisher_name, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games INNER JOIN publisher ON games.publisher_id = publisher.publisher_id INNER JOIN developer ON games.dev_id = developer.dev_id INNER JOIN game_consoles ON games.game_id = game_consoles.game_id INNER JOIN consoles ON game_consoles.console_id = consoles.console_id INNER JOIN genre ON games.genre_id = genre.genre_id WHERE game_name LIKE :name OR publisher_name LIKE :name OR dev_name LIKE :name GROUP BY games.game_id ORDER BY game_release_year DESC, game_name LIMIT 24';

	$game_search_result = $conn->prepare($search_query);

	$game_search_result->execute(array(':name'=>"%{$search}%"));

	$row_count = $game_search_result->rowCount();

	if ($row_count == 0) {
		echo '<div class="grid_item"><div class="card">Your search did not yield a result.</div></div>';
	}

	foreach ($game_search_result as $row)
	    {          

			$title = $row['game_name'];
			$boxart = $row['game_box_art'];
			$publisher = $row['publisher_name'];
			$consoles = $row['short_name'];
			$year = $row['game_release_year'];
			$game_id = $row['game_id'];
			$genre = $row['genre_name'];

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