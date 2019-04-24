
<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li><a href="../">Modules</a></li>
	<li><?php echo $module['mname'].' - '.$term['tname'];?></li>
</ul>


<div class = "adminManageTable">
	<div class = "tableTitle">
		<h1 class = "tableHeading"><?php echo $module['mname'].' - '.$term['tname'];?></h1>
	</div>

	<div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
		<b>Term Status: </b><?php echo $term['tstatus'];?><br>
		<b>Term Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tsdate']));?><br>
		<b>Term End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tedate']));?><br>
		<br>
	</div>
</div>


<button class="collapsible  active" style="background: DarkCyan;">
	<b>Assignment</b>
</button>
<!-- Buttons for displaying announcement description -->
<div class="collapsedcontent" style="margin-bottom: 10px; max-height: none;">
	<!-- Content inside the collapsible -->
	<?php
	$assignments = getAssignmentsByTermId($term['tid']);
	if($assignments->rowCount()>0){
		$assignment = $assignments->fetch();
		echo '<br>';
		?>
		<div class = "resourceHolder">
			<!-- Assignment Left Column -->
			<div class = "formHolder">
				<div class = "formColumn1">
					<p>
						<b>Title: </b><?php echo $assignment['atitle'];?><br>
						<b>Deadline: </b><?php echo $assignment['adeadline'];?><br>
						<b>Description: </b><?php echo $assignment['adescription'];?><br>
						<br>
						Download the assignment brief by clicking the download button. You can submit your
						assignment by clicking the submit button.
						<br>
					</p>
				</div>


				<!-- Assignment Right Column -->
				<div class = "formColumn2">
					<div style=" text-align: center;">
						<a target = "_blank" href = "/GroupProject/public/<?php echo $assignment['afiles'];?>" style="color: white;">
							<!-- <img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png"> -->
							<button class="btn btn-download">Download <i class="fa fa-download"></i></button>
						</a>
						<a href = "/GroupProject/public/studentModules/submitWork/<?php echo $assignment['aid'];?>" style="color: white;">
							<!-- <img class = "downloadImage" src = "/GroupProject/public/resources/images/submitButton.png"> -->
							<button class="btn btn-submit">Submit</button>
						</a>
					</div>
					<br>
				</div>
			</div>
			<br><br>
		</div>
		<?php
	}
else{ // -- If no assignment is uploaded, display Add Assignment Button
	echo '<br><br>';
	echo '<h2 style = "text-align: center;">Your Module Leader has not uploaded an assignment for this module yet.</h2>';
	echo '<br><br><br>';
}
?>
</div>


<button class="collapsible" style="background: DarkCyan;">
	<b>Resources </b>
</button>

<!-- Buttons for displaying announcement description -->
<div class="collapsedcontent" style="margin-bottom: 10px;">
	<!-- Content inside the collapsible -->
	<div style="margin: 10px; min-height: 90px;">
		<p style="text-align: center;">
			<?php

			$resources = getResourcesByTermId($term['tid']);
			if($resources->rowCount()>0){
				while($resource = $resources->fetch()){
					?>
					<br>
					<div class = "resourceHolder">

						<div class = "formHolder">
							<div class = "formColumn1">
								<p>
									<b>Resource Title: </b><?php echo $resource['rtitle'];?><br>
									<b>Resource Description: </b><?php echo $resource['rdescription'];?><br>
									<br><br>
								</p>
							</div>



							<div class = "formColumn2">
								<div style=" text-align: center;">
									<a target = "_blank" href = "/GroupProject/public/<?php echo $resource['rfilenames'];?>" style="color: white;">
										<button class="btn btn-download">Download <i class="fa fa-download"></i></button>
									</a>
								</div>
								<br>
							</div>
						</div>

						<br><hr style="height: 2px;">
					</div>
				<?php }
			}
			else{
				echo '<h2 style = "text-align: center;">No Resource Available</h2>';
			}
			?>
			<br>

		</p>
	</div>
</div>

<script>
	toggleCollapse();
</script>
