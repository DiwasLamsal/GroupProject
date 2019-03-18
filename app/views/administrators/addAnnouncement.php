<?php

if(isset($announcement)){
  $announcement=$announcement->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $announcement['antitle']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Announcement Title: </b><?php echo $announcement['antitle'];?><br>
      <b>Announcement Description: </b><?php echo $announcement['andescription'];?><br>
      <b>Publish Date: </b><?php echo $announcement['andate'];?><br>
      <b>Status: </b><?php echo $announcement['anstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageAnnouncements/delete/<?php echo $announcement['anid'];?>">
      <div style="width: 100%; height: 92%; padding-top: 4%;">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete Announcement
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
    <?php if(isset($announcement))echo 'Edit Announcement Details';
    else {?>
    Add new Announcement
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label>Announcement Title: </label>
    <input type = "text" name = "announcement[antitle]" required
    <?php if(isset($announcement))echo 'value="'.$announcement['antitle'].'"';?>>

    <label>Announcement Description: </label>
    <textarea style="height: 130px;" name = "announcement[andescription]"><?php if(isset($announcement))echo $announcement['andescription'];?></textarea>

  </div>

  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

  </div>

</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
