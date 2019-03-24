<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Resources</li>
</ul>


<button class="collapsible" style="background: DarkSlateBlue;">
  <b><?php echo $module['mname'].' - '.$term['tname'];?></b>
</button>

<!-- Buttons for displaying announcement description -->
  <div class="collapsedcontent">
    <p>
        <?php
          echo '<br>'.$announcement['andescription'].'<br><br>';
        ?>
    </p>
  </div>



<script>
  toggleCollapse();
</script>
