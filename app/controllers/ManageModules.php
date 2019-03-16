<?php

  class ManageModules extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageModules.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Modules";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
