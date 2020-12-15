<?php

  class ModuleLeaderPAT extends Controller{

    public function index(){
      $studentClass = new DatabaseTable('students');

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      $students = $studentClass->find('puid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/viewPAT.php';
      $content = loadTemplate($template, ['students'=>$students]);
      $selected='PAT';
      $title = "Module Leader - PAT";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
