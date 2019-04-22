<?php

  class ModuleLeaderSubmissions extends Controller{

    public function index($var=""){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/viewSubmissions.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'var'=>$var]);
      $selected='Submissions';
      $title = "Module Leader - Student Submissions";
      require_once "../app/controllers/moduleLeaderLoadView.php";

    }


  }

?>
