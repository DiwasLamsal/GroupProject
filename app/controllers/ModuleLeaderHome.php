<?php

  class ModuleLeaderHome extends Controller{

    public function index(){

      $template = '../app/views/moduleLeaders/moduleLeaderHome.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Dashboard";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
