<!DOCTYPE html>

<html lang='en-US'>

<?php
	if (!isset( $_GET['console']) ){
		header('Location: index.php');
	}

	$console_id = $_GET['console'];
	require_once 'php/consoleinfocard.php';

?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Info about the game <?php echo $title; ?>" />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />me.min.css">
</head>

<body>
	<?php require_once "php/navbar.php" ?>

<section id="page_container">
	<div id="games_container">
		<?php 
		$html_output = '<div class="grid_layout">';
		$html_output .= '<div class="grid_item colspan-2">'; 
		$html_output .= '<h1>' . $title . '</h1>
			</div>';

		$html_output .=	'<div class="grid_item">';
		$html_output .=	'<div class="console_box">';
		$html_output .='<img src="images/console/' . $console_img . '" alt="' . $title . '"/> </div></div>';

		$html_output .= '<div class="item_box">';

		if ($title != $full_name) {
			$html_output .= '<label>Full name:</label> <span>' . $full_name . '</span>';
		}

		$html_output .= '<label>Japanese name:</label> <span>' . $jap_name . '</span>';
		$html_output .= '<label>US name:</label> <span>' . $us_name . '</span><br /><br />';

		$html_output .= '<label>Release:</label> <span>' . $release_year . '</span>';
		$html_output .= '<label>Regions:</label> <span>' . $region . '</span><br /><br />';

		$html_output .= '<label>Publisher:</label> <span>' . $publisher . '</span>';

		$html_output .= '</div><div class="grid_item colspan-2">';
		$html_output .= '<p>' . $description . '</p>';
		$html_output .= '</div>';

		echo $html_output;
?>



	</div>

</section>



</body>

</html>