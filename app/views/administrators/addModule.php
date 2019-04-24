<?php

if(isset($module)){
  $module=$module->fetch();


  $leader = getUserById($module['mluid'])->fetch();
  $mCourse = getCourseById($module['mcid'])->fetch();
  $mLevel = getLevelById($module['mlvid'])->fetch();

  $term1 = $terms->fetch();
  $term2 = $terms->fetch();


?>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

        <div class="title">
            <?php echo $module['mname'];?>
        </div>
        <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $module['mname'];?></td>
                    </tr>
                    <tr>
                        <th>Code:</th>
                        <td><?php echo $module['mcode'];?></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td><?php echo $module['mdescription'];?></td>
                    </tr>
                    <tr>
                        <th>Status: </th>
                        <td><?php echo $module['mstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?></td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a href="/GroupProject/public/ManageModules/delete/<?php echo $module['mid'];?>">

                                <img src="/GroupProject/public/resources/images/deleteuser.png" width="150">


                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>



</div>


<div class="adminManageTable">

    <div class="tableTitle">
        <h1 class="tableHeading">Other Module Details</h1>
    </div>

    <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
        <table class="tableborder">
            <tbody>
                <tr>
                    <th>Leader: </th>
                    <td><?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a>';
      echo $link;
    ?></td>
                </tr>
                <tr>
                    <th>
                        Course:
                    </th>
                    <td> <?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageCourses/browse/'.$mCourse['cid'].'">'.
                $mCourse['ctitle'].'</a>';
      echo $link;
    ?></td>
                </tr>
                <tr>
                    <th>Level:</th>
                    <td><?php
      $link = '<a target="_blank" style="color:blue;" href = "/GroupProject/public/ManageLevels/browse/'.$mLevel['lvid'].'">'.
                $mLevel['lvtitle'].' - '.$mLevel['lvaltname'].'</a>';
      echo $link;
    ?></td>
                </tr>
            </tbody>
        </table>

        <br>

        <table class="tableborder">
            <tbody>
                <tr>
                  <th>Term I Status:</th>
                  <td><?php echo $term1['tstatus'];?></td>
                </tr>
                <tr>
                  <th>Term I Start Date:</th>
                  <td><?php echo date("l\, jS-F-Y", strtotime($term1['tsdate']));?></td>
                </tr>
                <tr>
                  <th>Term I End Date: </th>
                  <td><?php echo date("l\, jS-F-Y", strtotime($term1['tedate']));?></td>
                </tr>
            </tbody>
        </table>

<br>
        <table class="tableborder">
            <tbody>
                <tr>
                  <th>Term II Status:</th>
                  <td><?php echo $term2['tstatus'];?></td>
                </tr>
                <tr>
                  <th>Term II Start Date:</th>
                  <td><?php echo date("l\, jS-F-Y", strtotime($term2['tsdate']));?></td>
                </tr>
                <tr>
                  <th>Term II End Date: </th>
                  <td><?php echo date("l\, jS-F-Y", strtotime($term2['tedate']));?></td>
                </tr>
            </tbody>
        </table>


    </div>

</div>


<?php

}

?>

<form method="POST" class="userForm">

    <div class="formTitle">
        <h1 class="formHeading">
            <?php if(isset($module))echo 'Edit '.$module['mname'];
    else {?>
            Add new Module
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder flex-top">

        <div class="formColumn1">
            <label>Module Name: </label>
            <input type="text" name="module[mname]" required
                <?php if(isset($module))echo 'value="'.$module['mname'].'"';?>>


            <label for="leader">Leader: </label>
            <select name="module[mluid]">
                <?php
        while($user = $users->fetch()){
          if($user['status']=="N")
            continue;
      ?>
                <option value="<?php echo $user['uid'];?>"
                    <?php if(isset($module)&& $module['mluid']==$user['uid'])echo 'selected';?>>
                    <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
                </option>
                <?php }?>
            </select>



            <label for="course">Course: </label>
            <select name="module[mcid]">
                <?php
        while($course = $courses->fetch()){
          if($course['status']=="N")
            continue;
      ?>
                <option value="<?php echo $course['cid'];?>"
                    <?php if(isset($mCourse)&& $module['mcid']==$course['cid'])echo 'selected';?>>
                    <?php echo $course['ctitle'];?>
                </option>
                <?php }?>
            </select>


            <label for="level">Level: </label>
            <select name="module[mlvid]">
                <?php
        while($level = $levels->fetch()){
          if($level['status']=="N")
            continue;
      ?>
                <option value="<?php echo $level['lvid'];?>"
                    <?php if(isset($mLevel)&& $module['mlvid']==$level['lvid'])echo 'selected';?>>
                    <?php echo $level['lvtitle'].' - '.$level['lvaltname'];?>
                </option>
                <?php }?>
            </select>

            <label>Module Code: </label>
            <input type="text" name="module[mcode]" required
                <?php if(isset($module))echo 'value="'.$module['mcode'].'"';?>>


            <label>Module Description: </label>
            <textarea style="height: 108px;"
                name="module[mdescription]"><?php if(isset($module))echo $module['mdescription'];?></textarea>


        </div>


        <div class="formColumnSeparator"></div>

        <div class="formColumn2">

            <h3 style="text-align: center;">Terms</h3>
            <br>


            <label>Term I Start Date: </label>
            <input type="date" name="term1start" id="datePickerToday"
                value="<?php if(isset($module)) echo $term1['tsdate']; ?>">
            <label>Term I End Date: </label>
            <input type="date" name="term1end" id="datePickerFiveMonths"
                value="<?php if(isset($module)) echo $term1['tedate']; ?>">

            <br>
            <br>

            <label>Term II Start Date: </label>
            <input type="date" id="datePickerFiveMonthsII" name="term2start"
                value="<?php if(isset($module)) echo $term2['tsdate']; ?>">
            <label>Term II End Date: </label>
            <input type="date" id="datePickerTenMonths" name="term2end"
                value="<?php if(isset($module)) echo $term2['tedate']; ?>">
                <input type="submit" value="Submit" name="submit">

        </div>
    </div>





</form>

<?php if(!isset($module)) echo '<script>setDate();</script>'?>
