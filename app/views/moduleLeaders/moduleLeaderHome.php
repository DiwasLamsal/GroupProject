
<div class = "boxesContainer">
  <div class = "contentBoxLarge tutorialVideo">
    <div class = "title">Tutorial</div>
    <div class = "content" style="margin:0; max-height: 295px;">
      <video src = "resources/videos/tutorial.mp4#t=07,20" width="100%" height="295px" controls>Video Not Found</video>
    </div>
  </div>


  <div class = "contentBoxLarge recentAnnouncements">
    <div class = "title">Recent Announcements</div>
    <div class = "content" style="margin:0; overflow-Y: auto; max-height: 295px; text-align: left;" id="customScroll">
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

<h1>


</h1>
