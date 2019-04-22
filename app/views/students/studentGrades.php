<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>

	<li>Grades</li>
</ul>


<?php
if($submissions->rowCount()>0){
  while($submission = $submissions->fetch()){
    $grade = checkSubmissionGrade($submission['submission_id'])->fetch();
    if($grade['status']=="N"){
?>





<?php
    }
    else {
?>




<?php
    }
  }
}
else{
?>

<h1>
  No Grades Are Available For You
</h1>


<?php } ?>
