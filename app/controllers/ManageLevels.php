<?php

  class ManageLevels extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageLevels.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Levels";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
