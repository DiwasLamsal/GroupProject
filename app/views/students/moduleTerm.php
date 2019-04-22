
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
						assignment from the submission box below.
						<br>
					</p>
				</div>
				<div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

				<!-- Assignment Right Column -->
				<div class = "formColumn2">
					<div style=" text-align: center;">
						<a target = "_blank" href = "/GroupProject/public/<?php echo $assignment['afiles'];?>" style="color: white;">
							<img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
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

<!-- If the assignment has been posted, also include the submission area -->
<?php
if(!empty($assignment)){

	?>
	<form method="POST" class="userForm" enctype="multipart/form-data">
		<div class="formTitle">
			<h1 class="formHeading">
				Submit your Work
			</h1>
		</div>

		<div class="formHolder">
			<div class="formColumn1">
				<p>
					<b>Title: </b><?php echo $assignment['atitle'];?><br>
					<b>Deadline: </b><?php echo $assignment['adeadline'];?><br>
					<br>

					<b>Instructions:</b><br>
					Your submission should contain your zip file named in the format name-id-submission-zip.zip.<br>
					For example: If your name is Kevin Brune and your ID is 12001212, the submission file should be
					named as kevin-brune-12001212-submission-zip.zip.
					<br><br>
					Submissions can be zip or rar files only. Make sure you have the correct extension for your submission.
					<br><br>
					<b>Note*:</b> You cannot resubmit your work or edit your submission. Thus, re-check and confirm everything is
					correct before submitting your work.

					<br>
				</p>
			</div>

			<div class="formColumn2">

				<h3 style="text-align: center;">Submission Area</h3>
				<br>

<?php
	if(checkStudentSubmission($_SESSION['loggedin']['uid'], $assignment['aid'])){
		$submission = getStudentSubmission($_SESSION['loggedin']['uid'], $assignment['aid']);
?>
	<br>

	<p style="text-align: left;">
		You have already submitted the assignment. Click on the download button
		to view your submission.

		<br><br>
		<b>Submission Comments: </b>
		<?php echo $submission['comments'];?>
		<br><br>

	</p>


	<br><br>
	<div style=" text-align: center;">
		<a target = "_blank" href = "/GroupProject/public/<?php echo $submission['asfiles'];?>" style="color: white;">
			<img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
		</a>
	</div>

			</div>
		</div>
<?php
	}
	else{
?>

				<label>Submission File: </label>
	      <input type = "file" name = "submissionFile" style="border: none; float: right;" required>

				<input type = "hidden" name = "submission[asuid]" value = "<?php echo $_SESSION['loggedin']['uid'];?>">
				<input type = "hidden" name = "submission[asaid]" value = "<?php echo $assignment['aid'];?>">

	      <label>Submission Comments: </label>
	      <textarea style="height: 108px;" name = "submission[comments]" required></textarea>

			</div>

		</div>
		<input type="submit" value="Submit" name="submitAssignment">

<?php
			}
?>
	</form>


	<?php
}

?>


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

							<div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

							<div class = "formColumn2">
								<div style=" text-align: center;">
									<a target = "_blank" href = "/GroupProject/public/<?php echo $resource['rfilenames'];?>" style="color: white;">
										<img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
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
