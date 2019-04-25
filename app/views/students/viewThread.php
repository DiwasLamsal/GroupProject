<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li><a href = "/GroupProject/public/StudentForums">Forums</a></li>
  <li>View Thread</li>
</ul>

<?php
  $module = getModuleById($forum['fmid'])->fetch();
  $user = getUserById($forum['fuid'])->fetch();
  $replies = getForumMessages($forum['fid']);
?>

<div class = "adminManageTable" style="padding-bottom: 0;">
	<div class = "tableTitle">
		<h1 class = "tableHeading">
      View Thread
    </div>
  <div class="content" style="text-align: left; margin: 0; margin-left: -10px; line-height: 1.5; min-height: 150px; width: calc(100% + 20px);">
    <table class="tableborder" style="word-wrap: break-word; width: 100%;">
        <tbody>
            <tr>
                <th>Title: </th>
                <td><?php echo $forum['ftitle'];?></td>
            </tr>
            <tr>
                <th>Description: </th>
                <td><?php echo $forum['fdescription'];?></td>
            </tr>
            <tr>
                <th>Post Date:</th>
                <td><?php echo $forum['fdate'];?></td>
            </tr>
            <tr>
                <th>Module:</th>
                <td><?php echo $module['mname'];?></td>
            </tr>
            <tr>
                <th>Posted By:</th>
                <td><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?></td>
            </tr>
        </tbody>
      </table>
  </div>
</div>


<div class = "adminManageTable">
	<div class = "tableTitle">
		<h1 class = "tableHeading">Replies for this thread</h1>
	</div>
	<div class = "content" style="text-align: left; margin: 0px; line-height: 1.6;">
  <?php if($replies->rowCount()==0) echo 'No content available';?>
  <?php while($reply = $replies->fetch()){
    $flag = false;
    if($student['suid']==$reply['fmuid']) $flag = true;
    $user = getUserById($reply['fmuid'])->fetch();?>
    <div class = "forumDiv">
      <br>
      <span><b>Date Posted:</b> <?php echo $reply['fmdate'];?></span>
      <h2><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?></h2><br>
      <p><?php echo $reply['fmdescription'];?></p>
      <span><?php if($flag) echo '<br><a href = "/GroupProject/public/StudentForums/deleteMessage/'.$reply['fmid'].'" style = "color: red">Delete Reply</a>';?></span>
      <br><br><br>
    </div>


  <?php } ?>
		<br>
	</div>
</div>


<form method="POST" class="userForm">
  <div class="formTitle">
    <h1 class="formHeading">
      Add a Reply
    </h1>
  </div>

  <div class = "formHolder">
    <div class = "formColumn1">
      <label>Reply Message: </label>
      <textarea style="height: 150px;" name = "forummessage[fmdescription]"></textarea>

      <input type = "hidden" value = "<?php echo $forum['fid'];?>" name = "forummessage[fmfid]">
      <input type = "hidden" value = "<?php echo $student['suid'];?>" name = "forummessage[fmuid]">

      <input type = "submit" name = "submit" value = "Submit Thread">
    </div>
  </div>
</form>
