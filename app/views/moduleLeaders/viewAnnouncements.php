
<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Announcements</li>
</ul>



<?php
    while($announcement = $announcements->fetch()){ ?>

      <!-- Buttons for displaying announcements -->
    <button class="collapsible" style="background: <?php echo generateRandomColor();?>">
      <?php echo '<b>'.$announcement['antitle'].'</b>';?>
      <b style = "float: right;"><?php echo date("l\, jS-F-Y", strtotime($announcement['andate']));?></b>
    </button>

    <!-- Buttons for displaying announcement description -->
      <div class="collapsedcontent">
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
