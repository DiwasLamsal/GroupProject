<?php

  class ModuleLeaderResources extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/moduleLeaders/viewResources.php';
      $content = loadTemplate($template, []);
      $selected='Resources';
      $title = "Module Leader - Resources";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

  }

?>
