<?php

  class StudentModules extends Controller{

    public function index(){


      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, []);

      $title = "Student - Modules";

      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
