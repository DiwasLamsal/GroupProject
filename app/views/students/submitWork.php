<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li><a href="../">Modules</a></li>
	<li><?php echo $module['mname'].' - '.$term['tname'];?> - Submit Assignment</li>
</ul>

<?php

?>

<form method="POST" class="userForm" enctype="multipart/form-data">
  <div class="formTitle">
    <h1 class="formHeading">
      Submit your Work for <?php echo $module['mname'].' - '.$term['tname'];?>
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
