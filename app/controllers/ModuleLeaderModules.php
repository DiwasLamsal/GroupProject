<?php

  class ModuleLeaderModules extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/moduleLeaders/moduleLeaderHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);
      $selected='Modules';
      $title = "Admin - Dashboard";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
