<div class = "contentBoxLarge contentBoxLargeManage userNotesBox">
  <div class = "title" style="background: #EF767A;">User Notes</div>
  <div class = "content">

    <?php
      if($val==""){
    ?>

    Manage or add <?php echo $manage; ?> from this section.
    <br>

    <br>
    Even though the system is suitable for mobile usage, for the best experience, use a desktop browser.

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
        else{
          header("Location:..");
        }
      }
    ?>

  </div>
</div>
