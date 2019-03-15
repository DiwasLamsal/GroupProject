<?php

  class AdminHome extends Controller{

    public function index(){

      $template = '../app/views/administrators/AdminHome.php';
      $content = loadTemplate($template, []);



      $template = '../app/templates/UserTemplate.php';
      $contents = [
        'title'=>'Administrator Dashboard',
        'navigation'=>'',
        'content'=>$content
      ];
      $content = loadTemplate($template, $contents);

      $this->view($content);

    }

  }

?>
