<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>

	<li>Grades</li>
</ul>


<div class = "boxesContainer">

<?php
if($submissions->rowCount()>0){
  $count = 0;
  while($submission = $submissions->fetch()){
    ++$count;
    if($count%2==1){
      echo '</div>';
      echo '<div class = "boxesContainer">';
    }
    $grade = checkSubmissionGrade($submission['submission_id'])->fetch();
    $term = getTermByAssignment($submission['asaid'])->fetch();
    $module = getModuleByTermId($term['tid'])->fetch();

    if($grade['status']=="N"){
?>


<div class = "contentBoxLarge" style="color: black;">
  <div class = "title"><?php echo $module['mname'].' - '.$term['tname'];?></div>
  <div class = "content" style="margin:0; overflow-Y: auto; max-height: 295px; text-align: left;" id="customScroll">
    <br>
    <p style="margin: 10px;">
      <b>Grades are Pending for this Submission.
        <br> Please wait for your Module Leader to publish the grades. </b><br>
    </p>
    <br>
  </div>
</div>


<?php
    }
    else {
?>


<div class = "contentBoxLarge" style="color: black;">
  <div class = "title"><?php echo $module['mname'].' - '.$term['tname'];?></div>
  <div class = "content" style="margin:0; overflow-Y: auto; max-height: 295px; text-align: left;" id="customScroll">
    <br>
    <p style="margin: 10px;">
      <b>Grade: </b><?php echo $grade['grade'];?><br><br>
      <b>Feedback: </b><?php echo $grade['feedback'];?><br>

    </p>
    <br>
  </div>
</div>



<?php
    }
  }
}
else{
?>

</div>

<h1>
  No Grades Are Available For You
</h1>


<?php } ?>
