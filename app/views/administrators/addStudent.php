<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($student))
  $student=$student->fetch();

  $pat = getUserById($student['puid'])->fetch();
  $enCourse = getCourseById($student['cid'])->fetch();
  $enLevel = getLevelById($student['slvid'])->fetch();

?>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

        <div class="title">
            <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname']; ?>
        </div>

        <div class="content" style="text-align: left; margin: 0px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                        <th>Login ID: </th>
                        <td><?php echo $user['uid'];?></td>
                    </tr>
                    <tr>
                        <th>Full Name: </th>
                        <td><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo $user['gender'];?></td>
                    </tr>
                    <tr>
                        <th>Birthdate:</th>
                        <td><?php echo $user['birthdate'];?></td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td><?php echo $user['uaddress'];?></td>
                    </tr>
                    <tr>
                        <th>Contact No: </th>
                        <td><?php echo $user['ucontact'];?></td>
                    </tr>
                    <tr>
                        <th>Email Address:</th>
                        <td><?php echo $user['uemail'];?></td>
                    </tr>
                    <tr>
                      <th>Student Status:</th>
                      <td><?php echo $student['rstatus']=="Live"?'<font color = "green">Live</font>':
                            '<font color = "red">'.$student['rstatus'].'</font>';?></td>
                    </tr>
                    <?php if($student['rstatus']=="Dormant" || $student['rstatus']=="Provisional"){?>
                    <tr>
                        <th>Reason For Dormancy:</th>
                        <td>
                            <font style="color: red;"><?php echo $student['rdormant'];?></font>
                        </td>
                    </tr>

                  <?php } ?>
                    <tr>
                        <th>Previous GPA: </th>
                        <td><?php echo $student['gpa'];?></td>
                    </tr>
                    <tr>
                        <th>Previous School: </th>
                        <td><?php echo $student['prevschool'];?></td>
                    </tr>
                    <tr>
                      <th>Action</th>
                      <td>
                        <a id="myBtn" style="cursor: pointer;"><img src="/GroupProject/public/resources/images/deleteuser.png" width="150"></a>
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $modal;?>

<?php if($student['rstatus']=="Live"){ ?>

<div class="boxesContainer boxesContainerManage">
  <div class="contentBoxLarge contentBoxLargeEdit">
    <div class="content" style="text-align: left; margin: 0px; line-height: 1.6;">
        <table class="tableborder">
            <tbody>
                <tr>
                    <th>PAT: </th>
                    <td> <?php
    $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$pat['uid'].'">'.
              $pat['fname'].' '.$pat['mname'].' '.$pat['lname'].'</a>';
    echo $link;
  ?></td>
                </tr>
                <tr>
                  <th>Course:</th>
                  <td>  <?php
    $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageCourses/browse/'.$enCourse['cid'].'">'.
              $enCourse['ctitle'].'</a>';
    echo $link;
  ?></td>
                </tr>
                <tr>
                  <th>Level:</th>
                  <td>  <?php
    $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageLevels/browse/'.$enLevel['lvid'].'">'.
              $enLevel['lvtitle'].' - '.$enLevel['lvaltname'].'</a>';
    echo $link;
  ?></td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>


<!-- ################################### ATTENDANCES ################################### -->

<div class="adminManageTable">
    <div class="tableTitle">
        <h1 class="tableHeading">
          <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>'s Attendance
        </h1>
    </div>

    <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
        <div class = "attendance">
<?php
  $attendances = getAttendanceByStudent($user['uid']);

  $modules = findStudentModules($student['cid'], $student['slvid']);
  if($modules->rowCount()>0){
    while($module = $modules->fetch()){
      $att = round(getAttendancePercentage($student['suid'], $module['mid']));
      $actionText = '<a href="/GroupProject/public/PrintOfferLetter/concern/'.$student['suid'].'" target="_blank">
                      <font color = red>Take Action</font>
                    </a>'
?>
        <div class = "subAttendance">
          <b><?php echo $module['mname'];?></b>: <?php echo $att>0 && $att<75 ? $actionText:'';?>
            <div class = "attendanceBar">
              <div class="percentage"
                style="width: <?php echo $att;?>%; background: <?php echo generateRandomColor();?>">
                <?php echo $att==0?'<span style = "color: black;">&nbsp;No&nbsp;Records</span>':$att.'%';?>
              </div>
            </div>
        </div>
        <br>
<?php
  }
}
else{
?>
  <h2 style="text-align: center;">No modules available for this student</h2>
<?php } ?>
        </div>
    </div>
</div>


<!-- ################################### CHANGE PASSWORD ################################### -->

<form method="POST" class="userForm">

    <div class="formTitle formEditPassword">
        <h1 class="formHeading">
            <?php if(isset($user))echo 'Change '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s Password';?>
        </h1>
    </div>

    <div class="formHolder">

        <div class="formColumn1">
            <label for="password">Password: </label>
            <input type="password" onkeyup="checkPassword()" name="user[password]" id="password" required>
            <p id="passtest" style="font-size: 15px; color: red; margin-bottom: 20px;">Passwords must contain more than
                8 characters</p>

            <label for="confirmpassword">Confirm Password: </label>
            <input type="password" onkeyup="checkPassword()" name="confirmpassword" id="confirmpassword" required>
            <p id="confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;"></p>
            <input type="submit" value="Submit" name="passubmit" id="submission">
        </div>
    </div>
</form>

<?php } ?>


