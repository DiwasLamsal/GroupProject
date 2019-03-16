<?php

  class ManageAnnouncements extends Controller{

    public function index(){

      $template = '../app/views/administrators/manageAnnouncements.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Announcements";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
