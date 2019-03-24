<?php

  class ModuleLeaderModules extends Controller{

    public function index(){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/assignedModules.php';
      $content = loadTemplate($template, ['modules'=>$modules]);
      $selected='Modules';
      $title = "Module Leader - Modules";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

    public function moduleTerm($val = ""){
      $termClass = new DatabaseTable("terms");
      $moduleClass = new DatabaseTable("modules");
      $term = $termClass->find('tid', $val);
      $term = $term->fetch();

      if($val==""){
        header("Location: ../ModuleLeaderModules");
      }

      //Call the function to set term's status before displaying
      $term = setTermStatus($term);

      $module = $moduleClass->find('mid', $term['tmid']);
      $module = $module->fetch();

      $template = '../app/views/moduleLeaders/moduleTerm.php';
      $content = loadTemplate($template, ['module'=>$module, 'term'=>$term]);
      $selected='Modules';
      $title = "Module Leader - Term";

      require_once "../app/controllers/moduleLeaderLoadView.php";


    }


  }

?>
