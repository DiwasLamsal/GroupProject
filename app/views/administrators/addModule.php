<?php

if(isset($module)){
  $module=$module->fetch();


  $leader = getUserById($module['mluid'])->fetch();
  $mCourse = getCourseById($module['mcid'])->fetch();
  $mLevel = getLevelById($module['mlvid'])->fetch();

  $term1 = $terms->fetch();
  $term2 = $terms->fetch();


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

    <b>Level: </b>
    <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageLevels/browse/'.$mLevel['lvid'].'">'.
                $mLevel['lvtitle'].' - '.$mLevel['lvaltname'].'</a>';
      echo $link;
    ?>
    <br>
    <br><hr>
    <br>

    <b>Term I Status: </b><?php echo $term1['tstatus'];?><br>
    <b>Term I Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term1['tsdate']));?><br>
    <b>Term I End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term1['tedate']));?><br>

    <br><hr><br>

    <b>Term II Status: </b><?php echo $term2['tstatus'];?><br>
    <b>Term II Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term2['tsdate']));?><br>
    <b>Term II End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term2['tedate']));?><br>


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
          <?php if(isset($module)&& $module['mluid']==$user['uid'])echo 'selected';?>>
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
          <?php if(isset($mCourse)&& $module['mcid']==$course['cid'])echo 'selected';?>>
          <?php echo $course['ctitle'];?>
        </option>
      <?php }?>
    </select>


    <label for = "level">Level: </label>
    <select name = "module[mlvid]">
      <?php
        while($level = $levels->fetch()){
          if($level['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $level['lvid'];?>"
          <?php if(isset($mLevel)&& $module['mlvid']==$level['lvid'])echo 'selected';?>>
          <?php echo $level['lvtitle'].' - '.$level['lvaltname'];?>
        </option>
      <?php }?>
    </select>

    <label>Module Code: </label>
    <input type = "text" name = "module[mcode]" required
    <?php if(isset($module))echo 'value="'.$module['mcode'].'"';?>>


    <label>Module Description: </label>
    <textarea style="height: 108px;" name = "module[mdescription]"><?php if(isset($module))echo $module['mdescription'];?></textarea>


  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <h3 style="text-align: center;">Terms</h3>
    <br>


    <label>Term I Start Date: </label>
    <input type = "date" name = "term1start" id = "datePickerToday"
    value = "<?php if(isset($module)) echo $term1['tsdate']; ?>">
    <label>Term I End Date: </label>
    <input type = "date" name = "term1end" id = "datePickerFiveMonths"
    value = "<?php if(isset($module)) echo $term1['tedate']; ?>">

    <br>
    <br>

    <label>Term II Start Date: </label>
    <input type = "date" id = "datePickerFiveMonthsII" name = "term2start"
    value = "<?php if(isset($module)) echo $term2['tsdate']; ?>">
    <label>Term II End Date: </label>
    <input type = "date" id = "datePickerTenMonths" name = "term2end"
    value = "<?php if(isset($module)) echo $term2['tedate']; ?>">


  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>

<?php if(!isset($module)) echo '<script>setDate();</script>'?>
