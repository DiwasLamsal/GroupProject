
<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Announcements</li>
</ul>

<?php
  $count = 0;
    while($announcement = $announcements->fetch()){
      $count++;

      if($selected['anid']==$announcement['anid']){
        $flag = true;
      }
      else if($selected == "" && $count == 1){
        $flag = true;
      }
      else{
        $flag = false;
      }
?>

    <!-- Buttons for displaying announcements -->
    <button class="collapsible <?php if($flag) echo 'active';?>">
      <?php echo '<b>'.$announcement['antitle'].'</b>';?>
      <b class = "announcementDate" style = "float: right;"><?php echo date("l\, jS-F-Y", strtotime($announcement['andate']));?></b>
    </button>

    <!-- Buttons for displaying announcement description -->
      <div class="collapsedcontent" <?php if($flag) echo 'style = "max-height: 1000px;""';?>>
        <p>
            <?php
              echo '<br>'.$announcement['andescription'].'<br><br>';

            ?>
        </p>
      </div>

<?php
      }
?>

<script>
  toggleCollapse();
</script>
