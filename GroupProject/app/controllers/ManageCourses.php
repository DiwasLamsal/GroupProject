<?php

  class ManageCourses extends Controller{

    public function index($val=""){
      $courseClass = new DatabaseTable('courses');
      $courses = $courseClass->findAllSorted('ctitle');

      $manage = "courses";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageCourses.php';
      $content = loadTemplate($template, ['courses'=>$courses, 'val'=>$val, 'note'=>$note]);
      $selected = "Courses";
      $title = "Admin - Courses";
      require_once "../app/controllers/adminLoadView.php";

    }

    public function add(){
      $courseClass = new DatabaseTable('courses');

      $userClass = new DatabaseTable('users');
      $users = $userClass->findSorted('urole','Module Leader', 'fname');

      if(isset($_POST['submit'])){
        $_POST['course']['cstatus']="Y";
        $_POST['course']['cuid']=$_POST['leader'];

        $courseClass->save($_POST['course']);
        header("Location:../ManageCourses/index/addsuccess");
      }

      $template = '../app/views/administrators/addCourse.php';
      $content = loadTemplate($template, ['users'=>$users]);
      $selected = "Courses";
      $title = "Admin - Add new Course";

      require_once "../app/controllers/adminLoadView.php";
    }


    public function browse($val = ""){
      $courseClass = new DatabaseTable('courses');
      $course = $courseClass->find('cid',$val);

      $userClass = new DatabaseTable('users');
      $users = $userClass->findSorted('urole','Module Leader', 'fname');

      $moduleClass = new DatabaseTable('modules');
      $modules = $moduleClass->find('mcid', $val);

      if($course->rowCount()>0){
        if(isset($_POST['submit'])){
          $_POST['course']['cid']=$val;
          $_POST['course']['cuid']=$_POST['leader'];

          $courseClass->save($_POST['course'], 'cid');
          header("Location:../index/editsuccess");
        }

        // If course contains students or modules, do not allow to delete
        if(findModulesInCourse($val)>0 || findStudentsInCourse($val)>0)
          $link = false;
        else
          $link = '/GroupProject/public/ManageCourses/delete/'.$val;

        $template = '../app/views/administrators/modal.php';
        $modal = loadTemplate($template, ['type'=>'Course', 'link'=>$link]);

        $template = '../app/views/administrators/addCourse.php';
        $content = loadTemplate($template, ['users'=>$users, 'course'=>$course, 'modules'=>$modules, 'modal'=>$modal]);
        $selected = "Courses";
        $title = "Admin - Browse Course";
        require_once "../app/controllers/adminLoadView.php";
      }

      else{
        header("Location:../index/nosuchrecord");
      }

    }


    public function delete($val = ""){
      $courseClass = new DatabaseTable('courses');
      $course = $courseClass->find('cid',$val);
      if($course->rowCount()>0){
        $courseClass->delete('cid', $val);
        header("Location:../index/deletesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }

    }

    public function archive($val = ""){
      $courseClass = new DatabaseTable('courses');
      $course = $courseClass->find('cid',$val);
      if($course->rowCount()>0){
        $cstatus = $course->fetch()['cstatus']=="Y"? "N" : "Y";
        $criteria = [
          'cid'=>$val,
          'cstatus'=>$cstatus
        ];
        $courseClass->save($criteria, 'cid');
        header("Location:../index/archivesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }
    }



  }

?>
