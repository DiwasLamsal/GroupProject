<?php

  class StudentAnnouncements extends Controller{

    public function index($var = ""){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findLimitReverse('anid', 10);

      $selected = $announcementClass->find('anid', $var);
      $selected = $selected->fetch();

      $template = '../app/views/students/viewAnnouncements.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'selected'=>$selected]);
      $selected='Announcements';
      $title = "Student - Announcements";

      require_once "../app/controllers/studentLoadView.php";

    }

  }

?>
