<?php

  class Login extends Controller{

    public function index(){
      session_start();
      if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin']['urole']=="Administrator" && $_SESSION['loggedin']['ustatus']=="Y"){
          header("Location: /GroupProject/public/AdminHome");
        }
        else if($_SESSION['loggedin']['urole']=="Module Leader" && $_SESSION['loggedin']['ustatus']=="Y"){
          header("Location: /GroupProject/public/ModuleLeaderHome");
        }
        else if($_SESSION['loggedin']['ustatus']=="Y") {
          header("Location: /GroupProject/public/StudentHome");
        }

      }

      $userClass = new DatabaseTable('users');
      $users  = $userClass->findAll();

      $loginText = "";

      if(isset($_POST['submit'])){
        $flag = false;

        while($user = $users->fetch()) {
          if($user['uid']==$_POST['id']){
            if(password_verify($_POST['password'], $user['password'])){
              echo 'reached';
                $_SESSION['loggedin']=$user;
                $flag = true;
            }
          }
        }

        if($flag){
          if($_SESSION['loggedin']['urole']=="Administrator" && $_SESSION['loggedin']['ustatus']=="Y"){
            header("Location: /GroupProject/public/AdminHome");
          }
          else if($_SESSION['loggedin']['urole']=="Module Leader" && $_SESSION['loggedin']['ustatus']=="Y"){
            header("Location: /GroupProject/public/ModuleLeaderHome");
          }
          else if($_SESSION['loggedin']['ustatus']=="Y"){
            header("Location: /GroupProject/public/StudentHome");
          }

        }
        else
          $loginText = "<font style = 'color:red;'>Wrong ID or Password!</font>";

      }

      $fileName = '../app/templates/LoginTemplate.php';
      $content = loadTemplate($fileName, ['loginText'=>$loginText]);

      $this->view($content);

      }


  }

 ?>
