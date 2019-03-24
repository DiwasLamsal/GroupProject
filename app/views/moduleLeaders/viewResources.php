<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Resources</li>
</ul>

<?php
$count = 0;
  while($module = $modules->fetch()){
    $terms = getTermsByModuleId($module['mid']);

    while($term = $terms->fetch()){
    ++$count;
?>

<button class="collapsible  <?php if($count==1) echo 'active'?>" style="background: DarkCyan;">
  <b><?php echo $module['mname'].' - '.$term['tname'];?></b>
</button>

<!-- Buttons for displaying announcement description -->
  <div class="collapsedcontent" style="margin-bottom: 10px; <?php if($count==1) echo 'max-height: 1000px;'?>">
    <!-- Content inside the collapsible -->
    <div style="margin: 10px; min-height: 90px;">
        <h2 style="text-align: center; margin-top: 20px;">Resources for <?php echo $module['mname'].' - '.$term['tname'];?></h2>
        <br>
<!-- Resource Contents go here -->
        <p>

              No Resource Available. You can add resources
              <a style="color: blue;" href = "/GroupProject/public/ModuleLeaderModules/moduleTerm/<?php echo $term['tid']?>">
                <u>from here</u>
              </a>.







        </p>
    </div>
  </div>
<?php
    }
  }
?>



<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
