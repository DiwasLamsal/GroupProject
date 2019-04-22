<?php $submission = $submission->fetch()?>
<?php $assignment = getAssignmentById($submission['asaid'])->fetch();?>
<?php $student = getUserById($submission['asuid'])->fetch();?>
<?php
  if(checkSubmissionGrade($submission['submission_id']))
  $grade = checkSubmissionGrade($submission['submission_id'])->fetch();
?>


<form method="POST" class="userForm" style="margin-top: 0;">
  <div class="formTitle">
    <h1 class="formHeading">
      Mark Student Submission
    </h1>
  </div>

  <div class="formHolder">
    <div class="formColumn1">
      <p>
        <b>Student ID: </b><?php echo $submission['asaid'];?><br><br>
        <b>Student Name: </b><?php echo $student['fname'].' '.$student['mname'].' '.$student['lname'];?><br><br>
        <b>Comment: </b><?php echo $submission['comments'];?><br><br>

        <?php $color = $assignment['adeadline']>$submission['submission_date']?'green':'red';?>
        <b>Submission Date: </b>
          <font color = "<?php echo $color;?>"><?php echo $submission['submission_date'];?></font><br>
        <br>
      <?php if($color == 'green'){?>
        <b>Note*: </b>The font color green for submission date means deadline was not exceeded
      <?php } else { ?>
        <b>Note*: </b>The font color red for submission date means submission was done after deadline exceeded
      <?php }?>

        <br><br>

      </p>
    </div>

    <div class="formColumn2">
      <label>Grade: </label>
      <input type = "text" name = "grade[grade]" required placeholder="ex: B+"
      value = "<?php if(isset($grade)) echo $grade['grade'];?>">

      <label>Feedback: </label>
      <textarea style="height: 108px;" name = "grade[feedback]"><?php if(isset($grade)) echo $grade['feedback'];?></textarea>
    </div>
  </div>
  <?php if(!isset($grade)) {?>
    <input type="submit" value="Submit" name="submit">
  <?php } else { ?>
    <input type = "hidden" name = 'grade[gid]' value = "<?php echo $grade['gid'];?>">
    <input type="submit" value="Submit" name="submitEdit">
  <?php }?>
</form>


<div style=" text-align: center;">
  <a target = "_blank" href = "/GroupProject/public/<?php echo $submission['asfiles'];?>" style="color: white;">
    <img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
  </a>
</div>
