<?php

  class ModuleLeaderHome extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/moduleLeaders/moduleLeaderHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);

      $title = "Admin - Dashboard";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
