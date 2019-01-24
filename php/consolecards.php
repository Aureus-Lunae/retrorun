<?php

require 'php/db_connect.php';

	$sql_query = 'SELECT DISTINCT console_id, con_short_name, con_release_year, con_picture, publisher_name FROM consoles LEFT OUTER JOIN publisher ON consoles.publisher_id = publisher.publisher_id ORDER BY con_release_year DESC, con_name LIMIT 12';

	$db_result = $conn->prepare($sql_query);
	$db_result->execute();

	foreach ($db_result as $row)
    {          
    $console_id = $row['console_id'];
		$consoles = $row['con_short_name'];
		$picture = $row['con_picture'];
		$publisher = $row['publisher_name'];
		$year = $row['con_release_year'];

		$consolecard = '<div class="grid_item">';
		$consolecard .= '<a href="consoleinfo.php?console=' . $console_id . '"><div class="card">';
		$consolecard .= '<h1>' . $consoles . '</h1>';
		$consolecard .= '<div class="console_imgbox"><img src="images/console/' . $picture . '" alt="'. $consoles .' Picture"/></div>';
		$consolecard .= '<div class="year">' . $year . '</div>';
		$consolecard .= '<div class="publisher">Publisher: ' . $publisher . '</div>';
		$consolecard .= '</div></a></div>';

		echo $consolecard;
	}

	$conn = null;
?>

