<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li><a href = "../">Resources</a></li>
  <li>Add Resource</li>
</ul>



<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($resource))echo 'Edit Resource for '.$module['mname'].' - '.$term['tname'];
    else {?>
    Add Resource for <?php echo $module['mname'].' - '.$term['tname'];?>
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label>Resource Name: </label>
    <input type = "text" name = "resource[rtitle]" required
    <?php if(isset($resource))echo 'value="'.$resource['rtitle'].'"';?>>



    <label>Resource Description: </label>
    <textarea style="height: 108px;" name = "resource[rdescription]"><?php if(isset($resource))echo $resource['rdescription'];?></textarea>



  </div>


  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">
    <label>Resource File: </label>
    <input type = "file" name = "resource[rfilenames]" required style="border: none; float: right;">

  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
