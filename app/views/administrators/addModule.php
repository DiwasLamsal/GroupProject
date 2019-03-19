<?php

if(isset($module)){
  $module=$module->fetch();


  $leader = getUserById($module['mluid'])->fetch();
  $mCourse = getCourseById($module['mcid'])->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $module['mname'];?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Name: </b><?php echo $module['mname'];?><br>
      <b>Code: </b><?php echo $module['mcode'];?><br>
      <b>Description: </b><?php echo $module['mdescription'];?><br>
      <br>
      <b>Status: </b><?php echo $module['mstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>
    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageModules/delete/<?php echo $module['mid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete Module
      </div>
    </a>
  </div>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle" style="background: #6495ED;">
    <h1 class = "tableHeading">Other Module Details</h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">

    <b>Leader: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a>';
      echo $link;
    ?>
    <br>

    <b>Course: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageCourses/browse/'.$mCourse['cid'].'">'.
                $mCourse['ctitle'].'</a>';
      echo $link;
    ?>
    <br>


  </div>

</div>



<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($module))echo 'Edit '.$module['mname'];
    else {?>
    Add new Module
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label>Module Name: </label>
    <input type = "text" name = "module[mname]" required
    <?php if(isset($module))echo 'value="'.$module['mname'].'"';?>>


    <label for = "leader">Leader: </label>
    <select name = "module[mluid]">
      <?php
        while($user = $users->fetch()){
          if($user['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $user['uid'];?>"
          <?php if(isset($leader)&& $module['mluid']==$leader['uid'])echo 'selected';?>>
          <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
        </option>
      <?php }?>
    </select>



    <label for = "course">Course: </label>
    <select name = "module[mcid]">
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




  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <label>Module Code: </label>
    <input type = "text" name = "module[mcode]" required
    <?php if(isset($module))echo 'value="'.$module['mcode'].'"';?>>


    <label>Module Description: </label>
    <textarea style="height: 108px;" name = "module[mdescription]"><?php if(isset($module))echo $module['mdescription'];?></textarea>




  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
