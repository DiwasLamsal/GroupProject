
<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li><a href="../">Modules</a></li>
  <li><?php echo $module['mname'].' - '.$term['tname'];?></li>
</ul>


<div class = "adminManageTable">
  <div class = "tableTitle" style="background: darkcyan;">
    <h1 class = "tableHeading"><?php echo $module['mname'].' - '.$term['tname'];?></h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
    <b>Term Status: </b><?php echo $term['tstatus'];?><br>
    <b>Term Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tsdate']));?><br>
    <b>Term End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tedate']));?><br>

    <br><br>
      <div style = "text-align: center;">
        <a class = "courseModuleLink" href = "/GroupProject/public/ModuleLeaderResources/addResource/<?php echo $term['tid']?>">
          <div class = "courseModuleBox" style = "background: <?php echo generateRandomColor()?>;">
              Add Resources
            </div>
          </a>

      </div>



  </div>
</div>
