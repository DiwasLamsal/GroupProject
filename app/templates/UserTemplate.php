<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(!isset($_SESSION['loggedin'])){
	header("Location: /GroupProject/public/Home");
}
else{
	if($role!=$_SESSION['loggedin']['urole']){
		header("Location: /GroupProject/public/Logout");
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/GroupProject/public/css/userStyle.css"/>
	<title><?php echo $title;?></title>
	<script src = "/GroupProject/public/script/script.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.angularjs.org/1.2.21/angular.js"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
			<div class="logosection">
			<img src = "/GroupProject/public/resources/images/logorectangle.bmp" alt = "">

			</div>

			<ul>

	    <!-- Contents for the navigation go here -->
	    <?php echo $navigation;?>
		</ul>

	  </nav>


		<section>
			<header>

				<div id = "headerLeft">
					<h4 style=" color: white; width: 70%; margin: auto;">
						Academic Year <?php echo date("Y").' - '.(date("Y")+1);?>
					</h4>
				</div>

				<div id = "headerMiddle">


					<h3 style="text-align: center;"><?php echo date("l, F j, Y"); ?></h3>

				</div>


				<div id = "headerRight">
						<div id = "dropdown">
							<h5>
								<img src = "/GroupProject/public/resources/images/avatar.svg" alt = "">
								<?php if(isset($_SESSION['loggedin'])) echo $_SESSION['loggedin']['fname'].' '.$_SESSION['loggedin']['lname']; ?> &nbsp;
								<!-- https://www.w3schools.com/howto/howto_css_arrows.asp -->
								<i id = "arrow" class="downArrow rightArrow"></i>


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
