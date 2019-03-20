<?php

  class StudentForums extends Controller{

    public function index(){


      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, []);

      $title = "Student - Forums";

      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
