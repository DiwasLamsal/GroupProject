

<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageAdministrators/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/adduser.png" width="50"><br>
        Add new Administrator
      </div>
    </a>
  </div>


<div class = "contentBoxLarge contentBoxLargeManage userNotesBox">
  <div class = "title" style="background: #EF767A;">User Notes</div>
  <div class = "content">

    <?php
      if($val==""){
    ?>

    Manage or add administrators from this section.
    <br>

    <br>
    For a good experience, use a desktop browser to use the system.

    <?php
      }
      else {
        echo $val;
      }
    ?>

  </div>
</div>



</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Administrators</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>College ID</th>
      <th>Full Name</th>
      <th>Gender</th>
      <th>Birthdate</th>
      <th>Address</th>
      <th>Email</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php

    $viewIcon = '<a href = "#">
                      <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                    </a>';
    $deleteIcon = '<a href = "#">
                      <img class = "tableIcon" src = "/GroupProject/public/resources/images/delete.svg">
                    </a>';

    $archiveIcon = '<a href = "#">
                      <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                    </a>';

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
                <td>'.$viewIcon.' &nbsp;'.$deleteIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$user['ustatus'].'</td>
        ';

      }
    ?>
  </table>

</div>
