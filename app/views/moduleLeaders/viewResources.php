<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Resources</li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
      if($var=="addsuccess"){
        echo '<b>Successfully Added Resource</b>';
      }
      else{
        echo '<b>Error</b>';
      }

    ?>

  </div>
<?php }?>


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
  <div class="collapsedcontent" style="margin-bottom: 10px; <?php if($count==1) echo 'max-height: none;'?>">
    <!-- Content inside the collapsible -->
    <div style="margin: 10px; min-height: 90px;">
        <h2 style="text-align: center; margin-top: 20px;">Resources for <?php echo $module['mname'].' - '.$term['tname'];?></h2>
        <br>
<!-- Resource Contents go here -->
        <p style="text-align: center;">

          <?php

          $resources = getResourcesByTermId($term['tid']);
            $resourceCount = 0;
            while($resource = $resources->fetch()){
              ++$resourceCount;
              if($resourceCount==1) echo '<hr>';
          ?>
          <br>
            <div class = "resourceHolder">

              <div class = "formHolder">
                <div class = "formColumn1">
                  <p>
                    <b>Resource Title: </b><?php echo $resource['rtitle'];?><br>
                    <b>Resource Description: </b><?php echo $resource['rdescription'];?><br>
                    <b>Resource File: </b><?php echo $resource['rfilenames'];?><br><br>
              </p>


<!-- Edit Resource Button -->
                <a style="color: white;"
                href = "/GroupProject/public/ModuleLeaderResources/browse/<?php echo $resource['rid'];?>">';
                <div class = "resourceBox" style = "background: blue;">
                  <img src = "/GroupProject/public/resources/images/edit.png" width="20">
                    Edit
                </div>
                </a>
<!-- Delete Resource Button -->
                <a style="color: white;"
                  href = "/GroupProject/public/ModuleLeaderResources/delete/<?php echo $resource['rid'];?>">';
              <div class = "resourceBox" style = "background: red;">
                <img src = "/GroupProject/public/resources/images/deleteuser.png" width="20">
                  Delete
              </div>
              </a>



              <br>


                </div>
                <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>
                <div class = "formColumn2">
                  <div style=" text-align: center;">
                    <a target = "_blank" href = "<?php echo $resource['rfilenames'];?>" style="color: white;">
                      <img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
                    </a>
                  </div>
                <br>
                </div>
              </div>

              <br><hr>
            </div>
          <?php } ?>
          <br>
          <div style = "text-align: center;">
            <a class = "courseModuleLink" href = "/GroupProject/public/ModuleLeaderResources/addResource/<?php echo $term['tid']?>">
              <div class = "courseModuleBox" style = "background: <?php echo generateRandomColor()?>;">
                  Add Resource
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
?>



<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
