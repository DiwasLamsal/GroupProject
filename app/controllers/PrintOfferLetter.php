<?php

class PrintOfferLetter extends Controller{

  public function index($val=""){
    $this->unconditional($val);
  }

  public function conditional($val=""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid', $val)->fetch();
    $template = '../app/letters/conditional.php';
    $content = loadTemplate($template, ['user'=>$user, 'print'=>'print']);
    $this->view($content);
  }

  public function unconditional($val=""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid', $val)->fetch();
    $template = '../app/letters/unconditional.php';
    $content = loadTemplate($template, ['user'=>$user, 'print'=>'print']);
    $this->view($content);
  }

}

?>
