<?php

// if (session_status() == PHP_SESSION_NONE) {
// 	session_start();
// }
// if(!isset($_SESSION['loggedin'])){
// 	header("Location: /CollegeAssignment/public/NotLoggedIn");
// }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/GroupProject/public/css/userStyle.css"/>
		<title><?php echo $title;?></title>

	</head>
	<body>

	<main>

	  <nav>
			<a href = "./"><img src = "resources/images/logorectangle.bmp" alt = "" width="99.8%"></a>

			<ul>
				<li><a href = "#">Dashboard</a></li>
				<li><a href = "#">Administrators</a></li>
				<li><a href = "#">Module Leaders</a></li>
				<li><a href = "#">Students</a></li>
				<li><a href = "#">Courses</a></li>
				<li><a href = "#">Modules</a></li>
				<li><a href = "#">Announcements</a></li>
			</ul>

	    <!-- Contents for the navigation go here -->
	    <?php echo $navigation;?>

	  </nav>


		<section>
			<header>

				<div id = "headerLeft">

					<div style = "float:left;" id = "hamburger">
						<div class = "bar bone"></div>
						<div class = "bar btwo"></div>
						<div class = "bar bthree"></div>
					</div>

					<h4 style="background: blueviolet; color: white; width: 60%; float: right;">
						Academic Year <?php echo date("Y");?>
					</h4>

				</div>

				<div id = "headerMiddle">
					<form method = "get">
						<input type = "text" name = "search" placeholder="Search">
						<input type = "submit" value = "Go">
					</form>
				</div>


				<div id = "headerRight">

					<span id = "userActions">
						<h5><img src = "resources/images/avatar.svg" alt = "">Username</h5>
					</span>

				</div>

			</header>

			<div class = "contentArea">

		    <!-- Main Contents go here -->
		    <?php echo $content;?>

			</div>
		</section>

	</main>


	<footer>
		&copy; Woodlands University College <?php echo date("Y");?>
	</footer>
</body>
</html>
