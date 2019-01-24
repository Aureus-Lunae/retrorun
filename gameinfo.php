<!DOCTYPE html>

<html lang='en-US'>

<?php
	if (!isset( $_GET["game"]) ){
		header('Location: index.php');
	}
	$game_id = $_GET["game"];
	require_once 'php/gameinfocard.php'
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Info about the game <?php echo $title; ?>" />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		$html_output .=	'<div class="game_box">';
		$html_output .='<img src="images/boxart/' . $box_art . '" alt="' . $title . '"/> </div></div>';

		$html_output .= '<div class="item_box">';

		$html_output .= '<label>Japanese name:</label> <span>' . $name_jap . '</span>';
		$html_output .= '<label>US name:</label> <span>' . $name_us . '</span><br /><br />';

		$html_output .= '<label>Release:</label> <span>' . $release_year . '</span>';
		$html_output .= '<label>Regions:</label> <span>' . $region . '</span>';
		$html_output .= '<label>Rating:</label> <span>' . $rating . ' / 100</span><br /><br />';

		$html_output .= '<label>Consoles:</label> <span>' . $consoles . '</span>';
		$html_output .= '<label>Players:</label> <span>' . $players . '</span>';
		$html_output .= '<label>Genre:</label> <span>' . $genre . '</span><br /><br />';

		$html_output .= '<label>Developer:</label> <span>' . $developer . '</span>';
		$html_output .= '<label>Publisher:</label> <span>' . $publisher . '</span><br /><br />';
		$html_output .= '<label>Series:</label> <span>' . $series . '</span>';

		$html_output .= '</div><div class="grid_item colspan-2">';
		$html_output .= '<p>' . $plot . '</p>';
		$html_output .= '</div>';

		echo $html_output;
?>



	</div>

</section>



</body>

</html>