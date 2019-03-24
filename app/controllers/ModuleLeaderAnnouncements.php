<?php

  class ModuleLeaderAnnouncements extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findLimitReverse('anid', 10);

      $template = '../app/views/moduleLeaders/viewAnnouncements.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);
      $selected='Announcements';
      $title = "Module Leader - Announcements";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
