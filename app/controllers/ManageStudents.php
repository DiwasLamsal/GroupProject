<?php

  class ManageStudents extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageStudents.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Students";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
