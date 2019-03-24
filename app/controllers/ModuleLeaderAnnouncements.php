<?php

  class ModuleLeaderAnnouncements extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/moduleLeaders/moduleLeaderHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);
      $selected='Announcements';
      $title = "Module Leader - Announcements";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
