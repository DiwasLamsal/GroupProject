<ul class="breadcrumb">
  <li><a href="/GroupProject/public/StudentHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>

  <li>Modules</li>
</ul>


<?php
if($modules->rowCount() > 0){

  while($module = $modules->fetch()){
    $mCourse = getCourseById($module['mcid'])->fetch();
    $mLevel = getLevelById($module['mlvid'])->fetch();
    $terms = getTermsByModuleId($module['mid']);

?>


<div class = "adminManageTable">

  <?php
    $color = 'DarkCyan';
  ?>
  <div class = "tableTitle">
    <h1 class = "tableHeading"><?php echo $module['mcode'].' - '.$module['mname'];?></h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">

<div class = "formHolder">


  <div class = "formColumn1">

    <b>Code: </b><?php echo $module['mcode'];?><br>
    <b>Course: </b><?php echo $mCourse['ctitle'];?><br>
    <b>Level: </b><?php echo $mLevel['lvtitle'].' - '.$mLevel['lvaltname'];?><br>

    <?php
      echo $module['mdescription'];

    ?>
  </div>

  <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">
    <?php while($term = $terms->fetch()){ ?>
    <?php
          $link = '<a class = "courseModuleLink" href = "/GroupProject/public/StudentModules/moduleTerm/'.$term['tid'].'">';
          echo $link;
          echo '<div class = "courseModuleBox termBox" style = "background: '.$color.';">';
    ?>

          <img src = "/GroupProject/public/resources/images/term.png">


    <?php
          echo $term['tname'];
          echo '</div>';
          echo '</a>';
    ?>

    <?php }?>

  </div>

</div>

</div>

</div>
<?php
  }
}
else{
  ?>

  <div class = "adminManageTable">
      <h2 style="color: red; text-align: center;">No Module Has Been Assigned To You Yet</h2>
  </div>


<?php
}
?>
