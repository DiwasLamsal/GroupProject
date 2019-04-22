<?php

  class StudentModules extends Controller{

    public function index(){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);


      $template = '../app/views/students/studentModules.php';
      $content = loadTemplate($template, ['modules'=>$modules]);

      $title = "Student - Modules";
      $selected = "Modules";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
