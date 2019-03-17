<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($moduleLeader))
  $moduleLeader=$moduleLeader->fetch();

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
      <b>Status: </b><?php echo $user['ustatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageModuleLeaders/delete/<?php echo $user['uid'];?>">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete User
      </div>
    </a>
  </div>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle" style="background: #6495ED;">
    <h1 class = "tableHeading">Other Module Leader Details</h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
    <b>Module Leader Other Role(s): </b>
    <?php if($moduleLeader['lrole']==""){
      echo "Not Available";
      }
      else
        echo $moduleLeader['lrole'];
      ?><br>

    <b>Experience: </b><?php echo $moduleLeader['lexperience'];?><br>
    <b>Biography: </b><?php echo $moduleLeader['lbiography'];?><br>

    <b>Modules Assigned: </b><br>
  </div>

</div>

<div class = "adminManageTable">

  <div class = "tableTitle" style="background: #D2B48C;">
    <h1 class = "tableHeading">Assign Module</h1>
  </div>










</div>


<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
    else {?>
    Add new Module Leader
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

<?php if(!isset($user)){?>
    <label for = "password">Password: </label>
    <input type = "password" name = "user[password]" required>

    <label for = "confirmpassword">Confirm Password: </label>
    <input type = "password" name = "confirmpassword" required>
<?php }?>


    <label for = "gender">Gender: </label>
    <select name = "user[gender]">
      <option value = "Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
      <option value = "Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female</option>
      <option value = "Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other</option>
    </select>


    <label for = "experience">Biography: </label>
    <textarea name = "lecturer[lbiography]" style="height: 150px;"><?php
     if(isset($moduleLeader))echo $moduleLeader['lbiography'];?></textarea>

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


    <label for = "experience">Experience(Example: 3 Years): </label>
    <input type = "text" name = "lecturer[lexperience]"
    <?php if(isset($moduleLeader))echo 'value="'.$moduleLeader['lexperience'].'"';?>>


  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
