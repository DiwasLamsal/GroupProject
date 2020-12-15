<?php

  class ModuleLeaderAnnouncements extends Controller{

    public function index($var = ""){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findLimitReverse('anid', 10);

      $selected = $announcementClass->find('anid', $var);
      $selected = $selected->fetch();

      $template = '../app/views/moduleLeaders/viewAnnouncements.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'selected'=>$selected]);
      $selected='Announcements';
      $title = "Module Leader - Announcements";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
