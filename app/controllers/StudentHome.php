<?php

  class StudentHome extends Controller{

    public function index(){
      $studentClass = new DatabaseTable('students');
      $courseClass = new DatabaseTable('courses');
      $announcementClass = new DatabaseTable('announcements');

      $announcements = $announcementClass->findAllReverse('anid');

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $course = $courseClass->find('cid', $student['cid'])->fetch();

      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $modules = findStudentModules($student['cid'], $student['slvid']);

      $template = '../app/views/students/studentHome.php';
      $content = loadTemplate($template, ['announcements'=>$announcements,
                                          'course'=>$course,
                                          'modules'=>$modules,
                                          'student'=>$student]);

      $title = "Student - Dashboard";
      $selected = "Dashboard";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
