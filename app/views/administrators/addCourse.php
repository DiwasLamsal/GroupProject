<?php

if(isset($course)){
  $course=$course->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $course['ctitle']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Course Title: </b><?php echo $course['ctitle'];?><br>
      <b>Course Description: </b><?php echo $course['cdescription'];?><br>
      <b>Course Leader: </b><?php echo $course['cuid'];?><br>
      <b>Status: </b><?php echo $course['cstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageCourses/delete/<?php echo $course['cid'];?>">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete Course
      </div>
    </a>
  </div>


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
    <?php if(isset($course))echo 'value='.$course['ctitle'].'"';?>>

    <label>Course Leader: </label>
    <select>
      <option value = "NULL">Ram</option>
      <option value = "NULL">Chandra</option>
      <option value = "NULL">Thakur</option>
    </select>
  </div>

  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">
    <label>Course Description: </label>
    <textarea style="height: 130px;" name = "course[cdescription]"><?php if(isset($course))echo $course['cdescription'];?></textarea>

  </div>

</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
