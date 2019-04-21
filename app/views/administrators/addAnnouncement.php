<?php

if(isset($announcement)){
  $announcement=$announcement->fetch();

?>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

        <div class="title">
            <?php echo $announcement['antitle']; ?>
        </div>
        <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                      <th>Announcement Title:</th>
                      <td><?php echo $announcement['antitle'];?></td>
                    </tr>
                    <tr>
                      <th>Announcement Description:</th>
                      <td><?php echo $announcement['andescription'];?></td>
                    </tr>
                    <tr>
                      <th>Publish Date:</th>
                      <td><?php echo $announcement['andate'];?></td>
                    </tr>
                    <tr>
                      <th>Status:</th>
                      <td><?php echo $announcement['anstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                         '<font color = "red">Archived</font>';?></td>
                    </tr>
                    <tr>
                      <th>Action</th>
                      <td><a href="/GroupProject/public/ManageAnnouncements/delete/<?php echo $announcement['anid'];?>">
      
                <img src="/GroupProject/public/resources/images/deleteuser.png" width="150">
        </a></td>
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
            Add new Announcement
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder">

        <div class="formColumn1">
            <label>Announcement Title: </label>
            <input type="text" name="announcement[antitle]" required
                <?php if(isset($announcement))echo 'value="'.$announcement['antitle'].'"';?>>

            <label>Announcement Description: </label>
            <textarea style="height: 130px;"
                name="announcement[andescription]"><?php if(isset($announcement))echo $announcement['andescription'];?></textarea>
                <input type="submit" value="Submit" name="submit">

        </div>

        

    </div>


   


</form>