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
      else if($var == 'editsuccess'){
        echo '<b>Successfully Edited Assignment</b>';
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

<?php
$assignments = getAssignmentsByTermId($term['tid']);
if($assignments->rowCount()>0){
  $assignment = $assignments->fetch();
  echo '<hr><br>';
?>
          <div class = "resourceHolder">

          <!-- Assignment Left Column -->
            <div class = "formHolder">
              <div class = "formColumn1">
                <p>
                  <b>Title: </b><?php echo $assignment['atitle'];?><br>
                  <b>Deadline: </b><?php echo $assignment['adeadline'];?><br>
                  <b>Description: </b><?php echo $assignment['adescription'];?><br>
                  <br>
                  <b>Assignment File: </b><?php echo $assignment['afiles'];?><br><br>
                </p>

              <!-- Edit Assignment Button -->
                  <a style="color: white;"
                  href = "/GroupProject/public/ModuleLeaderAssignments/browseAssignment/<?php echo $assignment['aid'];?>">';
                    <div class = "resourceBox" style = "background: blue;">
                      <img src = "/GroupProject/public/resources/images/edit.png" width="20">
                        Edit
                    </div>
                  </a>

              <!-- Delete Assignment Button -->
                  <a style="color: white;"
                  href = "/GroupProject/public/ModuleLeaderAssignments/deleteAssignment/<?php echo $assignment['aid'];?>">';
                    <div class = "resourceBox" style = "background: red;">
                      <img src = "/GroupProject/public/resources/images/deleteuser.png" width="20">
                        Delete
                    </div>
                  </a>
                </div>

              <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

            <!-- Assignment Right Column -->
                <div class = "formColumn2">
                  <div style=" text-align: center;">
                    <a target = "_blank" href = "/GroupProject/public/<?php echo $assignment['afiles'];?>" style="color: white;">
                      <img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
                    </a>
                  </div>
                <br>
                </div>
              </div>

            <br><br><hr>
          </div>
<?php
}
else{ // -- If no assignment is uploaded, display Add Assignment Button
?>
          <br>

          <!-- Add Assignment -->
          <div style = "text-align: center;">
            <a class = "courseModuleLink" href = "/GroupProject/public/ModuleLeaderAssignments/addAssignment/<?php echo $term['tid']?>">
              <div class = "courseModuleBox" style = "background: <?php echo generateRandomColor()?>;">
                  Add Assignment
                </div>
            </a>
          </div>
          <br>

<?php
      }
?>

      </p>
    </div>
  </div>

<?php
    }
  }
}
else{
  ?>

  <div class = "adminManageTable">
      <h2 style="color: red; text-align: center;">No Module Has Been Assigned To You Yet</h2>
  </div>

<?php
}
?>

<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
