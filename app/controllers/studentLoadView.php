<?php
$template = '../app/views/students/StudentNavigation.php';
$navigation = loadTemplate($template, []);

$template = '../app/templates/UserTemplate.php';
$contents = [
  'title'=>$title,
  'navigation'=>$navigation,
  'content'=>$content,
  'role'=>'Student'
];
$content = loadTemplate($template, $contents);

$this->view($content);


?>
