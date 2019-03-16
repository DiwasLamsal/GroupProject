<?php

  class ManageAdministrators extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageAdministrators.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Staff";

      require_once "../app/controllers/adminLoadView.php";


    }

  }

?>