<?php if($student['rstatus']=="Provisional" && $student['rdormant']=="Pending Verification"){ ?>

<div class="adminManageTable offerHolder">

    <div class="tableTitle">
        <h1 class="tableHeading">Offer Letter</h1>
    </div>

    <div class="content" style="text-align: center; line-height: 1.6;">
        <div class="formHolder flex-top">
            <div class="formColumn1">
                <h2 style="text-align: center;">Conditional Offer Letter</h2>
                <div class="letterbox">
                    <?php include_once '../app/letters/conditional.php'; ?>

                </div>
                <a href="mailto:<?php echo $user['uemail']?>">
                    <button>
                        <img src="/GroupProject/public/resources/images/mail.png" width="20"
                            style="margin-bottom: -5px; float: left;">
                        &nbsp; Mail Conditional Letter
                    </button>
                </a>

                <a href="/GroupProject/public/PrintOfferLetter/conditional/<?php echo $user['uid']?>" target="_blank">
                    <button style="background: DodgerBlue;">
                        <img src="/GroupProject/public/resources/images/print.png" width="20"
                            style="margin-bottom: -5px; float: left;">
                        &nbsp;Print Conditional Letter
                    </button>
                </a>

            </div>
            <div class="formColumnSeparator"></div>
            <div class="formColumn1">
                <h2 style="text-align: center;">Unconditional Offer Letter</h2>
                <div class="letterbox">
                    <?php include_once '../app/letters/unconditional.php'; ?>
                </div>
                <a href="mailto:<?php echo $user['uemail']?>">
                    <button>
                        <img src="/GroupProject/public/resources/images/mail.png" width="20"
                            style="margin-bottom: -5px; float: left;">
                        &nbsp;Mail Unconditional Letter
                    </button>
                </a>

                <a href="/GroupProject/public/PrintOfferLetter/conditional/<?php echo $user['uid']?>" target="_blank">
                    <button style="background: DodgerBlue;">
                        <img src="/GroupProject/public/resources/images/print.png" width="20"
                            style="margin-bottom: -5px; float: left;">
                        &nbsp;Print Unconditional Letter
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php
}
?>

<?php if(!isset($user)){?>

<form method="POST" class="userForm" enctype="multipart/form-data">

    <div class="formTitle">
        <h1 class="formHeading">
            Admissions From UCAS
        </h1>
    </div>

    <div class="formHolder">
        <div class="formColumn1">
            <label>Select Student UCAS File:</label>
        </div>

        <div class="formColumn2">
            <input type="file" name="csvpicker" style="border: none;" required>
        </div>

    </div>
    <input type="submit" value="Submit" name="submitucas">
</form>


<!-- When the UCAS file is submitted, display the list of student records -->

<?php
  if(isset($_POST['submitucas'])){

?>

<div class="adminManageTable">

    <div class="tableTitle">
        <h1 class="tableHeading">UCAS Students</h1>
    </div>


    <form method="POST" class="userForm">
      <b>Note: </b>Passwords for these students are generated automatically. <br>
      The format is: FL-YYYY-MM-DD For example: for Ram Krishna Shrestha 1990-05-15, password:  RS-1990-05-15
      <br><br>
        <table id="customers">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Birthdate</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>GPA</th>
                <th>Previous College</th>
            </tr>
            <?php
      	$file = fopen($_FILES['csvpicker']['tmp_name'], "r");
        $count = 0;
      	while(!feof($file)){
      		$currentData = fgetcsv($file, 1000, ',');
      		if($currentData==false)break;
          $count++;

          echo '<input type = "hidden" name = "'.$count.'[user][fname]" value = "'.$currentData[0].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][mname]" value = "'.$currentData[1].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][lname]" value = "'.$currentData[2].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][uemail]" value = "'.$currentData[3].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][birthdate]" value = "'.$currentData[4].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][uaddress]" value = "'.$currentData[5].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][ucontact]" value = "'.$currentData[6].'">';
          echo '<input type = "hidden" name = "'.$count.'[user][gender]" value = "'.$currentData[7].'">';

          echo '<input type = "hidden" name = "'.$count.'[student][gpa]" value = "'.$currentData[8].'">';
          echo '<input type = "hidden" name = "'.$count.'[student][prevschool]" value = "'.$currentData[9].'">';

      		echo '<tr>';
          echo '<td>'.$count.'</td>';
      		echo '<td>'.$currentData[0].' '.$currentData[1].' '.$currentData[2].'</td>
      			 <td>'.$currentData[3].'</td>
      			 <td>'.$currentData[4].'</td>
      			 <td>'.$currentData[5].'</td>
      			 <td>'.$currentData[6].'</td>
      			 <td>'.$currentData[7].'</td>
      			 <td>'.$currentData[8].'</td>
      			 <td>'.$currentData[9].'</td>';
      		echo '</tr>';

      	}
      	fclose($file);
      ?>

        </table>

        <input type="hidden" value=<?php echo $count;?> name="totalStudents">
        <input type="submit" value="Add These <?php echo $count;?> Students" name="submitStudents">
    </form>
