<?php

  class ManageCourses extends Controller{

    public function index($val=""){
      $courseClass = new DatabaseTable('courses');
      $courses = $courseClass->findAll();

      $template = '../app/views/administrators/manageCourses.php';
      $content = loadTemplate($template, ['courses'=>$courses, 'val'=>$val]);

      $title = "Admin - Courses";
      require_once "../app/controllers/adminLoadView.php";

    }

    public function add(){
      $courseClass = new DatabaseTable('courses');

      if(isset($_POST['submit'])){
        $_POST['course']['cstatus']="Y";

        $courseClass->save($_POST['course']);
        header("Location:../ManageCourses/index/addsuccess");
      }

      $template = '../app/views/administrators/addCourse.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Add new Course";

      require_once "../app/controllers/adminLoadView.php";
    }


    public function browse($val = ""){
      $courseClass = new DatabaseTable('courses');
      $course = $courseClass->find('cid',$val);

      if($course->rowCount()>0){
        if(isset($_POST['submit'])){
          $_POST['course']['cid']=$val;
          $courseClass->save($_POST['course'], 'cid');
          header("Location:../index/editsuccess");
        }
        $template = '../app/views/administrators/addCourse.php';
        $content = loadTemplate($template, ['course'=>$course]);

        $title = "Admin - Browse Course";
        require_once "../app/controllers/adminLoadView.php";
      }

      else{
        header("Location:../index/nosuchuser");
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
