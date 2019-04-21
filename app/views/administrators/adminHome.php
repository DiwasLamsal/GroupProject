
<div class = "boxesContainer">


  <div class = "adminDashboardBox adbstudents">
    <a href = "/GroupProject/public/ManageStudents">
      <img src = "resources/images/student.png" alt = "Students">
      <?php echo $count['students']; ?> Students
    </a>
  </div>

 
  <div class = "adminDashboardBox adbmoduleleaders">
    <a href = "/GroupProject/public/ManageModuleLeaders">
      <img src = "resources/images/teacher.png" alt = "Module Leaders">
      <?php echo $count['moduleLeaders']; ?> Module Leaders
    </a>
  </div>


  <div class = "adminDashboardBox adbcourses">
    <a href = "/GroupProject/public/ManageCourses">
      <img src = "resources/images/course.png" alt = "Courses">
      <?php echo $count['courses']; ?> Courses
    </a>
  </div>


  <div class = "adminDashboardBox adbmodules">
    <a href = "/GroupProject/public/ManageModules">
      <img src = "resources/images/module.png" alt = "Modules">
      <?php echo $count['modules']; ?> Modules
    </a>
  </div>

</div>

<div class = "boxesContainer">
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title">Attendance</div>
    <div id="container" style="height: 400px; width: 500px"></div>
    <script>
    
    var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'container',
    marginBottom: 80
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]        
  }]
});
    </script>
  </div>
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title">Tutorial</div>
    <div class = "content" style="margin:0; max-height: 395px;">
      <video src = "resources/videos/tutorial.mp4#t=07,20" width="100%" height="395px" controls>Video Not Found</video>
    </div>
  </div>


  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title">Recent Announcements</div>
    <div class = "content" style="margin:0; overflow-Y: auto; height: 395px; text-align: left;" id="customScroll">
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
