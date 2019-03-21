<?php

  class ManageStudents extends Controller{

    public function index($val=""){

      $userClass = new DatabaseTable('users');
      $users = $userClass->findSorted('urole','Student', 'fname');

      $studentClass = new DatabaseTable('students');
      $students = $studentClass->findall();

      $manage = "students";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageStudents.php';
      $content = loadTemplate($template, ['val'=>$val, 'users'=>$users,'note'=>$note, 'students'=>$students]);
      $selected = "Students";
      $title = "Admin - Students";

      require_once "../app/controllers/adminLoadView.php";

    }


    public function add(){
      $userClass = new DatabaseTable('users');
      $studentClass = new DatabaseTable('students');
      $courseClass = new DatabaseTable('courses');
      $levelClass = new DatabaseTable('levels');

      $users = $userClass->findSorted('urole','Module Leader', 'fname');
      $courses = $courseClass->findAllSorted('ctitle');
      $levels = $levelClass->findAll();

      if(isset($_POST['submit'])){
        $_POST['user']['urole']="Student";

        $pass = getGeneratedPassword($_POST['user']['fname'], $_POST['user']['lname'], $_POST['user']['birthdate']);
        $_POST['user']['password']=password_hash($pass, PASSWORD_DEFAULT);

        $userClass->save($_POST['user']);

        $studentId = $userClass->findLastRecordId('uid');
        $studentId = $studentId->fetch()['uid'];
        $_POST['student']['suid']=$studentId;

        $studentClass->save($_POST['student']);

        header("Location:../ManageStudents/index/addsuccess");
      }

      $template = '../app/views/administrators/addStudent.php';
      $content = loadTemplate($template, ['users'=>$users, 'courses'=>$courses, 'levels'=>$levels]);
      $selected = "Students";
      $title = "Admin - Admit new Student";

      require_once "../app/controllers/adminLoadView.php";

  }



    public function browse($val){
      $userClass = new DatabaseTable('users');
      $studentClass = new DatabaseTable('students');
      $courseClass = new DatabaseTable('courses');
      $levelClass = new DatabaseTable('levels');

      $user = $userClass->find('uid', $val);
      $student = $studentClass->find('suid',$val);

      $users = $userClass->findSorted('urole','Module Leader', 'fname');
      $courses = $courseClass->findAllSorted('ctitle');
      $levels = $levelClass->findAll();

      if(isset($_POST['submit'])){
        $_POST['user']['urole']="Student";
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');

        $studentId = $userClass->findLastRecordId('uid');
        $studentId = $studentId->fetch()['uid'];

        $_POST['student']['suid']=$val;
        $studentClass->update($_POST['student'], 'suid');

        header("Location:../index/editsuccess");
      }

      if(isset($_POST['passubmit'])){
        $_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../index/editpasssuccess");
      }


      $template = '../app/views/administrators/addStudent.php';
      $content = loadTemplate($template, ['users'=>$users, 'courses'=>$courses, 'levels'=>$levels,
        'user'=>$user, 'student'=>$student]);
      $selected = "Students";
      $title = "Admin - Browse Student";

      require_once "../app/controllers/adminLoadView.php";

  }


  public function delete($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){
      $userClass->delete('uid', $val);
      header("Location:../index/deletesuccess");
    }
    else{
      header("Location:../index/nosuchuser");
    }

  }


  public function archive($val = ""){
    $studentClass = new DatabaseTable('students');
    $student = $studentClass->find('suid',$val);
    if($student->rowCount()>0){

      $cpstatus = $student->fetch()['rstatus']=="Live"? "Dormant" : "Live";
      $criteria = [
        'suid'=>$val,
        'rstatus'=>$cpstatus
      ];
      $studentClass->update($criteria, 'suid');
      header("Location:../index/archivesuccess");
    }
    else{
      header("Location:../index/nosuchuser");
    }
  }


}



?>
