<?php

  class ManageStudents extends Controller{

    public function index($val=""){

      $userClass = new DatabaseTable('users');
      $users = $userClass->find('urole','Module Leader');

      $studentClass = new DatabaseTable('students');
      $students = $studentClass->findall();

      $manage = "students";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageStudents.php';
      $content = loadTemplate($template, ['val'=>$val, 'users'=>$users,'note'=>$note, 'students'=>$students]);

      $title = "Admin - Students";

      require_once "../app/controllers/adminLoadView.php";

    }


    public function add(){
      $userClass = new DatabaseTable('users');
      $studentClass = new DatabaseTable('students');
      $courseClass = new DatabaseTable('courses');
      $levelClass = new DatabaseTable('levels');

      $users = $userClass->find('urole','Module Leader');
      $courses = $courseClass->findAll();
      $levels = $levelClass->findAll();

      if(isset($_POST['submit'])){
        $_POST['user']['urole']="Student";

        $_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
        $userClass->save($_POST['user']);

        $studentId = $userClass->findLastRecordId('uid');
        $studentId = $studentId->fetch()['uid'];

        header("Location:../ManageStudents/index/addsuccess");
      }
      
      $template = '../app/views/administrators/addStudent.php';
      $content = loadTemplate($template, ['users'=>$users, 'courses'=>$courses, 'levels'=>$levels]);

      $title = "Admin - Add new Student";

      require_once "../app/controllers/adminLoadView.php";

  }

}

?>
