
<?php $user = getUserById($student['suid'])->fetch();?>

<div class="boxesContainer boxesContainerManage">
  <div class="contentBoxLarge contentBoxLargeEdit">
      <div class="title">
          Your Details
      </div>
      <div class="content" style="text-align: left; margin: 0; line-height: 1.5; width: 100%">
          <table class="tableborder" style="word-wrap: break-word; width: 100%;">
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
                      <th>Previous GPA: </th>
                      <td><?php echo $student['gpa'];?></td>
                  </tr>
                  <tr>
                      <th>Previous School: </th>
                      <td><?php echo $student['prevschool'];?></td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>


<div class="boxesContainer boxesContainerManage">
  <div class="contentBoxLarge contentBoxLargeEdit">
      <div class="title">
          Course Details
      </div>
      <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
          <b>Course Title: </b>
                <?php echo $course['ctitle'];?>
                <br>
          <b>Course Description: </b>
                <?php echo $course['cdescription'];?>
      </div>
  </div>

  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title">Modules</div>
    <div class = "content" style="margin:0; overflow-Y: auto; min-height: 200px; max-height: 250px; text-align: left;" id="customScroll">
      <?php
        while($module = $modules->fetch()){
          echo '<div class = "subContentList"><b>';
            echo $module['mname'];
          echo '</b></div>';
        }
      ?>
    </div>
  </div>
</div>




<div class = "boxesContainer">
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title">Tutorial</div>
    <div class = "content" style="margin:0;">
      <video src = "resources/videos/tutorial.mp4#t=07,20" width="100%" style="max-height:303px;" controls>Video Not Found</video>
    </div>
  </div>


  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title">Recent Announcements</div>
    <div class = "content" style="margin:0; overflow-Y: auto; max-height: 303px; text-align: left;" id="customScroll">
      <?php
        while($announcement = $announcements->fetch()){
          if($announcement['anstatus']=='N')
            continue;
          echo '<a href = "/GroupProject/public/StudentAnnouncements/index/'.$announcement['anid'].'" style="color: black;"><div class = "subContentList"><b>';
            echo $announcement['antitle'];
          echo '</b></div></a>';
        }

      ?>
    </div>

  </div>


</div>

<h1>


</h1>
