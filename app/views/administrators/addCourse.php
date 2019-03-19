<?php

if(isset($course)){
  $course=$course->fetch();

  $leader = getUserById($course['cuid'])->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $course['ctitle']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Course Title: </b><?php echo $course['ctitle'];?><br>
      <b>Course Description: </b><?php echo $course['cdescription'];?><br><br>
      <b>Course Leader:
      <?php
        $link = '<a target="_blank" style="color:tomato;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                  $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a>';
        echo $link;
      ?>
      </b>
      <br>
      <b>Total Students Enrolled in this Course: </b><?php echo getTotalStudentsInCourse($course['cid']); ?><br>
      <b>Status: </b><?php echo $course['cstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageCourses/delete/<?php echo $course['cid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete Course
      </div>
    </a>
  </div>


</div>


<div class = "adminManageTable" style="padding-bottom: 20px;">

  <div class = "tableTitle" style="background: #6495ED;">
    <h1 class = "tableHeading">Modules Under this Course</h1>
  </div>


  <?php

// https://stackoverflow.com/questions/9612061/random-background-color-from-array-php

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

    if($count==0) echo "<b>No Module Available</b>";

  ?>


</div>



<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($course))echo 'Edit Course Details';
    else {?>
    Add new Course
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label>Course Title: </label>
    <input type = "text" name = "course[ctitle]" required
    <?php if(isset($course))echo 'value="'.$course['ctitle'].'"';?>>

    <label>Course Leader: </label>

    <select name = "leader">
    <?php
      while($user = $users->fetch()){

    ?>
      <option value = "<?php echo $user['uid'];?>" <?php if(isset($course) && $course['cuid']==$user['uid'])echo 'selected';?>>
        <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
      </option>
    <?php }?>
    </select>
  </div>

  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">
    <label>Course Description: </label>
    <textarea style="height: 108px;" name = "course[cdescription]"><?php if(isset($course))echo $course['cdescription'];?></textarea>

  </div>

</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
