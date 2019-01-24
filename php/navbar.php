<?php
$url = $_SERVER['HTTP_HOST'];
$url='http://'.$url.'/week2/';
?>

	<header>
		<div class="item"> <a href="index.php"><h1>Retro <span>Run</span></h1></a>
		</div>
		<div class="nav">
			<div class="nav_item">
			<a href="index.php">Home</a>
			<a href="games.php">Games</a>
			<form action="searchresults.php" method="get">
				<input type="text" name="search" placeholder="Search..">
    	</form>
			</div>
			<div class="nav_item">
				<a href="#">Login</a>
			</div>
		</div>
	</header>