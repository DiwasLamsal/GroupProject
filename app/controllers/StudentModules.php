<?php

  class StudentModules extends Controller{

    public function index(){


      $template = '../app/views/students/studentModules.php';
      $content = loadTemplate($template, []);

      $title = "Student - Modules";
      $selected = "Modules";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
