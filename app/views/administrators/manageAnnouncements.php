<?php?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageAnnouncements/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addannouncement.png" width="50"><br>
        Add new Announcement
      </div>
    </a>
  </div>

  <?php
    echo $note;
  ?>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Announcements</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>Date Published</th>
      <th style = "width: 400px;">Description</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php


    $count = 0;
      while($announcement = $announcements->fetch()){

        $viewIcon = '<a href = "/GroupProject/public/ManageAnnouncements/browse/'.$announcement['anid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageAnnouncements/archive/'.$announcement['anid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                        </a>';

        $statusText = $announcement['anstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                           '<font color = "red">Archived</font>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$announcement['antitle'].'</td>
                <td>'.$announcement['andate'].'</td>
                <td>'.$announcement['andescription'].'</td>
                <td>'.$viewIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$statusText.'</td>
              </tr>';
      }
    ?>
  </table>

</div>
