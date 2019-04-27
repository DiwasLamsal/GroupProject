<?php

if(isset($announcement)){
  $announcement=$announcement->fetch();

?>


<div class="boxesContainer boxesContainerManage">
    <div class="contentBoxLarge contentBoxLargeEdit">
        <div class="title">
            <?php echo $announcement['matitle']; ?>
        </div>
        <div class="content" style="text-align: left; margin: 0px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                      <th>Announcement Title:</th>
                      <td><?php echo $announcement['matitle'];?></td>
                    </tr>
                    <tr>
                      <th>Announcement Description:</th>
                      <td><?php echo $announcement['madescription'];?></td>
                    </tr>
                    <tr>
                      <th>Publish Date:</th>
                      <td><?php echo $announcement['madate'];?></td>
                    </tr>
                    <tr>
                      <th>Action</th>
                        <td><a style = "color: red;" href="/GroupProject/public/ModuleLeaderModules/deleteAnnouncement/<?php echo $announcement['maid'];?>">Delete</a>
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
}
?>

<form method="POST" class="userForm">
    <div class="formTitle">
        <h1 class="formHeading">
            <?php if(isset($announcement))echo 'Edit Announcement Details';
    else {?>
            Add Announcement for <?php echo $module['mname'].' - '.$term['tname'];?>
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder flex-top">
        <div class="formColumn1">
            <label>Announcement Title: </label>
            <input type="text" name="announcement[matitle]" required
                <?php if(isset($announcement))echo 'value="'.$announcement['matitle'].'"';?>>

            <label>Announcement Description: </label>
            <textarea style="height: 130px;"
                name="announcement[madescription]"><?php if(isset($announcement))echo $announcement['madescription'];?></textarea>
                <input type="submit" value="Submit" name="submit">

        </div>
    </div>
</form>
