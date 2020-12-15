<?php

  class AdminHome extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $studentClass = new DatabaseTable('students');
      $countStudents = $studentClass->getCount('suid');
      $countStudents = $countStudents->fetch()['COUNT(suid)'];

      $moduleLeaderClass = new DatabaseTable('lecturers');
      $countModuleLeaders = $moduleLeaderClass->getCount('luid');
      $countModuleLeaders = $countModuleLeaders->fetch()['COUNT(luid)'];

      $courseClass = new DatabaseTable('courses');
      $countCourse = $courseClass->getCount('cid');
      $countCourse = $countCourse->fetch()['COUNT(cid)'];

      $moduleClass = new DatabaseTable('modules');
      $countModule = $moduleClass->getCount('mid');
      $countModule = $countModule->fetch()['COUNT(mid)'];

      $userClass = new DatabaseTable('users');
      $countUser = $userClass->getCount('uid');
      $countUser = $countUser->fetch()['COUNT(uid)'];

      $countArray = [
        'students'=>$countStudents,
        'moduleLeaders'=>$countModuleLeaders,
        'courses'=>$countCourse,
        'modules'=>$countModule,
        'users'=>$countUser,
      ];

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $user = $_SESSION['loggedin'];

      $template = '../app/views/administrators/adminHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'count'=>$countArray, 'user'=>$user]);

      $title = "Admin - Dashboard";
      $selected = "Dashboard";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
