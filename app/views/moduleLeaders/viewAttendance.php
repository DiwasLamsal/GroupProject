<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
   <i class="fa fa-home"></i>&nbsp; Dashboard</a>
  </li>
  <li>Attendance</li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
    if($var=="addsuccess"){
      echo '<b>Successfully Added Attendance Records</b>';
    }
    else{
      echo '<b>Error</b>';
    }
    ?>
  </div>
<?php }?>

<?php
if(isset($_POST['submitAttendance'])){

  $module = getModuleByTermId($_POST['term'])->fetch();
  $term = getTermById($_POST['term'])->fetch();

  ?>

  <div class="adminManageTable">

    <div class="tableTitle">
      <h1 class="tableHeading">Attendance Records for <?php echo $module['mname'].' - '.$term['tname'];?></h1>
    </div>

    <form method="POST" class="userForm">

      <table id="customers">
        <tr>
          <th>S.N.</th>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Attendance</th>
          <th>Module</th>
          <th>Term</th>
        </tr>
        <?php
        $file = fopen($_FILES['csvpicker']['tmp_name'], "r");
        $count = 0;
        $currentData = fgetcsv($file, 1000, ',');
        while(!feof($file)){
          $count++;
          echo '<input type = "hidden" name = "'.$count.'[attendance][auid]" value = "'.$currentData[0].'">';
          echo '<input type = "hidden" name = "'.$count.'[attendance][astatus]" value = "'.$currentData[4].'">';
          echo '<input type = "hidden" name = "'.$count.'[attendance][atid]" value = "'.$term['tid'].'">';
          echo '<tr>';
          echo '<td>'.$count.'</td>';
          echo '<td>'.$currentData[0].'</td>
                <td>'.$currentData[1].' '.$currentData[2].' '.$currentData[3].'</td>
                <td>'.$currentData[4].'</td>';
          echo '<td>'.$module['mname'].'</td>
                <td>'.$term['tname'].'</td>';
          echo '</tr>';
          $currentData = fgetcsv($file, 1000, ',');
        }
        fclose($file);
        ?>

      </table>

      <input type="hidden" value=<?php echo $count;?> name="totalRecords">
      <input type="submit" value="Add These <?php echo $count;?> Attendance Records" name="submitRecords">

    </form>
  </div>

  <?php
}
else {
  ?>

  <?php
  $count = 0;
  if($modules->rowCount() > 0){
    while($module = $modules->fetch()){
      $terms = getTermsByModuleId($module['mid']);

      while($term = $terms->fetch()){
        ++$count;
        ?>

        <form method="POST" class="userForm" enctype="multipart/form-data">

          <div class="formTitle">
            <h1 class="formHeading">
              Upload Attendance Sheet For <?php echo $module['mname'].' - '.$term['tname'];?>
            </h1>
          </div>
        <div class="singlerow">
        <div class="formHolder">
            <div class="formColumn1 formCol">
              <label for="file<?php echo $term['tid'].$module['mid'];?>">Select Student Attendance CSV File: <i class="fa fa-upload fa-2x"></i></label>

              <input id="file<?php echo $term['tid'].$module['mid']?>" type="file" name="csvpicker" style="border: none;" required>
            </div>
          </div>

          <input type = "text" value = "<?php echo $term['tid'];?>" name = "term" style="display: none;">
          <input type = "submit" value="Submit" name="submitAttendance">
        </div>

        </form>

        <?php
      }
    }
  }
}
?>
