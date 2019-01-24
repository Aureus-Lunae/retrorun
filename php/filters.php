<?php

	require 'php/db_connect.php';

	//Genre filter
	$genre_query = 'SELECT genre_id, genre_name FROM genre';

	$genre_db = $conn->prepare($genre_query);

	$genre_db->execute();

  $genre = '<label>Genre:';
  $genre .= '<select name="genre" id="genre" size="1">';
  $genre .= '<option value="0">None</option>';

	foreach ($genre_db as $row) {          
		$genre .= '<option value="' . $row['genre_id'] . '">' . $row['genre_name'] . '</option>';
	}

	$genre .= '</select></label>';
	echo $genre;

	//Console Filter
	$console_query = 'SELECT console_id, con_short_name FROM consoles';

	$console_db = $conn->prepare($console_query);

	$console_db->execute();

	$console = '<label>Console:';
  $console .= '<select name="console" id="genre" size="1">';
  $console .= '<option value="0">None</option>';

	foreach ($console_db as $row) {          
		$console .= '<option value="' . $row['console_id'] . '">' . $row['con_short_name'] . '</option>';
	}
	$console .= '</select></label>';
	echo $console;


	$conn = null;
?>

