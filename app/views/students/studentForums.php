<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li>Forums</li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
    if($var=="addsuccess"){
      echo '<b>Successfully Added Thread</b>';
    }
    else if($var == 'deletesuccess'){
      echo '<b>Successfully Deleted Thread</b>';
    }
    else if($var == 'messagesuccess'){
      echo '<b>Successfully Added Message</b>';
    }
    else if($var == 'deletemessage'){
      echo '<b>Successfully Deleted Message</b>';
    }
    else{
      echo '<b>Error</b>';
    }
    ?>
  </div>
<?php }?>


<div class = "adminManageTable">
  <div class = "tableTitle">
    <h1 class = "tableHeading">Forum Guidelines</h1>
  </div>
  <div class = "content" style="text-align: left; margin: 30px; line-height: 1.6; margin-bottom: 5px; margin-right: 0;">
    <ul class = "forumGuideline">
      <li>Do not post Spam/Advertising/Promotion content</li>
      <li>Do not post any material that could be offensive</li>
      <li>Do refrain from posting same question multiple times</li>
      <li>Be descriptive about your questions</li>
      <li>Do not argue unnecessarily among each other</li>
      <li>Do not post any vulgar content</li>
      <li>Do not post your own assignments</li>
    </ul><br>
    <b>Note*:</b> Failure to abide by these conditions could lead to serious actions depending on the
    extremeness of situation.
  </div>
</div>




<?php
$count = 0;
if($modules->rowCount() > 0){
  while($module = $modules->fetch()){
    $forums = getForumsByModule($module['mid']);
    ++$count;
      ?>

      <button class="collapsible  <?php if($count==1) echo 'active'?>" style="background: DarkCyan;">
        <b>Threads For <?php echo $module['mname'];?></b>
      </button>
      <!-- Buttons for displaying announcement description -->
      <div class="collapsedcontent" style="margin-bottom: 10px; <?php if($count==1) echo 'max-height: none;'?>">
        <!-- Content inside the collapsible -->
        <div style="min-height: 90px;">
          <br>

            <?php while($forum =  $forums->fetch()){
              $user = getUserById($forum['fuid'])->fetch();
							$flag = false;
							if($student['suid']==$forum['fuid']) $flag = true;?>
              <div class = "forumDiv">
                <br>
                <span><b>Date Posted:</b> <?php echo $forum['fdate'];?></span>
                <h2><a style="color: black;" href = "/GroupProject/public/StudentForums/browseThread/<?php echo $forum['fid'];?>">
                  <?php echo $forum['ftitle'];?></a></h2><br>
                <b>Posted By:</b> <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
								<span><?php if($flag) echo '<br><a href = "/GroupProject/public/StudentForums/deleteThread/'.$forum['fid'].'" style = "color: red">Delete Reply</a>';?></span>
					      <br><br><br>
              </div>
            <?php } ?>

          <br>
          <!-- Add Assignment -->
          <div style = "text-align: center;">
            <a class = "courseModuleLink" href = "/GroupProject/public/StudentForums/addThread/<?php echo $module['mid']?>">
              <div class = "courseModuleBox" style = "background: #e68c4d;">
                Add Thread
              </div>
            </a>
          </div>
          <br>

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
<?php } ?>



<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
