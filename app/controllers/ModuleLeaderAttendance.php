<?php

  class ModuleLeaderAttendance extends Controller{

    public function index($var=""){
      $attendanceClass = new DatabaseTable('attendances');

      $moduleClass = new DatabaseTable('modules');
      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      if(isset($_POST['submitRecords'])){
        for($i = 1; $i<($_POST['totalRecords']+1); $i++){
          $date = date("Y-m-d");
          $_POST[$i]['attendance']['adate']= $date;

          $attendanceClass->insert($_POST[$i]['attendance']);
        }
        header("Location:/GroupProject/public/ModuleLeaderAttendance/index/addsuccess");
      }

      $template = '../app/views/moduleLeaders/viewAttendance.php';
      $content = loadTemplate($template, ['var'=>$var, 'modules'=>$modules]);
      $selected='Attendance';
      $title = "Module Leader - Attendance";
      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
