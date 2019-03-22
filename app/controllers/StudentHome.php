<?php

  class StudentHome extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');


      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);

      $title = "Student - Dashboard";
      $selected = "Dashboard";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
