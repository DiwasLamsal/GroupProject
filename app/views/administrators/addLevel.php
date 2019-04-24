<?php

if(isset($level)){
  $level=$level->fetch();

?>


<div class="boxesContainer boxesContainerManage">

    <div class="contentBoxLarge contentBoxLargeEdit">

        <div class="title">
        <?php echo $level['lvaltname'];?>
        </div>
        <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">
            <table class="tableborder">
                <tbody>
                    <tr>
                        <th>Level Title:</th>
                        <td><?php echo $level['lvtitle'];?></td>
                    </tr>
                    <tr>
                        <th>Alternate Name:</th>
                        <td><?php echo $level['lvaltname'];?></td>
                    </tr>
                    <tr>
                        <th>Capacity:</th>
                        <td><?php echo $level['lvcapacity'];?> students</td>
                    </tr>
                    <tr>
                        <th>Total Students in this Level: </th>
                        <td><?php echo getTotalStudentsInLevel($level['lvid']); ?></td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a href="/GroupProject/public/ManageLevels/delete/<?php echo $level['lvid'];?>">
                                <img src="/GroupProject/public/resources/images/deleteuser.png" width="10">

                            </a>
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
            <?php if(isset($level))echo 'Edit Level Details';
    else {?>
            Add new level
            <?php } ?>
        </h1>
    </div>

    <div class="formHolder flex-top">

        <div class="formColumn1">
            <label>Level Title: </label>
            <input type="text" name="level[lvtitle]" required
                <?php if(isset($level))echo 'value="'.$level['lvtitle'].'"';?>>

            <label>Alternate Name: </label>
            <input type="text" name="level[lvaltname]" required
                <?php if(isset($level))echo 'value="'.$level['lvaltname'].'"';?>>
                <label>Level Capacity: </label>
            <input type="number" min="10" max="5000" name="level[lvcapacity]" required
                <?php if(isset($level))echo 'value="'.$level['lvcapacity'].'"'; else echo 'value="10"';?>>
                <input type="submit" value="Submit" name="submit">
        </div>


    </div>





</form>
