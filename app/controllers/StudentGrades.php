<?php

  class StudentGrades extends Controller{

    public function index(){


      $template = '../app/views/students/studentGrades.php';
      $content = loadTemplate($template, []);

      $title = "Student - Grades";

      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
