<?php

  class ModuleLeaderResources extends Controller{

    public function index($var=""){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/viewResources.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'var'=>$var]);
      $selected='Resources';
      $title = "Module Leader - Resources";

      require_once "../app/controllers/moduleLeaderLoadView.php";
    }




    public function addResource($term=""){

      if($term==""){
        header("Location: /GroupProject/public/ModuleLeaderResources/");
      }

      $resourceClass = new DatabaseTable('resources');
      $termClass = new DatabaseTable('terms');
      $moduleClass = new DatabaseTable('modules');

      $term = $termClass->find('tid', $term);
      $term = $term->fetch();

      $module = $moduleClass->find('mid', $term['tmid'])->fetch();

      if(isset($_POST['submit'])){
        $_POST['resource']['rtid']=$term['tid'];
        $_POST['resource']['rstatus']="Y";

        $target_dir = "resources/uploads/";
        $target_file = $target_dir.microtime(true).'-'.basename($_FILES["resourceFile"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);

        move_uploaded_file($_FILES["resourceFile"]["tmp_name"], $target_file);
        $_POST['resource']['rfilenames']=$target_file;

        print_r($_POST['resource']);

        $resourceClass->save($_POST['resource']);
        header("Location:/GroupProject/public/ModuleLeaderResources/index/addsuccess");

      }

      $template = '../app/views/moduleLeaders/addResources.php';
      $content = loadTemplate($template, ['term'=>$term, 'module'=>$module]);
      $selected='Resources';
      $title = "Module Leader - Add Resources";

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
