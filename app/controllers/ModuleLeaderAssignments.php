<?php

  class ModuleLeaderAssignments extends Controller{

    public function index($var=""){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/viewAssignments.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'var'=>$var]);
      $selected='Assignments';
      $title = "Module Leader - Assignments";

      require_once "../app/controllers/moduleLeaderLoadView.php";
    }




    public function addAssignment($term=""){

      if($term==""){
        header("Location: /GroupProject/public/ModuleLeaderAssignments/");
      }

      $assignmentClass = new DatabaseTable('assignments');
      $termClass = new DatabaseTable('terms');
      $moduleClass = new DatabaseTable('modules');

      $term = $termClass->find('tid', $term);
      $term = $term->fetch();

      $module = $moduleClass->find('mid', $term['tmid'])->fetch();

      if(isset($_POST['submit'])){
        $_POST['assignment']['atid']=$term['tid'];
        $_POST['assignment']['status']="Y";

        $target_dir = "resources/assignments/";
        $target_file = $target_dir.microtime(true).'-'.basename($_FILES["assignmentFile"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);

        move_uploaded_file($_FILES["assignmentFile"]["tmp_name"], $target_file);
        $_POST['assignment']['afiles']=$target_file;

        $assignmentClass->save($_POST['assignment']);
        header("Location:/GroupProject/public/ModuleLeaderAssignments/index/addsuccess");

      }

      $template = '../app/views/moduleLeaders/addAssignment.php';
      $content = loadTemplate($template, ['term'=>$term, 'module'=>$module]);
      $selected='Assignments';
      $title = "Module Leader - Add Assignment";

      require_once "../app/controllers/moduleLeaderLoadView.php";
    }



    public function browseAssignment($assignment = ""){
      if($assignment==""){
        header("Location: /GroupProject/public/ModuleLeaderAssignments/");
      }

      $assignmentClass = new DatabaseTable('assignments');
      $termClass = new DatabaseTable('terms');
      $moduleClass = new DatabaseTable('modules');

      $assignment = $assignmentClass->find('aid', $assignment);
      $assignment = $assignment->fetch();

      $term = $termClass->find('tid', $assignment['atid'])->fetch();
      $module = $moduleClass->find('mid', $term['tmid'])->fetch();

      if(isset($_POST['submit'])){
        $_POST['assignment']['atid']=$term['tid'];
        $_POST['assignment']['status']="Y";
        $_POST['assignment']['aid']=$assignment['aid'];

        if(!empty($_FILES['assignmentFile']['name'])){

          // Remove old resource file first
          $assignmentD = $assignmentClass->find('aid',$assignment['aid']);
          $assignmentD = $assignmentD->fetch();
          $path = '../public/'.$assignmentD['afiles'];
          if(is_file($path))unlink($path);

          //Upload and set new file
          $target_dir = "resources/assignments/";
          $target_file = $target_dir.microtime(true).'-'.basename($_FILES["assignmentFile"]["name"]);
          $target_file = str_replace(' ', '_', $target_file);

          move_uploaded_file($_FILES["assignmentFile"]["tmp_name"], $target_file);
          $_POST['assignment']['afiles']=$target_file;
        }

        $assignmentClass->save($_POST['assignment'], 'aid');
        header("Location:/GroupProject/public/ModuleLeaderAssignments/index/editsuccess");
      }

      $template = '../app/views/moduleLeaders/addAssignment.php';
      $content = loadTemplate($template, ['assignment'=>$assignment, 'term'=>$term, 'module'=>$module]);
      $selected='Assignments';
      $title = "Module Leader - Edit Assignment";

      require_once "../app/controllers/moduleLeaderLoadView.php";
    }

    public function deleteAssignment($assignment = ""){
      $assignmentClass = new DatabaseTable('assignments');
      $assignmentD = $assignmentClass->find('aid',$assignment);
      if($assignmentD->rowCount()>0){

        $assignmentD = $assignmentD->fetch();

        $path = '../public/'.$assignmentD['afiles'];
        if(is_file($path))unlink($path);
        $assignmentClass->delete('aid', $assignment);

        header("Location:../index/deletesuccess");

      }
      else{
        header("Location:../index/nosuchrecord");
      }

    }

  }

?>
