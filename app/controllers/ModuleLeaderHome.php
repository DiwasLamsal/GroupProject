<?php

  class ModuleLeaderHome extends Controller{

    public function index(){
      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }

      $moduleClass = new DatabaseTable('modules');
      $countModule = $moduleClass->getCountByValuePar('mid', 'mluid', $_SESSION['loggedin']['uid']);
      $countModule = $countModule->fetch()['COUNT(mid)'];

      $courseClass = new DatabaseTable('courses');
      $countCourse = $courseClass->getCountByValuePar('cid', 'cuid', $_SESSION['loggedin']['uid']);
      $countCourse = $countCourse->fetch()['COUNT(cid)'];

      $studentClass = new DatabaseTable('students');
      $countStudents = $studentClass->getCountByValuePar('suid', 'puid', $_SESSION['loggedin']['uid']);
      $countStudents = $countStudents->fetch()['COUNT(suid)'];

      

      $countArray = [
        'students'=>$countStudents,
        'courses'=>$countCourse,
        'modules'=>$countModule
      ];

      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/moduleLeaders/moduleLeaderHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'count'=>$countArray]);
      $selected='Dashboard';
      $title = "ModuleLeader - Dashboard";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
