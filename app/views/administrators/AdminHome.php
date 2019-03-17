
<div class = "boxesContainer">

  <div class = "adminDashboardBox adbstudents">
    <img src = "resources/images/student.png" alt = "Students">
    200 Students
  </div>


  <div class = "adminDashboardBox adbmoduleleaders">
    <img src = "resources/images/teacher.png" alt = "Module Leaders">
    150 Module Leaders
  </div>


  <div class = "adminDashboardBox adbcourses">
    <img src = "resources/images/course.png" alt = "Courses">
    12 Courses
  </div>


  <div class = "adminDashboardBox adbmodules">
    <img src = "resources/images/module.png" alt = "Modules">
    64 Modules
  </div>

</div>

<div class = "boxesContainer">
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title" style="background: olive;">Tutorial</div>
    <div class = "content" style="margin:0; max-height: 295px;">
      <video src = "resources/videos/tutorial.mp4#t=07,20" width="100%" height="295px" controls>Video Not Found</video>
    </div>
  </div>


  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title" style="background: red;">Recent Announcements</div>
    <div class = "content" style="margin:0; overflow-Y: auto; max-height: 295px; text-align: left;" id="customScroll">
      <?php
        while($announcement = $announcements->fetch()){
          if($announcement['anstatus']=='N')
            continue;
          echo '<a href = "/GroupProject/public/ManageAnnouncements/browse/'.$announcement['anid'].'" style="color: black;"><div class = "subContentList"><b>';
            echo $announcement['antitle'];
          echo '</b></div></a>';
        }

      ?>
    </div>

  </div>


</div>
