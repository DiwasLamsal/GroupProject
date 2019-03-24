<?php

  class ModuleLeaderResources extends Controller{

    public function index(){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);


      $template = '../app/views/moduleLeaders/viewResources.php';
      $content = loadTemplate($template, ['modules'=>$modules]);
      $selected='Resources';
      $title = "Module Leader - Resources";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
