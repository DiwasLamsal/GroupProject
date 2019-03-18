<?php

function loadTemplate($fileName, $templateVars) {
  extract($templateVars);
  ob_start();
  require $fileName;
  $contents = ob_get_clean();
  return $contents;
}





function getUserById($id){
  $userClass = new DatabaseTable('users');
  $user = $userClass->find('uid', $id);
  return $user;
}


?>
