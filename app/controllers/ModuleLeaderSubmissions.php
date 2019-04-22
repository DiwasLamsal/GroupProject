<?php

  class ModuleLeaderSubmissions extends Controller{

    public function index($var=""){
      
      $template = '../app/views/moduleLeaders/viewSubmissions.php';
      $content = loadTemplate($template, []);
      $selected='Submissions';
      $title = "Module Leader - Student Submissions";
      require_once "../app/controllers/moduleLeaderLoadView.php";

    }


  }

?>
