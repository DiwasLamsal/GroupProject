<?php

  class StudentGrades extends Controller{

    public function index(){


      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, []);

      $title = "Student - Grades";

      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
