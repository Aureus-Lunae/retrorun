	<?php 
	require 'php/db_connect.php';

	$sql_query = 'SELECT DISTINCT game_name, game_name_jap, game_name_us, game_release_year, game_PAL, game_NTSC_J, game_NTSC, game_min_players, game_max_players, game_box_art, game_plot, game_rating, genre_name, dev_name, publisher_name, GROUP_CONCAT(DISTINCT series_name SEPARATOR ", ") AS series, GROUP_CONCAT(con_short_name SEPARATOR ", ") AS short_name FROM games LEFT OUTER JOIN publisher ON games.publisher_id = publisher.publisher_id LEFT OUTER JOIN game_consoles ON games.game_id = game_consoles.game_id LEFT OUTER JOIN consoles ON game_consoles.console_id = consoles.console_id LEFT OUTER JOIN developer ON games.dev_id = developer.dev_id LEFT OUTER JOIN genre ON games.genre_id = genre.genre_id LEFT OUTER JOIN game_series ON games.game_id = game_series.game_id LEFT OUTER JOIN series ON series.series_id = game_series.series_id WHERE games.game_id = ' . $game_id;

		$db_result = $conn->query($sql_query);

		$result = $db_result->fetch(PDO::FETCH_ASSOC);
		$title = $result['game_name'];
		$box_art = $result['game_box_art'];
		$name_jap = $result['game_name_jap'];
		$name_us = $result['game_name_us'];
		$release_year = $result['game_release_year'];
		$genre = $result['genre_name'];
		$developer = $result['dev_name'];
		$publisher = $result['publisher_name'];
		$consoles = $result['short_name'];
		$rating = $result['game_rating'];
		$series = $result['series'];

		if (!$series){
			$series = 'None';
		}

		// Region selector //
		$region = '';
		if ($result['game_PAL'] == 1) {
			$region = 'PAL';
		}

		if ($result['game_NTSC_J'] == 1) {
			if ($region != ''){
				$region .= ', NTSC-J';
			} else {
				$region = 'NTSC-J';
			}
		}

		if ($result['game_NTSC'] == 1) {
			if ($region != ''){
				$region .= ', NTSC';
			} else {
				$region = 'NTSC';
			}
		}

		$players = $result['game_min_players'];
		if ($result['game_max_players'] > $players) {
			$players .= '-'.$result['game_max_players'];
		}




?>
