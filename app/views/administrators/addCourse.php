<?php

if(isset($course)){
  $course=$course->fetch();

  $leader = getUserById($course['cuid'])->fetch();

?>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

        <div class="title">
            <?php echo $course['ctitle']; ?>
        </div>
        <div class="content" style="text-align: left; margin: 0px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                        <th>Course Title: </th>
                        <td><?php echo $course['ctitle'];?></td>
                    </tr>
                    <tr>
                        <th>Course Description: </th>
                        <td><?php echo $course['cdescription'];?></td>
                    </tr>
                    <tr>
                        <th>Course Leader:</th>
                        <td> <?php
        $link = '<a target="_blank" style="color:#717ede;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                  $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a>';
        echo $link;
      ?></td>
                    </tr>
                    <tr>
                        <th>Total Students Enrolled in this Course: </th>
                        <td><?php echo getTotalStudentsInCourse($course['cid']); ?></td>
                    </tr>
                    <tr>
                        <th>Status:  </th>
                        <td><?php echo $course['cstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?></td>
                    </tr>
                    <tr>
                      <th>Action</th>
                      <td>
                        <a id="myBtn"><img src="/GroupProject/public/resources/images/deleteuser.png" width="150"></a>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>

<?php echo $modal;?>


<div class="adminManageTable" style="padding-bottom: 20px;">

    <div class="tableTitle">
        <h1 class="tableHeading">Modules Under this Course</h1>
    </div>


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

    if($count==0) echo "<b>No Module Available</b>";

  ?>


</div>



<?php

}

?>

<form method="POST" class="userForm">

    <div class="formTitle">
        <h1 class="formHeading">
            <?php if(isset($course))echo 'Edit Course Details';
    else {?>
            Add new Course
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder flex-top">

        <div class="formColumn1">
            <label>Course Title: </label>
            <input type="text" name="course[ctitle]" required
                <?php if(isset($course))echo 'value="'.$course['ctitle'].'"';?>>

            <label>Course Leader: </label>

            <select name="leader">
                <?php
      while($user = $users->fetch()){

    ?>
                <option value="<?php echo $user['uid'];?>"
                    <?php if(isset($course) && $course['cuid']==$user['uid'])echo 'selected';?>>
                    <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
                </option>
                <?php }?>
            </select>
            <label>Course Description: </label>
            <textarea style="height: 108px;"
                name="course[cdescription]"><?php if(isset($course))echo $course['cdescription'];?></textarea>
                <input type="submit" value="Submit" name="submit">
        </div>


    </div>





</form>
