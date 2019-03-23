<div class = "contentBoxLarge contentBoxLargeManage userNotesBox">
  <div class = "title" style="background: #EF767A;">Note</div>
  <div class = "content">

    <?php
      if($val==""){
    ?>


    View, edit or delete <?php echo $manage; ?> by clicking the eye icon.
    <?php

      if($manage=="levels")
          echo '<br><br> Note that you cannot delete records that are in use';
      elseif($manage=="students")
        echo 'The student status can be changed from the folder icon. <br><br>';
      else {
        echo 'The record can be archived by clicking the folder icon. <br><br>Note that
        you cannot archive or delete records that are in use.';
      }
      ?>


    <?php
      }
      else {
        if($val=="editsuccess"){
          echo 'Succesfully Edited Record';
        }
        else if($val=="addsuccess"){
          echo 'Successfully Added Record';
        }
        else if($val=="deletesuccess"){
          echo 'Successfully Deleted Record';
        }
        else if($val=="archivesuccess"){
          echo 'Succesfully Changed Archive Status of Record';
        }
        else if($val=="nosuchuser"){
          echo 'Error! No Such User was Found';
        }
        else if($val=="nosuchrecord"){
          echo 'Error! No Such Record was Found';
        }
        else if($val == "editpasssuccess"){
          echo 'Successfully Edited Password';
        }
        else if($val == "mailsuccess"){
          echo 'Mail Sent Succesfully';
        }
        else{
          header("Location:..");
        }
      }
    ?>

  </div>
</div>
