<?php

  function getTotalStudentsInLevel($levelId){
    global $pdo;
    $stmt = $pdo->prepare('SELECT COUNT(slvid) FROM students WHERE rstatus = "Live" AND slvid = '.$levelId);
    $stmt->execute();
    $total = $stmt->fetch()['COUNT(slvid)'];
    return $total;
  }

  function getTotalStudentsInCourse($courseId){
    global $pdo;
    $stmt = $pdo->prepare('SELECT COUNT(cid) FROM students WHERE rstatus = "Live" AND cid = '.$courseId);
    $stmt->execute();
    $total = $stmt->fetch()['COUNT(cid)'];
    return $total;
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

  function getTotalPAT($id){
    $studentClass = new DatabaseTable('students');
    $totalStudentsByPAT = $studentClass->getCountByValue('puid', $id);
    return $totalStudentsByPAT;
  }

  function checkCourseLeader($id){
    $courseClass = new DatabaseTable('courses');
    $course = $courseClass->find('cuid', $id);
    return $course;
  }


  function getStudentModules($id){

  }


  function insertStudentCSV($filename){
    
  }

?>
