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



    public function browseResource($resource = ""){




    }

    public function deleteResource($resource = ""){
      $resourceClass = new DatabaseTable('resources');
      $resourceD = $resourceClass->find('rid',$resource);
      if($resourceD->rowCount()>0){

        $resourceD = $resourceD->fetch();

        $path = '../public/'.$resourceD['rfilenames'];

        if(is_file($path))unlink($path);

        $resourceClass->delete('rid', $resource);

        header("Location:../index/deletesuccess");

      }
      else{
        header("Location:../index/nosuchrecord");
      }

    }

  }

?>
