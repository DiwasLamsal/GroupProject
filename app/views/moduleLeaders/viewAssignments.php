<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Assignments</li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
      if($var=="addsuccess"){
        echo '<b>Successfully Added Assignment</b>';
      }
      else if($var == 'deletesuccess'){
          echo '<b>Successfully Deleted Assignment</b>';
      }
      else{
        echo '<b>Error</b>';
      }

    ?>

  </div>
<?php }?>


<?php
$count = 0;

if($modules->rowCount() > 0){
  while($module = $modules->fetch()){
    $terms = getTermsByModuleId($module['mid']);

    while($term = $terms->fetch()){
    ++$count;
?>

<button class="collapsible  <?php if($count==1) echo 'active'?>" style="background: DarkCyan;">
  <b><?php echo $module['mname'].' - '.$term['tname'];?></b>
</button>

<!-- Buttons for displaying announcement description -->
  <div class="collapsedcontent" style="margin-bottom: 10px; <?php if($count==1) echo 'max-height: none;'?>">
    <!-- Content inside the collapsible -->
    <div style="margin: 10px; min-height: 90px;">
        <h2 style="text-align: center; margin-top: 20px;">Assignment for <?php echo $module['mname'].' - '.$term['tname'];?></h2>
        <br>

        <p style="text-align: center;">


          <br>
          <div style = "text-align: center;">
            <a class = "courseModuleLink" href = "/GroupProject/public/ModuleLeaderAssignments/addAssignment/<?php echo $term['tid']?>">
              <div class = "courseModuleBox" style = "background: <?php echo generateRandomColor()?>;">
                  Add Assignment
                </div>
            </a>
          </div>
          <br>

        </p>
    </div>
  </div>
<?php
    }
  }
}
else{
  ?>

  <div class = "adminManageTable" style="">
      <h2 style="color: red; text-align: center;">No Module Has Been Assigned To You Yet</h2>
  </div>


<?php
}
?>


<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
