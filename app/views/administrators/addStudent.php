<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($student))
  $student=$student->fetch();

  $pat = getUserById($student['puid'])->fetch();
  $enCourse = getCourseById($student['cid'])->fetch();
  $enLevel = getLevelById($student['slvid'])->fetch();


?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Login ID: </b><?php echo $user['uid'];?><br>
      <b>First Name: </b><?php echo $user['fname'];?><br>
      <b>Middle Name: </b><?php echo $user['mname'];?><br>
      <b>Last Name: </b><?php echo $user['lname'];?><br>
      <b>Gender: </b><?php echo $user['gender'];?><br>
      <b>Birthdate: </b><?php echo $user['birthdate'];?><br>
      <b>Address: </b><?php echo $user['uaddress'];?><br>
      <b>Contact No: </b><?php echo $user['ucontact'];?><br>
      <b>Email Address: </b><?php echo $user['uemail'];?><br>
      <b>Role: </b><?php echo $user['urole'];?><br>
      <b>Status: </b><?php echo $student['rstatus']=="Live" ? '<font color = "green">Live</font>':
                                                         '<font color = "red">Dormant</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageStudents/delete/<?php echo $user['uid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete User
      </div>
    </a>
  </div>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle" style="background: #6495ED;">
    <h1 class = "tableHeading">Other Student Details</h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">

    <b>PAT: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$pat['uid'].'">'.
                $pat['fname'].' '.$pat['mname'].' '.$pat['lname'].'</a>';
      echo $link;
    ?>
    <br>

    <b>Course: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageCourses/browse/'.$enCourse['cid'].'">'.
                $enCourse['ctitle'].'</a>';
      echo $link;
    ?>
    <br>

    <b>Level: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageLevels/browse/'.$enLevel['lvid'].'">'.
                $enLevel['lvtitle'].' - '.$enLevel['lvaltname'].'</a>';
      echo $link;
    ?>
    <br>

  </div>

</div>



<div class = "adminManageTable">

  <div class = "tableTitle" style="background: green;">
    <h1 class = "tableHeading">Student Modules</h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">

  </div>
</div>

<form method = "POST" class = "userForm">

  <div class = "formTitle" style="background: orangered;">
    <h1 class = "formHeading">
      <?php if(isset($user))echo 'Change '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s Password';?>
    </h1>
  </div>


  <div class = "formHolder">

    <div class = "formColumn1">
      <label for = "password">Password: </label>
      <input type = "password" onkeyup="checkPassword()" name = "user[password]" id = "password" required>
      <p id = "passtest" style="font-size: 15px; color: red; margin-bottom: 20px;">Passwords must contain more than 8 characters</p>

      <label for = "confirmpassword">Confirm Password: </label>
      <input type = "password" onkeyup="checkPassword()" name = "confirmpassword" id = "confirmpassword" required>
      <p id = "confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;"><br></p>
    </div>

    <div class = "formColumnSeparator"></div>

    <div class = "formColumn2">
    </div>

</div>

<input type = "submit" value = "Submit" name = "passubmit" id = "submission">



</form>


<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
    else {?>
    Admit new Student
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label for = "firstname">First Name: </label>
    <input type = "text" name = "user[fname]" required
    <?php if(isset($user))echo 'value="'.$user['fname'].'"';?>>

    <label for = "middlename">Middle Name: </label>
    <input type = "text" name = "user[mname]"
    <?php if(isset($user))echo 'value="'.$user['mname'].'"';?>>

    <label for = "lastname">Surame: </label>
    <input type = "text" name = "user[lname]" required
    <?php if(isset($user))echo 'value="'.$user['lname'].'"';?>>


    <label for = "gender">Gender: </label>
    <select name = "user[gender]">
      <option value = "Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
      <option value = "Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female</option>
      <option value = "Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other</option>
    </select>


    <label for = "course">Course: </label>
    <select name = "student[cid]">
      <?php
        while($course = $courses->fetch()){
          if($course['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $course['cid'];?>"
          <?php if(isset($enCourse)&& $student['cid']==$course['cid'])echo 'selected';?>>
          <?php echo $course['ctitle'];?>
        </option>
      <?php }?>
    </select>


    <label for = "level">Level: </label>
    <select name = "student[slvid]">
      <?php
        while($level = $levels->fetch()){
          if($level['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $level['lvid'];?>"
          <?php if(isset($enLevel)&& $student['slvid']==$level['lvid'])echo 'selected';?>>
          <?php echo $level['lvtitle'].' - '.$level['lvaltname'];?>
        </option>
      <?php }?>
    </select>


  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <label for = "birthdate">Birth Date: </label>
    <input type = "date" name = "user[birthdate]" <?php if(isset($user))echo 'value='.$user['birthdate'];?>>

    <label for = "address">Address: </label>
    <textarea name = "user[uaddress]"  required><?php if(isset($user))echo $user['uaddress'];?></textarea>

    <label for = "contact">Contact Number: </label>
    <input type = "contact" name = "user[ucontact]"  required
    <?php if(isset($user))echo 'value='.$user['ucontact'];?>>

    <label for = "email">Email Address: </label>
    <input type = "email" name = "user[uemail]"  required
    <?php if(isset($user))echo 'value='.$user['uemail'];?>>


<?php


?>

    <label for = "pat">PAT: </label>
    <select name = "student[puid]">
      <?php
        while($user = $users->fetch()){
          if($user['status']=="N")
            continue;
          $totalStudentsUnderPAT = getTotalPAT($user['uid'])->fetch()['COUNT(puid)'];

      ?>
        <option value = "<?php echo $user['uid'];?>"
          <?php if(isset($pat)&& $student['puid']==$user['uid'])echo 'selected';?>>
          <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'].' - Total Students: '.$totalStudentsUnderPAT;?>
        </option>
      <?php }?>
    </select>


  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
