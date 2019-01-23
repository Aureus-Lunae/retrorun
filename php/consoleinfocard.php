	<?php 
	require 'php/db_connect.php';

	$sql_query = 'SELECT DISTINCT con_short_name, con_name, con_name_jap, con_name_us, con_release_year, con_PAL, con_NTSC_J, con_NTSC, con_picture, con_description, publisher_name FROM consoles LEFT OUTER JOIN publisher ON consoles.publisher_id = publisher.publisher_id WHERE console_id = ' . $console_id;

		$db_result = $conn->query($sql_query);

		$result = $db_result->fetch(PDO::FETCH_ASSOC);

		$title = $result['con_short_name'];

?>
