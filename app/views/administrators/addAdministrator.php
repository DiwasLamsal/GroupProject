<?php

if(isset($user)){
  $user=$user->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Login ID: </b><?php echo $user['uid'];?><br>
      <b>Full Name: </b><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?><br>
      <b>Gender: </b><?php echo $user['gender'];?><br>
      <b>Birthdate: </b><?php echo $user['birthdate'];?><br>
      <b>Address: </b><?php echo $user['uaddress'];?><br>
      <b>Contact No: </b><?php echo $user['ucontact'];?><br>
      <b>Email Address: </b><?php echo $user['uemail'];?><br>
      <b>Status: </b><?php echo $user['ustatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageAdministrators/delete/<?php echo $user['uid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete User
      </div>
    </a>
  </div>


</div>


<form method = "POST" class = "userForm">

  <div class = "formTitle formEditPassword">
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
    Add new Administrator
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label for = "firstname">First Name: </label>
    <input type = "text" name = "user[fname]" required
    <?php if(isset($user))echo 'value='.$user['fname'];?>>

    <label for = "middlename">Middle Name: </label>
    <input type = "text" name = "user[mname]"
    <?php if(isset($user))echo 'value='.$user['mname'];?>>

    <label for = "lastname">Surame: </label>
    <input type = "text" name = "user[lname]" required
    <?php if(isset($user))echo 'value='.$user['lname'];?>>

<?php if(!isset($user)){?>
    <label for = "password">Password: </label>
    <input type = "password" onkeyup="checkPassword()" name = "user[password]" id = "password" required>
    <p id = "passtest" style="font-size: 15px; color: red; margin-bottom: 20px;">Passwords must contain more than 8 characters</p>

    <label for = "confirmpassword">Confirm Password: </label>
    <input type = "password" onkeyup="checkPassword()" name = "confirmpassword" id = "confirmpassword" required>
    <p id = "confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;"><br></p>
<?php }?>


    <label for = "gender">Gender: </label>
    <select name = "user[gender]">
      <option value = "Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
      <option value = "Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female</option>
      <option value = "Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other</option>
    </select>

  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <label for = "birthdate">Birth Date: </label>
    <input type = "date" name = "user[birthdate]" <?php if(isset($user))echo 'value='.$user['birthdate'];?>>

    <label for = "address">Address: </label>
    <textarea name = "user[uaddress]" required><?php if(isset($user))echo $user['uaddress'];?></textarea>

    <label for = "contact">Contact Number: </label>
    <input type = "contact" name = "user[ucontact]" required
    <?php if(isset($user))echo 'value='.$user['ucontact'];?>>

    <label for = "email">Email Address: </label>
    <input type = "email" name = "user[uemail]" required
    <?php if(isset($user))echo 'value='.$user['uemail'];?>>

  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit" <?php if(!isset($user)){?> id = "submission" <?php }?>>


</form>
