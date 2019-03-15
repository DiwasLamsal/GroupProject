<?php

  class Login extends Controller{

    public function index(){

      $fileName = '../app/templates/LoginTemplate.php';
      $content = loadTemplate($fileName, []);

      $this->view($content);

    }

  }


 ?>
