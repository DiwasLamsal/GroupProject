<?php

  class AdminHome extends Controller{

    public function index(){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $template = '../app/views/administrators/adminHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements]);

      $title = "Admin - Dashboard";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
