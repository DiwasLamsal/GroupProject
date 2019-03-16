<?php

  class ManageModuleLeaders extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageModuleLeaders.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Module Leaders";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
