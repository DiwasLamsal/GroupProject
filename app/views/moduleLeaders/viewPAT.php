<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>

  <li>PAT</li>
</ul>

<?php
if($students->rowCount() > 0){
  while($student = $students->fetch()){
    $user = getUserById($student['suid'])->fetch();

?>
  <div class = "adminManageTable">
    <div class = "tableTitle">
      <h1 class = "tableHeading"><td><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?></td></h1>
    </div>

    <div class="content" style="text-align: left; margin: 15px; line-height: 1.6;">

      <table class="tableborder" style="width: 97%;">
          <tbody>
              <tr>
                  <th>Full Name: </th>
                  <td><?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?></td>
              </tr>
              <tr>
                  <th>Address: </th>
                  <td><?php echo $user['uaddress'];?></td>
              </tr>
              <tr>
                  <th>Contact No: </th>
                  <td><?php echo $user['ucontact'];?></td>
              </tr>
              <tr>
                  <th>Email Address:</th>
                  <td><a href = "mailto:<?php echo $user['uemail'];?>">
                    <u><?php echo $user['uemail'];?></u>
                  </a></td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>

<?php }
}
else{
  ?>

  <div class = "adminManageTable">
      <h2 style="color: red; text-align: center;">No Student Has Been Assigned To You Yet</h2>
  </div>


<?php
}
?>
