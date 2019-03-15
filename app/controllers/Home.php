<?php

  class Home extends Controller{

    public function index(){
      session_start();
      if(isset($_SESSION['loggedin'])){
        header("Location:AdminHome");
      }
      else{
        header("Location:login");
      }

    }

  }





?>
