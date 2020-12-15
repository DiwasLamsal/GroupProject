<div class = "boxesContainer">

    <div class = "adminDashboardBox adbmoduleleaders">
      <a href = "/GroupProject/public/ModuleLeaderSubmissions">
        <img src = "resources/images/submission.png" alt = "Submissions">
        Student Submissions
      </a>
    </div>

    <div class = "adminDashboardBox adbmodules">
      <a href = "/GroupProject/public/ModuleLeaderModules">
        <img src = "resources/images/module.png" alt = "Modules">
        <?php echo $count['modules']; ?> <?php echo $count['modules']<=1?'Module':'Modules';?> Assigned
      </a>
    </div>

    <div class = "adminDashboardBox adbcourses">
      <a href = "#">
        <img src = "resources/images/course.png" alt = "Courses">
        <?php echo $count['courses']; ?> <?php echo $count['courses']<=1?'Course':'Courses';?> Assigned
      </a>
    </div>


    <div class = "adminDashboardBox adbstudents">
      <a href = "/GroupProject/public/ModuleLeaderPAT">
        <img src = "resources/images/student.png" alt = "Students">
        <?php echo $count['students']; ?> <?php echo $count['students']<=1?'Student':'Students';?> Assigned
      </a>
    </div>

</div>

<div class="boxesContainer boxesContainerManage">
    <div class="contentBoxLarge contentBoxLargeEdit">
        <div class="title">
            Your Details
        </div>
        <div class="content" style="text-align: left; margin: 0; line-height: 1.5; width: 100%">
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
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class = "boxesContainer">
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title">Tutorial</div>
    <div class = "content" style="margin:0;">
      <video src = "resources/videos/tutorial.mp4" width="100%" style="max-height:303px;" controls>Video Not Found</video>
    </div>
  </div>


  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title">Recent Announcements</div>
    <div class = "content" style="margin:0; overflow-Y: auto; max-height: 303px; text-align: left;" id="customScroll">
      <?php
      while($announcement = $announcements->fetch()){
        if($announcement['anstatus']=='N')
          continue;
        echo '<a href = "/GroupProject/public/ModuleLeaderAnnouncements/index/'.$announcement['anid'].'" style="color: black;"><div class = "subContentList"><b>';
        echo $announcement['antitle'];
        echo '</b></div></a>';
      }
      ?>
    </div>
  </div>
</div>
