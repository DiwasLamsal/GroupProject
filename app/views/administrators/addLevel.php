<?php

if(isset($level)){
  $level=$level->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $level['lvtitle']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Level Title: </b><?php echo $level['lvtitle'];?><br>
      <b>Alternate Name: </b><?php echo $level['lvaltname'];?><br>
      <b>Capacity: </b><?php echo $level['lvcapacity'];?> students<br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageLevels/delete/<?php echo $level['lvid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete Level
      </div>
    </a>
  </div>


</div>


<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($level))echo 'Edit Level Details';
    else {?>
    Add new level
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label>Level Title: </label>
    <input type = "text" name = "level[lvtitle]" required
    <?php if(isset($level))echo 'value="'.$level['lvtitle'].'"';?>>

    <label>Alternate Name: </label>
    <input type = "text" name = "level[lvaltname]" required
    <?php if(isset($level))echo 'value="'.$level['lvaltname'].'"';?>>

  </div>

  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">
    <label>Level Capacity: </label>
    <input type = "number" min="10" max = "5000" name = "level[lvcapacity]" required
    <?php if(isset($level))echo 'value="'.$level['lvcapacity'].'"'; else echo 'value="10"';?>>

  </div>

</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
