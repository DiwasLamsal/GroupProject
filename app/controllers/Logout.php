<?php

  class Logout extends Controller{

    public function index(){
      session_start();
      if(isset($_SESSION['loggedin'])){
        unset($_SESSION['loggedin']);
      }
      session_destroy();
      header("Location:/GroupProject/public/Home");
    }
  }


 ?>
