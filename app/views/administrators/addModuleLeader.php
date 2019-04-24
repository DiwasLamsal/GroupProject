<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($moduleLeader))
  $moduleLeader=$moduleLeader->fetch();

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
                        <th>Gender: </th>
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
                        <th>Role:</th>
                        <td><?php echo $user['urole'];?></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo $user['ustatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?></td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a href="/GroupProject/public/ManageModuleLeaders/delete/<?php echo $user['uid'];?>">

                                <img src="/GroupProject/public/resources/images/deleteuser.png" width="150">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>




</div>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

    <div class="title">
        Other Module Leader Details
    </div>

    <div class="content" style="text-align: left; margin: 0px; line-height: 1.6;">
        <table class="tableborder">
            <tbody>
                <tr>
                  <th>Courses Assigned:</th>
                  <td>
                  <?php

$course = checkCourseLeader($moduleLeader['luid']);
if($course->rowCount()>0){
  $course = $course->fetch();
  $link = '<a href = "/GroupProject/public/ManageCourses/browse/'.$course['cid'].'">'.$course['ctitle'].'</a>';
  echo 'Course Leader for '.$link;
}
else{
  echo "<i>No Course Available</i>";
}

?>
                  </td>
                </tr>
                <tr>
                  <th>Experience:</th>
                  <td>
                  <?php echo $moduleLeader['lexperience'];?>
                  </td>
                </tr>
                <tr>
                  <th>Biography:</th>
                  <td><?php echo $moduleLeader['lbiography'];?></td>
                </tr>
                <tr>
                  <th>Modules Assigned: </th>
                  <td style="padding-bottom: 15px;">
                  <?php

$count = 0;
while($module = $modules->fetch()){
  $count++;
?>

  <?php
  $link = '<a class = "courseModuleLink" target = "_blank" href = "/GroupProject/public/ManageModules/browse/'.$module['mid'].'">';
  echo $link;
  echo '<div class = "courseModuleBox" style = "background: '.generateRandomColor().';">';
  echo $module['mname'];
  echo '</div>';
  echo '</a>';

}

if($count==0) echo "<i>No Module Available</i>";

?>
                  </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>


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

<?php

}

?>

<form method="POST" class="userForm">

    <div class="formTitle">
        <h1 class="formHeading">
            <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
    else {?>
            Add new Module Leader
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder flex-top">

        <div class="formColumn1">
            <label for="firstname">First Name: </label>
            <input type="text" name="user[fname]" required <?php if(isset($user))echo 'value="'.$user['fname'].'"';?>>

            <label for="middlename">Middle Name: </label>
            <input type="text" name="user[mname]" <?php if(isset($user))echo 'value="'.$user['mname'].'"';?>>

            <label for="lastname">Surame: </label>
            <input type="text" name="user[lname]" required <?php if(isset($user))echo 'value="'.$user['lname'].'"';?>>

            <?php if(!isset($user)){?>
            <label for="password">Password: </label>
            <input type="password" onkeyup="checkPassword()" name="user[password]" id="password" required>

            <label for="confirmpassword">Confirm Password: </label>
            <input type="password" onkeyup="checkPassword()" name="confirmpassword" id="confirmpassword" required>
            <p id="confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;"><br></p>
            <?php }?>

            <label for="gender">Gender: </label>
            <select name="user[gender]">
                <option value="Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
                <option value="Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female
                </option>
                <option value="Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other
                </option>
            </select>


            <label for="experience">Biography: </label>
            <textarea name="lecturer[lbiography]" style="height: 150px;"><?php
     if(isset($moduleLeader))echo $moduleLeader['lbiography'];?></textarea>

        </div>


        <div class="formColumn2">

            <label for="birthdate">Birth Date: </label>
            <input type="date" name="user[birthdate]" <?php if(isset($user))echo 'value='.$user['birthdate'];?>>

            <label for="address">Address: </label>
            <textarea name="user[uaddress]" required><?php if(isset($user))echo $user['uaddress'];?></textarea>

            <label for="contact">Contact Number: </label>
            <input type="contact" name="user[ucontact]" required
                <?php if(isset($user))echo 'value='.$user['ucontact'];?>>

            <label for="email">Email Address: </label>
            <input type="email" name="user[uemail]" required <?php if(isset($user))echo 'value='.$user['uemail'];?>>


            <label for="experience">Experience(Example: 3 Years): </label>
            <input type="text" name="lecturer[lexperience]"
                <?php if(isset($moduleLeader))echo 'value="'.$moduleLeader['lexperience'].'"';?>>

                <input type="submit" value="Submit" name="submit" <?php if(!isset($user)){?> id="submission" <?php }?>>
        </div>
    </div>





</form>
