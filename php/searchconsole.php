<?php

require 'php/db_connect.php';

	$search_con_query = 'SELECT DISTINCT console_id, con_short_name, con_release_year, con_picture, publisher_name FROM consoles LEFT OUTER JOIN publisher ON consoles.publisher_id = publisher.publisher_id WHERE con_short_name LIKE :name OR con_name LIKE :name ORDER BY con_release_year DESC, con_name LIMIT 24';

	$search_con = $conn->prepare($search_con_query);
	$search_con->execute(array(':name'=>"%{$search}%"));

	$row_count = $search_con->rowCount();

	if ($row_count == 0) {
		echo '<div class="grid_item"><div class="card">Your search did not yield a result.</div></div>';
	}

	foreach ($search_con as $row)
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
