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

function getCourseById($id){
  $courseClass = new DatabaseTable('courses');
  $course = $courseClass->find('cid', $id);
  return $course;
}

function getLevelById($id){
  $levelClass = new DatabaseTable('levels');
  $level = $levelClass->find('lvid', $id);
  return $level;
}

function getStudentById($id){
  $studentClass = new DatabaseTable('students');
  $student = $studentClass->find('suid', $id);
  return $student;
}


function getGeneratedPassword($firstname, $lastname, $date){
  // Ram Krishna Shrestha 1990-05-15   FL-YYYY-MM-DD  RS-1990-05-15
  $pass = substr($firstname,0,1).substr($lastname, 0, 1).'-'.$date;
  return $pass;
}


function generateRandomColor(){
  $background_colors = array('red', 'blue', 'purple', 'orange', 'black', 'brown', 'green', 'grey');

  return $background_colors[array_rand($background_colors)];
}

?>
