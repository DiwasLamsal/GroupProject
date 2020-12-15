<ul class="breadcrumb">
	<li><a href="/GroupProject/public/StudentHome">
		<img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
	</li>
	<li><a href = "/GroupProject/public/StudentForums">Forums</a></li>
  <li>Add Thread</li>
</ul>


<form method="POST" class="userForm">

  <div class="formTitle">
    <h1 class="formHeading">
      Add Thread for <?php echo $module['mname'];?>
    </h1>
  </div>

  <div class = "formHolder">
    <div class = "formColumn1">
      <label>Thread Title: </label>
      <input type = "text" name = "forum[ftitle]">

      <label>Thread Description: </label>
      <textarea style="height: 150px;" name = "forum[fdescription]"></textarea>

      <input type = "hidden" value = "<?php echo $module['mid'];?>" name = "forum[fmid]">
      <input type = "hidden" value = "<?php echo $student['suid'];?>" name = "forum[fuid]">

      <input type = "submit" name = "submit" value = "Submit Thread">
    </div>
  </div>
</form>
