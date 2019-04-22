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


  /**
  * This function returns a module leader's id
  * @return Module Leader with least students assigned as PAT
  */
  function getPATWithLowest(){
    $moduleLeaderClass = new DatabaseTable('lecturers');
    $studentClass = new DatabaseTable('students');
    $moduleLeaders = $moduleLeaderClass->findAll();

    $ml = $moduleLeaders->fetch();

    $lowestPATvalue = PHP_INT_MAX;
    $currentPATvalue = 0;
    $lowestPATId = $ml['luid'];

    $students = $studentClass->findAll();
    while($student = $students->fetch()){
      if($student['puid']==$ml['luid']){
        $currentPATvalue++;
      }
    }
    if($lowestPATvalue>$currentPATvalue){
      $lowestPATvalue = $currentPATvalue;
      $lowestPATId = $ml['luid'];
    }

    while($ml = $moduleLeaders->fetch()){
      $currentPATvalue = 0;
      $students = $studentClass->findAll();

      while($student = $students->fetch()){
        if($student['puid']==$ml['luid']){
          $currentPATvalue++;
        }
      }
      if($lowestPATvalue>$currentPATvalue){
        $lowestPATvalue = $currentPATvalue;
        $lowestPATId = $ml['luid'];
      }
    }
    return $lowestPATId;
  }


  function getComputingCourse(){
    $courseClass = new DatabaseTable('courses');
    $course = $courseClass->find('ctitle', 'BSC. Computing');
    $course = $course->fetch();
    return $course;
  }

  function getFirstYearLevel(){
    $levelClass = new DatabaseTable('levels');
    $level = $levelClass->find('lvtitle', 'L4');
    $level = $level->fetch();
    return $level;
  }


  function getTermById($id){
    $termClass = new DatabaseTable('terms');
    $term = $termClass->find('tid', $id);
    return $term;
  }

  function getModuleByTermId($id){
    $termClass = new DatabaseTable('terms');
    $term = $termClass->find('tid', $id)->fetch();
    $moduleClass = new DatabaseTable('modules');
    $module = $moduleClass->find('mid', $term['tmid']);
    return $module;
  }

  function getTermsByModuleId($id){
    $termClass = new DatabaseTable('terms');
    $terms = $termClass->find('tmid', $id);
    return $terms;
  }

  function getResourcesByTermId($id){
    $resourceClass = new DatabaseTable('resources');
    $resources = $resourceClass->find('rtid', $id);
    return $resources;
  }

  function getAssignmentsByTermId($id){
    $assignmentClass = new DatabaseTable('assignments');
    $assignments = $assignmentClass->find('atid', $id);
    return $assignments;
  }


// Sets term's current status by checking the date and returns the term
  function setTermStatus($term){
    $termClass = new DatabaseTable('terms');
    $termNew = [
      'tid'=>$term['tid'],
      'tmid'=>$term['tmid'],
      'tname'=>$term['tname'],
      'tsdate'=>$term['tsdate'],
      'tedate'=>$term['tedate'],
      'tstatus'=>checkDateStatus($term['tsdate'], $term['tedate'])
    ];
    $termClass->update($termNew, 'tid');
    $term = $termClass->find('tid', $term['tid']);
    $term = $term->fetch();
    return $term;
  }


  // Database Code
  function findStudentModules($cid, $lvid){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM modules WHERE mcid = :cid AND mlvid = :lvid');
    $criteria = ['cid'=>$cid, 'lvid'=>$lvid];
    $stmt->execute($criteria);
    return $stmt;
  }

  // Check if student has already submitted the assignment
  function checkStudentSubmission($sid, $asid){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM assignment_students WHERE asaid = :aid AND asuid = :sid');
    $criteria = ['aid'=>$asid, 'sid'=>$sid];
    $stmt->execute($criteria);

    if($stmt->rowCount()>0) return true;
    else return false;
  }

// Get the student's assignment submission
  function getStudentSubmission($sid, $asid){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM assignment_students WHERE asaid = :aid AND asuid = :sid');
    $criteria = ['aid'=>$asid, 'sid'=>$sid];
    $stmt->execute($criteria);
    return $stmt->fetch();
  }

// Return All the submissions for an assignment
  function getSubmissionsByAssignmentId($aid){
    $assignmentstudentsClass = new DatabaseTable('assignment_students');
    $submissions = $assignmentstudentsClass->find('asaid', $aid);
    return $submissions;
  }

?>
