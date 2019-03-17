<?php?>

<?php
  echo $val;
?>




<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Administrators</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>ID</th>
      <th>Full Name</th>
      <th>Gender</th>
      <th>Birthdate</th>
      <th>Address</th>
      <th>Email</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php

    $viewIcon = '<img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">';
    $deleteIcon = '<img class = "tableIcon" src = "/GroupProject/public/resources/images/delete.svg">';
    $archiveIcon = '<img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">';


    $count = 0;
      while($user = $users->fetch()){
        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$user['uid'].'</td>
                <td>'.$user['fname'].' '.$user['mname'].' '.$user['lname'].'</td>
                <td>'.$user['gender'].'</td>
                <td>'.$user['birthdate'].'</td>
                <td>'.$user['uaddress'].'</td>
                <td><a href = "mailto:'.$user['uemail'].'">'.$user['uemail'].'</a></td>
                <td>'.$viewIcon.' '.$deleteIcon.' '.$archiveIcon.'</td>
                <td>'.$user['ustatus'].'</td>
        ';

      }
    ?>
  </table>

</div>

<div class = "addNewBox addAdministratorBox">
  <a href = "/GroupProject/public/ManageAdministrators/add">
    <div style="width: 100%; height: 60%; padding-top: 10%;">
      Add new Administrator
    </div>
  </a>
</div>