</div>

<?php

  unset($user);
  }
}
?>

<?php if(!isset($_POST['submitucas'])){ ?>

<form method="POST" class="userForm">

    <div class="formTitle">
        <h1 class="formHeading">
            <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
    else {?>
            Manually Admit new Student
            <?php } ?>
        </h1>
    </div>

    <?php if(!isset($user)){ ?>
    <b>Note: </b>Passwords for students are generated automatically. <br>
    The format is: FL-YYYY-MM-DD For example: for Ram Krishna Shrestha 1990-05-15, password:  RS-1990-05-15
    <br><br>
  <?php } ?>

    <div class="formHolder flex-top">

        <div class="formColumn1">
            <label for="firstname">First Name: </label>
            <input type="text" name="user[fname]" required <?php if(isset($user))echo 'value="'.$user['fname'].'"';?>>

            <label for="middlename">Middle Name: </label>
            <input type="text" name="user[mname]" <?php if(isset($user))echo 'value="'.$user['mname'].'"';?>>

            <label for="lastname">Surame: </label>
            <input type="text" name="user[lname]" required <?php if(isset($user))echo 'value="'.$user['lname'].'"';?>>


            <label for="gender">Gender: </label>
            <select name="user[gender]">
                <option value="Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
                <option value="Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female
                </option>
                <option value="Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other
                </option>
            </select>

            <label for="gpa">Previous GPA: </label>
            <input type="number" name="student[gpa]" required step="0.1" min="0" max="4.0"
                <?php if(isset($user))echo 'value="'.$student['gpa'].'"';?>>

            <label for="prevschool">Previous School: </label>
            <input type="text" name="student[prevschool]" required
                <?php if(isset($user))echo 'value="'.$student['prevschool'].'"';?>>


            <label for="course">Course: </label>
            <select name="student[cid]">
                <?php
        while($course = $courses->fetch()){
          if($course['status']=="N")
            continue;
      ?>
                <option value="<?php echo $course['cid'];?>"
                    <?php if(isset($enCourse)&& $student['cid']==$course['cid'])echo 'selected';?>>
                    <?php echo $course['ctitle'];?>
                </option>
                <?php }?>
            </select>

        </div>


        <div class="formColumnSeparator"></div>

        <div class="formColumn2">


            <label for="level">Level: </label>
            <select name="student[slvid]">
                <?php
        while($level = $levels->fetch()){
          if($level['status']=="N")
            continue;
      ?>
                <option value="<?php echo $level['lvid'];?>"
                    <?php if(isset($enLevel)&& $student['slvid']==$level['lvid'])echo 'selected';?>>
                    <?php echo $level['lvtitle'].' - '.$level['lvaltname'];?>
                </option>
                <?php }?>
            </select>

            <label for="birthdate">Birth Date: </label>
            <input type="date" name="user[birthdate]" <?php if(isset($user))echo 'value='.$user['birthdate'];?>>

            <label for="address">Address: </label>
            <textarea name="user[uaddress]" required><?php if(isset($user))echo $user['uaddress'];?></textarea>

            <label for="contact">Contact Number: </label>
            <input type="contact" name="user[ucontact]" required
                <?php if(isset($user))echo 'value='.$user['ucontact'];?>>

            <label for="email">Email Address: </label>
            <input type="email" name="user[uemail]" required <?php if(isset($user))echo 'value='.$user['uemail'];?>>


            <label for="pat">PAT: </label>
            <select name="student[puid]">
                <?php
        while($user = $users->fetch()){
          if($user['status']=="N")
            continue;
          $totalStudentsUnderPAT = getTotalPAT($user['uid'])->fetch()['COUNT(puid)'];

      ?>
                <option value="<?php echo $user['uid'];?>"
                    <?php if(isset($pat)&& $student['puid']==$user['uid'])echo 'selected';?>>
                    <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'].' - Total Students: '.$totalStudentsUnderPAT;?>
                </option>
                <?php }?>
            </select>

            <input type="submit" value="Submit" name="submit">
        </div>
    </div>

</form>
<?php } ?>
