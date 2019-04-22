<?php

  class StudentModules extends Controller{

    public function index(){
      $studentClass = new DatabaseTable('students');
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $modules = findStudentModules($student['cid'], $student['slvid']);

      $template = '../app/views/students/studentModules.php';
      $content = loadTemplate($template, ['modules'=>$modules]);

      $title = "Student - Modules";
      $selected = "Modules";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
