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




?>
