<?php

  class StudentForums extends Controller{

    public function index($var = ""){
      $studentClass = new DatabaseTable('students');
      $moduleClass = new DatabaseTable('modules');
      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $modules = findStudentModules($student['cid'], $student['slvid']);

      $template = '../app/views/students/studentForums.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'var'=>$var, 'student'=>$student]);

      $title = "Student - Forums";
      $selected = "Forums";
      require_once "../app/controllers/StudentLoadView.php";
    }

    public function browseThread($var = ""){
      if($var == ""){
        header("Location: /GroupProject/public/StudentForums/index/error");
      }
      $studentClass = new DatabaseTable('students');
      $forumClass = new DatabaseTable('forums');
      $forumMessageClass=new DatabaseTable('forum_messages');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $forum = $forumClass->find('fid', $var)->fetch();

      if(isset($_POST['submit'])){
        $forumMessageClass->save($_POST['forummessage']);
      }

      $template = '../app/views/students/viewThread.php';
      $content = loadTemplate($template, ['var'=>$var, 'student'=>$student, 'forum'=>$forum]);

      $title = "Student - View Thread";
      $selected = "Forums";
      require_once "../app/controllers/StudentLoadView.php";

    }

    public function addThread($var = ""){
      if($var == ""){
        header("Location: /GroupProject/public/StudentForums/index/error");
      }

      $studentClass = new DatabaseTable('students');
      $moduleClass = new DatabaseTable('modules');
      $forumClass = new DatabaseTable('forums');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $student = $studentClass->find('suid', $_SESSION['loggedin']['uid'])->fetch();
      $module = $moduleClass->find('mid', $var)->fetch();

      if(isset($_POST['submit'])){
        $forumClass->save($_POST['forum']);
        header("Location: /GroupProject/public/StudentForums/index/addsuccess");
      }

      $template = '../app/views/students/addThread.php';
      $content = loadTemplate($template, ['module'=>$module, 'var'=>$var, 'student'=>$student]);

      $title = "Student - Add Thread";
      $selected = "Forums";
      require_once "../app/controllers/StudentLoadView.php";
    }



    public function deleteThread($var = ""){
      if($var == ""){
        header("Location: /GroupProject/public/StudentForums/index/error");
      }
      $forumClass = new DatabaseTable('forums');
      $forumClass->delete('fid', $var);
      header("Location:/GroupProject/public/StudentForums/index/deletesuccess");
    }

    public function deleteMessage($var = ""){
      if($var == ""){
        header("Location: /GroupProject/public/StudentForums/index/error");
      }
      $forumMessageClass = new DatabaseTable('forum_messages');
      $forumMessageClass->delete('fmid', $var);
      header("Location:/GroupProject/public/StudentForums/index/deletemessage");
    }

  }

?>
