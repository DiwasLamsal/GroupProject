<?php?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageLevels/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addlevel.png" width="50"><br>
        Add new Level
      </div>
    </a>
  </div>


<div class = "contentBoxLarge contentBoxLargeManage userNotesBox">
  <div class = "title" style="background: #EF767A;">User Notes</div>
  <div class = "content">

    <?php
      if($val==""){
    ?>

    Manage or add levels from this section.
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



</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Levels</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>Alternate Name</th>
      <th>Capacity</th>
      <th>Manage</th>
    </tr>
    <?php


    $count = 0;
      while($level = $levels->fetch()){

        $viewIcon = '<a href = "/GroupProject/public/ManageLevels/browse/'.$level['lvid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$level['lvtitle'].'</td>
                <td>'.$level['lvaltname'].'</td>
                <td>'.$level['lvcapacity'].'</td>
                <td>'.$viewIcon.'</td>
              </tr>';
      }
    ?>
  </table>

</div>
