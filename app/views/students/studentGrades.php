<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>

	<li>Grades</li>
</ul>


<?php
if($submissions->rowCount()>0){
	$count = 0;
  while($submission = $submissions->fetch()){
		if(checkSubmissionGrade($submission['submission_id'])==false)
			break;
		++$count;
    $grade = checkSubmissionGrade($submission['submission_id'])->fetch();
    $term = getTermByAssignment($submission['asaid'])->fetch();
    $module = getModuleByTermId($term['tid'])->fetch();
    if($grade['status']=="N"){
?>

<button class="collapsible" style="background: DarkCyan;">
	<b><?php echo $module['mname'].' - '.$term['tname'];?></b>
</button>
<div class="collapsedcontent" style="margin-bottom: 10px;">
	<br>
    <p style="margin: 10px;">
      <b>Grades are Pending for this Submission.
        <br> Please wait for your Module Leader to publish the grades. </b><br><br>
    </p>
</div>

<?php
    }
    else {
?>

<button class="collapsible" style="background: DarkCyan;">
	<b><?php echo $module['mname'].' - '.$term['tname'];?></b>
</button>
<div class="collapsedcontent" style="margin-bottom: 10px;">
	<br>
    <p style="margin: 10px;">
      <b>Grade: </b><?php echo $grade['grade'];?><br><br>
      <b>Feedback: </b><?php echo $grade['feedback'];?><br><br>
    </p>
</div>


<?php
    }
  }
	if($count==0){
		?>

		<div class = "adminManageTable">
			<h1>
			  🚫 No Grades Are Available For You
			</h1>
		</div>

<?php
	}
}
else{
?>

<div class = "adminManageTable">
	<h1>
	  🚫 No Grades Are Available For You
	</h1>
</div>

<?php } ?>
<script>
	toggleCollapse();
</script>
