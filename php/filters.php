<?php

	require 'php/db_connect.php';

	//Genre filter
	$genre_query = 'SELECT genre_id, genre_name FROM genre';

	$genre_db = $conn->prepare($genre_query);

	$genre_db->execute();

  $genre = '<label>Genre:';
  $genre .= '<select name="genre" id="genre" size="1">';

	foreach ($genre_db as $row) {          
		$genre .= '<option value="' . $row['genre_id'] . '">' . $row['genre_name'] . '</option>';
	}

	$genre .= '</select></label>';
	echo $genre;

	$conn = null;
?>

