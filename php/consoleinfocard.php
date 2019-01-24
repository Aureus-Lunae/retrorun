	<?php 
	require 'php/db_connect.php';

	$sql_query = 'SELECT DISTINCT con_short_name, con_name, con_name_jap, con_name_us, con_release_year, con_PAL, con_NTSC_J, con_NTSC, con_picture, con_description, publisher_name FROM consoles LEFT OUTER JOIN publisher ON consoles.publisher_id = publisher.publisher_id WHERE console_id = ?';

		$con_prep = $conn->prepare($sql_query);

		$con_prep->execute(array($console_id));

		$result = $con_prep->fetch(PDO::FETCH_ASSOC);

		$title = $result['con_short_name'];
		$console_img = $result['con_picture'];

		$full_name = $result['con_name'];
		$jap_name = $result['con_name_jap'];
		$us_name = $result['con_name_us'];
		$release_year = $result['con_release_year'];
		$publisher = $result['publisher_name'];
		$description = $result['con_description'];

		//Regions
		$region = '';
		if ($result['con_PAL'] == 1) {
			$region = 'PAL';
		}
		if ($result['con_NTSC_J'] == 1) {
			if ($region){
				$region .= ', NTSC-J';
			} else {
				$region = 'NTSC-J';
			}
		}
		if ($result['con_NTSC'] == 1) {
			if ($region){
				$region .= ', NTSC';
			} else {
				$region = 'NTSC';
			}
		}

?>
