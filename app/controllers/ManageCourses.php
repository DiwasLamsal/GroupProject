<?php

  class ManageCourses extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageCourses.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Courses";

      require_once "../app/controllers/adminLoadView.php";


    }

  }

?>
