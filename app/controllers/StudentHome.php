<?php

  class StudentHome extends Controller{

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

      $countArray = [
        'students'=>$countStudents,
        'moduleLeaders'=>$countModuleLeaders,
        'courses'=>$countCourse,
        'modules'=>$countModule
      ];

      $template = '../app/views/administrators/adminHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'count'=>$countArray]);

      $title = "Admin - Dashboard";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
