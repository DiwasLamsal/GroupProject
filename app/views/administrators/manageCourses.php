
<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageCourses/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addcourse.png" width="50"><br>
        Add new Course
      </div>
    </a>
  </div>

  <?php
    echo $note;
  ?>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Courses</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>Course Leader</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php


    $count = 0;
      while($course = $courses->fetch()){

        $viewIcon = '<a href = "/GroupProject/public/ManageCourses/browse/'.$course['cid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageCourses/archive/'.$course['cid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                        </a>';

        $statusText = $course['cstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                           '<font color = "red">Archived</font>';

       $leader = getUserById($course['cuid'])->fetch();


       $link = '<u><a target="_blank" style="color:tomato;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                 $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a></u>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$course['ctitle'].'</td>
                <td>'.$link.'</td>
                <td>'.$viewIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$statusText.'</td>
              </tr>';
      }
    ?>
  </table>

</div>
