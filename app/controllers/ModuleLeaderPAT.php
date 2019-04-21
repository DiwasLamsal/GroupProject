<?php

  class ModuleLeaderPAT extends Controller{

    public function index(){
      $studentClass = new DatabaseTable('students');

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);


      $template = '../app/views/moduleLeaders/viewPAT.php';
      $content = loadTemplate($template, []);
      $selected='PAT';
      $title = "Module Leader - PAT";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
