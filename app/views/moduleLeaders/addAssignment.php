<ul class="breadcrumb">
	<li><a href="/GroupProject/public/ModuleLeaderHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li><a href = "../">Assignments</a></li>
	<li>Add Assignment</li>
</ul>

<form method = "POST" class = "userForm" enctype="multipart/form-data">

	<div class = "formTitle">
		<h1 class = "formHeading">
			<?php if(isset($assignment))echo 'Edit Assignment for '.$module['mname'].' - '.$term['tname'];
			else {?>
				Add Assignment for <?php echo $module['mname'].' - '.$term['tname'];?>
			<?php } ?>
		</h1>
	</div>

	<div class = "formHolder flex-top">

		<div class = "formColumn1">
			<label>Assignment Title: </label>
			<input type = "text" name = "assignment[atitle]" required
			<?php if(isset($assignment))echo 'value="'.$assignment['atitle'].'"';?>>

			<label>Assignment Description: </label>
			<textarea style="height: 108px;" name = "assignment[adescription]"><?php if(isset($assignment))echo $assignment['adescription'];?></textarea>
		</div>

		<div class = "formColumnSeparator"></div>

		<div class = "formColumn2">
			<input type = "hidden" name = "assignment[adeadline]" value = "<?php echo $term['tedate'];?>">
			<label>Assignment File: </label>
			<input type = "file" name = "assignmentFile" style="border: none; float: right;">

			<label></label>
			<label>Note*: Deadline for assignment is automatically set to term's ending date. </label>
		</div>
	</div>

	<input type = "submit" value = "Submit" name = "submit">
</form>
