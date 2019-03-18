<?php?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageModuleLeaders/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addlecturer.png" width="50"><br>
        Add new Module Leader
      </div>
    </a>
  </div>


  <?php
    echo $note;
  ?>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Module Leaders</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Login ID</th>
      <th>Full Name</th>
      <th>Gender</th>
      <th>Birthdate</th>
      <th>Address</th>
      <th>Email</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php



    $count = 0;
      while($user = $users->fetch()){

        $viewIcon = '<a href = "/GroupProject/public/ManageModuleLeaders/browse/'.$user['uid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageModuleLeaders/archive/'.$user['uid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                        </a>';

        $statusText = $user['ustatus']=="Y" ? '<font color = "green">Visible</font>':
                                                           '<font color = "red">Archived</font>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$user['uid'].'</td>
                <td>'.$user['fname'].' '.$user['mname'].' '.$user['lname'].'</td>
                <td>'.$user['gender'].'</td>
                <td>'.$user['birthdate'].'</td>
                <td>'.$user['uaddress'].'</td>
                <td><a href = "mailto:'.$user['uemail'].'">'.$user['uemail'].'</a></td>
                <td>'.$viewIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$statusText.'</td>
        ';

      }
    ?>
  </table>

</div>
