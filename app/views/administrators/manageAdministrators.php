<?php?>


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
    <h1 class = "tableHeading">Manage Administrators</h1>
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

        $viewIcon = '<a href = "/GroupProject/public/ManageAdministrators/browse/'.$user['uid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageAdministrators/archive/'.$user['uid'].'">
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
