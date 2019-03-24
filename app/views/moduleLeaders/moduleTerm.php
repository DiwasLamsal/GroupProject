
<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li><a href="../">Modules</a></li>
  <li><?php echo $module['mname'].' - '.$term['tname'];?></li>
</ul>


<div class = "adminManageTable">
  <div class = "tableTitle" style="background: darkcyan;">
    <h1 class = "tableHeading"><?php echo $term['tname'].' - '.$module['mname'];?></h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
    <b>Term Status: </b><?php echo $term['tstatus'];?><br>
    <b>Term Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tsdate']));?><br>
    <b>Term End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tedate']));?><br>

    <br><hr><br>


  </div>


</div>
