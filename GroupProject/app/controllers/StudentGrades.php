<?php

  class StudentGrades extends Controller{

    public function index(){
      $studentClass = new DatabaseTable('students');
      $assignmentstudentsClass = new DatabaseTable('assignment_students');
      $gradeClass = new DatabaseTable('grades');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }

      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $submissions = $assignmentstudentsClass->find('asuid', $student['suid']);

      $template = '../app/views/students/studentGrades.php';
      $content = loadTemplate($template, ['submissions'=>$submissions]);

      $title = "Student - Grades";
      $selected = "Grades";
      require_once "../app/controllers/StudentLoadView.php";

    }

  }

?>
