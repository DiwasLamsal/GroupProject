<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li><a href = "../">Resources</a></li>
  <li>Add Resource</li>
</ul>

<form method = "POST" class = "userForm" enctype="multipart/form-data">

  <div class = "formTitle">
    <h1 class = "formHeading">
      <?php if(isset($resource))echo 'Edit Resource for '.$module['mname'].' - '.$term['tname'];
      else {?>
        Add Resource for <?php echo $module['mname'].' - '.$term['tname'];?>
      <?php } ?>
    </h1>
  </div>

  <div class = "formHolder flex-top">

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
      <input type = "file" name = "resourceFile" style="border: none; float: right;">
      <?php if(isset($resource))echo '<br><p>Note: Leave the upload empty and submit if you do not wish to change the file.</p>';?>
    </div>

  </div>
  <input type = "submit" value = "Submit" name = "submit">
</form>
