<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($student))
  $student=$student->fetch();

?>
<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading"><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname']; ?></h1>
  </div>

    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Case Paper Status: </b><?php echo $student['rstatus']=="Live" ? '<font color = "green">Live</font>':
                                                     '<font color = "red">Dormant</font>';?><br>

    <?php if($student['rstatus']=="Live"){ ?>

      <form class = "userForm" method = "post" style="width: 90%; margin: auto;">
            <select name = "rdormant" style="margin: auto;">
              <option value = "Graduated">Graduated</option>
              <option value = "Withdrawn">Withdrawn</option>
              <option value = "Pending Verification">Pending Verification</option>
              <option>Expelled</option>
            </select>
            <p style="text-align: center; margin: 5px;">
              <input type = "submit" name = "submitDormant" value = "Make Student Dormant" style="background: rgb(230, 100, 100);">
            </p>
      </form>
    <?php }
    else{ ?>
    <b>Reason for Dormancy: </b>
    <?php echo $student['rstatus']=="Dormant"? $student['rdormant']: '<i>Student is Live</i>';?>
    <br><br>
    <form class = "userForm" method = "post">
      <input type = "submit" name = "submitLive" value = "Make Student Live" style="width:100%; margin: auto; background: rgb(100, 200,100);">
    </form>
  <?php } ?>


<?php } ?>
</div>
</div>
