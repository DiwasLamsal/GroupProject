<?php

  class ModuleLeaderSubmissions extends Controller{

    public function index($var=""){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/viewSubmissions.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'var'=>$var]);
      $selected='Submissions';
      $title = "Module Leader - Student Submissions";
      require_once "../app/controllers/moduleLeaderLoadView.php";

    }


    public function markSubmission($submission=""){
      if($submission==""){
        header("Location: /GroupProject/public/ModuleLeaderSubmissions/index/error");
      }
      $gradeClass = new DatabaseTable('grades');
      $assignmentstudentsClass = new DatabaseTable('assignment_students');
      $submissionF = $assignmentstudentsClass->find('submission_id', $submission);
      if(isset($_POST['submit'])){
        $_POST['grade']['status']='N';
        $_POST['grade']['guid']=$submission;
        $gradeClass->save($_POST['grade']);
        header("Location: /GroupProject/public/ModuleLeaderSubmissions/index/gradesuccess");
      }
      if(isset($_POST['submitEdit'])){
        $gradeClass->save($_POST['grade'], 'gid');
        header("Location: /GroupProject/public/ModuleLeaderSubmissions/index/editsuccess");
      }
      $template = '../app/views/moduleLeaders/markSubmission.php';
      $content = loadTemplate($template, ['submission'=>$submissionF]);
      $selected='Submissions';
      $title = "Module Leader - Mark Submissions";
      require_once "../app/controllers/moduleLeaderLoadView.php";
    }


    public function gradeStatus($grade=""){
      if($grade==""){
        header("Location: /GroupProject/public/ModuleLeaderSubmissions/index/error");
      }
      $gradeClass = new DatabaseTable('grades');
      $grade = $gradeClass->find('gid', $grade)->fetch();
      $gd['gid'] = $grade['gid'];

      if($grade['status']=="Y") $gd['status']="N";
      else $gd['status'] = "Y";
      $gradeClass->save($gd, 'gid');
      header("Location: /GroupProject/public/ModuleLeaderSubmissions/index/statussuccess");
    }

  }

?>
