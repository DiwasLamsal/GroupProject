
<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageModules/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addmodule.png" width="50"><br>
        Add new Module
      </div>
    </a>
  </div>

  <?php
    echo $note;
  ?>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Modules</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>Code</th>
      <th>Module Leader</th>
      <th>Course</th>
      <th>Level</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php


    $count = 0;
      while($module = $modules->fetch()){

        $viewIcon = '<a href = "/GroupProject/public/ManageModules/browse/'.$module['mid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageModules/archive/'.$module['mid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                        </a>';

        $statusText = $module['mstatus']=="Y" ? '<font color = "green">Visible</font>':
                                                           '<font color = "red">Archived</font>';

       $leader = getUserById($module['mluid'])->fetch();


       $link = '<u><a target="_blank" style="color:#717ede;" href = "/GroupProject/public/ManageModuleLeaders/browse/'.$leader['uid'].'">'.
                 $leader['fname'].' '.$leader['mname'].' '.$leader['lname'].'</a></u>';

       $course = getCourseById($module['mcid'])->fetch();
       $courseLink = '<u><a target="_blank" style="color:#717ede;" href = "/GroupProject/public/ManageCourses/browse/'.$course['cid'].'">'.
                 $course['ctitle'].'</a></u>';

      $level = getLevelById($module['mlvid'])->fetch();
      $levelLink = '<u><a target="_blank" style="color:#717ede;" href = "/GroupProject/public/ManageLevels/browse/'.$level['lvid'].'">'.
                $level['lvtitle'].'</a></u>';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$module['mcode'].'</td>
                <td>'.$module['mname'].'</td>
                <td>'.$link.'</td>
                <td>'.$courseLink.'</td>
                <td>'.$levelLink.'</td>
                <td>'.$viewIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$statusText.'</td>
              </tr>';
      }
    ?>
  </table>

</div>
