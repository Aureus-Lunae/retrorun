<?php

$title = 'Sonic the Hedgehog';
$boxart = 'boxart/sonic_the_hedgehog.png';
$publisher = 'Sega';
$consoles = 'Sega Mega Drive';



	$gamecard = '<div class="grid_item">';
	$gamecard .= '<div class="card debug">';
	$gamecard .= '<h1>' . $title . '</h1>';
	$gamecard .= '<img src="images/' . $boxart . '" alt="Sonic_the_hedgehog"/>';
	$gamecard .= '<div class="publisher">publisher: ' . $publisher . '</div>';
	$gamecard .= '<div class="consoles">' . $consoles . '</div>';
	$gamecard .= '</div></div>';

	echo $gamecard;


?>