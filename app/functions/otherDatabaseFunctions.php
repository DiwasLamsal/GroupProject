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

  function searchUser($term){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE
                           CONCAT(CONCAT(CONCAT(CONCAT(fname, \' \'), mname), \' \'), lname) LIKE :term
                           AND urole = \'Student\' ORDER BY uid DESC');
    $criteria = ['term'=>'%'.$term.'%'];
    $stmt->execute($criteria);
    return $stmt;
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


  function getInitials($name){
    $initials = $name[0].$name[strrpos($name, " ") + 1];
    return $initials;
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

  function getModuleById($id){
    $moduleClass = new DatabaseTable('modules');
    $module = $moduleClass->find('mid', $id);
    return $module;
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

  function getAnnouncementsByTermId($id){
    $maClass = new DatabaseTable('module_announcements');
    $announcements = $maClass->findReverse('madate', 'matid', $id);
    return $announcements;
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


  function checkSubmissionGrade($sid){
    $gradeClass = new DatabaseTable('grades');
    $grade = $gradeClass->find('guid', $sid);
    if($grade->rowCount()>0){
      return $grade;
    }
    else{
      return false;
    }
  }

  function getAssignmentById($id){
    $assignmentClass = new DatabaseTable('assignments');
    $assignment = $assignmentClass->find('aid', $id);
    return $assignment;
  }


  function getTermByAssignment($asaid){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM terms t
                           INNER JOIN assignments a ON
                           a.atid = t.tid
                           WHERE a.aid = '.$asaid);
    $stmt->execute();
    return $stmt;
  }

  function getTermByAnnouncementId($anid){

  }


  function getAttendanceByStudent($uid){
    $attendanceClass = new DatabaseTable('attendances');
    $attendances = $attendanceClass->find('auid', $uid);
    return $attendances;
  }


  function getAttendancePercentage($suid, $mid){
    global $pdo;
    $terms = getTermsByModuleId($mid);
    $termI = $terms->fetch();
    $termII = $terms->fetch();

    // Total Records
    $stmt = $pdo->prepare('SELECT COUNT(auid) AS total FROM attendances WHERE atid IN(:termI, :termII)
                           AND auid = :suid');
    $criteria = ['termI'=>$termI['tid'], 'termII'=>$termII['tid'], 'suid'=>$suid];
    $stmt->execute($criteria);
    $totalRecords = $stmt->fetch();
    // Total present
    $stmt = $pdo->prepare('SELECT COUNT(auid) AS total FROM attendances WHERE atid IN(:termI, :termII)
                           AND auid = :suid AND astatus = \'0\'');
    $criteria = ['termI'=>$termI['tid'], 'termII'=>$termII['tid'], 'suid'=>$suid];
    $stmt->execute($criteria);
    $totalPresent = $stmt->fetch();

    $percentage = 0;
    //Percentage
    if($totalRecords['total']!=0)
    $percentage = ($totalPresent['total']/$totalRecords['total']) * 100;
    return $percentage;
  }


// Prevent deletion of data
  function findModulesInCourse($cid){
    $moduleClass = new DatabaseTable('modules');
    $modules = $moduleClass->find('mcid', $cid);
    return $modules->rowCount();
  }
  function findStudentsInCourse($cid){
    $studentClass = new DatabaseTable('students');
    $students = $studentClass->find('cid', $cid);
    return $students->rowCount();
  }
  function findAssignmentsByModule($mid){
    $terms = getTermsByModuleId($mid);
    $term1 = $terms->fetch();
    $term2 = $terms->fetch();
    $assignmentClass = new DatabaseTable('assignments');
    $ast1 = $assignmentClass->find('atid', $term1['tid']);
    $ast2 = $assignmentClass->find('atid', $term2['tid']);
    return $ast1->rowCount() + $ast2->rowCount();
  }
  function findModulesInLeader($luid){
    $moduleClass = new DatabaseTable('modules');
    $modules = $moduleClass->find('mluid', $luid);
    return $modules->rowCount();
  }
  function findCoursesInLeader($luid){
    $courseClass = new DatabaseTable('courses');
    $courses = $courseClass->find('cuid', $luid);
    return $courses->rowCount();
  }
  function findPATInLeader($luid){
    $studentClass = new DatabaseTable('students');
    $students = $studentClass->find('puid', $luid);
    return $students->rowCount();
  }
  function findStudentInLevel($lvid){
    $studentClass = new DatabaseTable('students');
    $students = $studentClass->find('slvid', $lvid);
    return $students->rowCount();
  }
  function findModulesInLevel($lvid){
    $moduleClass = new DatabaseTable('modules');
    $modules = $moduleClass->find('mlvid', $lvid);
    return $modules->rowCount();
  }





// Forums

  function getForumsByModule($mid){
    $forumClass = new DatabaseTable('forums');
    $forums = $forumClass->find('fmid', $mid);
    return $forums;
  }
  function getForumMessages($fid){
    $forummessageClass = new DatabaseTable('forum_messages');
    $forumMessages = $forummessageClass->find('fmfid', $fid);
    return $forumMessages;
  }



?>
