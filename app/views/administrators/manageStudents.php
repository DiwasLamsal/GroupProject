<div class = "boxesContainer boxesContainerManage">
  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageStudents/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addstudent.png" width="50"><br>
        Student Admission
      </div>
    </a>
  </div>

  <?php
    echo $note;
  ?>
</div>

<!-- Search Box -->
<div class = "adminManageTable searchStudent" style="padding: 10px; text-align: left; margin: auto; margin-bottom: 10px;">
      <input id = "searchBar" type = "search" placeholder="Search..." onkeyup="search(this.value)">
</div>

<div class = "adminManageTable">
  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Students</h1>
  </div>
  <?php echo $table;?>
</div>
