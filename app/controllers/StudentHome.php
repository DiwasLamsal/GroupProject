<?php

  class StudentHome extends Controller{

    public function index(){


      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, []);

      $title = "Student - Dashboard";

      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
