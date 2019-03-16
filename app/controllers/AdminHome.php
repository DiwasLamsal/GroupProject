<?php

  class AdminHome extends Controller{

    public function index(){

      $template = '../app/views/administrators/AdminHome.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Dashboard";

      require_once "../app/controllers/adminLoadView.php";


    }

  }

?>
