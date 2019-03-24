<?php

  class ModuleLeaderPAT extends Controller{

    public function index(){

      $template = '../app/views/moduleLeaders/viewPAT.php';
      $content = loadTemplate($template, []);
      $selected='PAT';
      $title = "Module Leader - PAT";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
