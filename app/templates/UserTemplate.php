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
	<script src = "/GroupProject/public/script/script.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<!--################### -LOADER SECTION- #################-->
<!--################### -MUST NOT BE EDITED- #################-->
  <div class="load">
  	<div class = "loader">
	  	<div class ="firstBar bar"></div>
	  	<div class ="secondBar bar"></div>
	  	<div class ="thirdBar bar"></div>
	  	<div class ="fourthBar bar"></div>
	  	<div class ="fifthBar bar"></div>
	  	<div class ="sixthBar bar"></div>
	  	<div class ="seventhBar bar"></div>
	  	<div class ="eighthBar bar"></div>
  	</div>
  </div>


	<main>

	  <nav>
			<a href = "/GroupProject/public/Home">
				<img src = "/GroupProject/public/resources/images/logorectangle.bmp" alt = "" width="99.8%">
			</a>

			<ul>

	    <!-- Contents for the navigation go here -->
	    <?php echo $navigation;?>
		</ul>

	  </nav>


		<section>
			<header>

				<div id = "headerLeft">
					<h4 style="background: blueviolet; color: white; width: 70%; margin: auto;">
						Academic Year <?php echo date("Y").' - '.(date("Y")+1);?>
					</h4>
				</div>

				<div id = "headerMiddle">
					<form method = "get">
						<input type = "text" name = "search" placeholder="Search Student">
						<input type = "submit" value = "Go">
					</form>
				</div>


				<div id = "headerRight">
						<div id = "dropdown">
							<h5>
								<img src = "/GroupProject/public/resources/images/avatar.svg" alt = "">
								Bishownath Dhakal &nbsp;
								<!-- https://www.w3schools.com/howto/howto_css_arrows.asp -->
								<i class="downArrow"></i>


								<div id="myDropdown" class="dropdown-content">
							    <a href="/GroupProject/public/Logout">Logout</a>
									<a href="#">View Profile</a>
							  </div>
							</h5>

							<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_dropdown -->


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
