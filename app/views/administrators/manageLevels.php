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

  <?php
    echo $note;
  ?>


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
