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
      require_once "../app/controllers/studentLoadView.php";
    }

    public function moduleTerm($val = ""){
      $termClass = new DatabaseTable("terms");
      $moduleClass = new DatabaseTable("modules");
      $term = $termClass->find('tid', $val);
      $term = $term->fetch();

      if($val==""){
        header("Location: ../StudentModules");
      }

      //Call the function to set term's status before displaying
      $term = setTermStatus($term);

      $module = $moduleClass->find('mid', $term['tmid']);
      $module = $module->fetch();

      $template = '../app/views/students/moduleTerm.php';
      $content = loadTemplate($template, ['module'=>$module, 'term'=>$term]);
      $selected='Modules';
      $title = "Student - Term";

      require_once "../app/controllers/studentLoadView.php";


    }

  }

?>
