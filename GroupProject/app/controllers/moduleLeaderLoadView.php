<?php
$template = '../app/views/moduleLeaders/moduleLeaderNavigation.php';
$navigation = loadTemplate($template, ['selected'=>$selected]);

$template = '../app/templates/UserTemplate.php';
$contents = [
  'title'=>$title,
  'navigation'=>$navigation,
  'content'=>$content,
  'role'=>'Module Leader',
];
$content = loadTemplate($template, $contents);

$this->view($content);


?>
