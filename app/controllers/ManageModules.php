<?php

  class ManageModules extends Controller{

    public function index($val=""){
      $moduleClass = new DatabaseTable('modules');
      $modules = $moduleClass->findAll();

      $manage = "modules";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageModules.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'val'=>$val, 'note'=>$note]);

      $title = "Admin - Modules";
      require_once "../app/controllers/adminLoadView.php";

    }



    public function add(){
      $userClass = new DatabaseTable('users');
      $moduleClass = new DatabaseTable('modules');
      $courseClass = new DatabaseTable('courses');
      $termClass = new DatabaseTable('terms');

      $users = $userClass->find('urole','Module Leader');
      $courses = $courseClass->findAll();


      if(isset($_POST['submit'])){
        $_POST['module']['mstatus']="Y";

        $moduleClass->save($_POST['module']);

        header("Location:../ManageModules/index/addsuccess");
      }

      $template = '../app/views/administrators/addModule.php';
      $content = loadTemplate($template, ['users'=>$users, 'courses'=>$courses]);

      $title = "Admin - Add new Module";

      require_once "../app/controllers/adminLoadView.php";
    }



    public function browse($val = ""){
      $userClass = new DatabaseTable('users');
      $moduleClass = new DatabaseTable('modules');
      $courseClass = new DatabaseTable('courses');
      $termClass = new DatabaseTable('terms');

      $users = $userClass->find('urole','Module Leader');
      $courses = $courseClass->findAll();

      $module = $moduleClass->find('mid', $val);

      if(isset($_POST['submit'])){
        $_POST['module']['mid']=$val;
        $moduleClass->save($_POST['module'], 'mid');

        header("Location:../ManageModules/index/addsuccess");
      }

      $template = '../app/views/administrators/addModule.php';
      $content = loadTemplate($template, ['module'=>$module, 'users'=>$users, 'courses'=>$courses]);

      $title = "Admin - Browse Module";

      require_once "../app/controllers/adminLoadView.php";
    }



    public function delete($val = ""){
      $moduleClass = new DatabaseTable('modules');
      $module = $moduleClass->find('mid',$val);
      if($module->rowCount()>0){
        $moduleClass->delete('mid', $val);
        header("Location:../index/deletesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }

    }


    public function archive($val = ""){
      $moduleClass = new DatabaseTable('modules');
      $module = $moduleClass->find('mid',$val);
      if($module->rowCount()>0){

        $mstatus = $module->fetch()['mstatus']=="Y"? "N" : "Y";
        $criteria = [
          'mid'=>$val,
          'mstatus'=>$mstatus
        ];
        $moduleClass->update($criteria, 'mid');
        header("Location:../index/archivesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }
    }



  }

?>
