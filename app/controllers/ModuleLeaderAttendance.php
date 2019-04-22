<?php

  class ModuleLeaderAttendance extends Controller{

    public function index($var=""){

      $template = '../app/views/moduleLeaders/viewAttendance.php';
      $content = loadTemplate($template, []);
      $selected='Attendance';
      $title = "Module Leader - Attendance";
      require_once "../app/controllers/moduleLeaderLoadView.php";

    }


  }

?>
