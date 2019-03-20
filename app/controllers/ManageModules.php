<?php

  class ManageModules extends Controller{

    public function index($val=""){
      $moduleClass = new DatabaseTable('modules');
      $modules = $moduleClass->findAllSorted('mcode');

      $manage = "modules";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageModules.php';
      $content = loadTemplate($template, ['modules'=>$modules, 'val'=>$val, 'note'=>$note, $role=>'Administrator']);

      $title = "Admin - Modules";
      require_once "../app/controllers/adminLoadView.php";

    }



    public function add(){
      $userClass = new DatabaseTable('users');
      $moduleClass = new DatabaseTable('modules');
      $courseClass = new DatabaseTable('courses');
      $termClass = new DatabaseTable('terms');
      $levelClass = new DatabaseTable('levels');
      $levels = $levelClass->findAll();

      $users = $userClass->findSorted('urole','Module Leader', 'fname');
      $courses = $courseClass->findAllSorted('ctitle');


      if(isset($_POST['submit'])){
        $_POST['module']['mstatus']="Y";

        $moduleClass->save($_POST['module']);

        $moduleId = $moduleClass->findLastRecordId('mid');
        $moduleId = $moduleId->fetch()['mid'];

        $_POST['term1']['tname']="Term I";
        $_POST['term1']['tsdate']=$_POST['term1start'];
        $_POST['term1']['tedate']=$_POST['term1end'];
        $_POST['term1']['tstatus']= checkDateStatus($_POST['term1']['tsdate'], $_POST['term1']['tedate']);
        $_POST['term1']['tmid']=$moduleId;

        $_POST['term2']['tname']="Term II";
        $_POST['term2']['tsdate']=$_POST['term2start'];
        $_POST['term2']['tedate']=$_POST['term2end'];
        $_POST['term2']['tstatus']= checkDateStatus($_POST['term2']['tsdate'], $_POST['term2']['tedate']);
        $_POST['term2']['tmid']=$moduleId;

        $termClass->save($_POST['term1']);
        $termClass->save($_POST['term2']);

        header("Location:../ManageModules/index/addsuccess");
      }

      $template = '../app/views/administrators/addModule.php';
      $content = loadTemplate($template, ['users'=>$users, 'courses'=>$courses, 'levels'=>$levels, $role=>'Administrator']);

      $title = "Admin - Add new Module";

      require_once "../app/controllers/adminLoadView.php";
    }



    public function browse($val = ""){
      $userClass = new DatabaseTable('users');
      $moduleClass = new DatabaseTable('modules');
      $courseClass = new DatabaseTable('courses');
      $termClass = new DatabaseTable('terms');

      $levelClass = new DatabaseTable('levels');
      $levels = $levelClass->findAll();

      $users = $userClass->find('urole','Module Leader');
      $courses = $courseClass->findAll();

      $module = $moduleClass->find('mid', $val);
      $terms = $termClass->find('tmid', $val);

      if(isset($_POST['submit'])){
        $_POST['module']['mid']=$val;
        $moduleClass->save($_POST['module'], 'mid');

        $terms = $termClass->find('tmid', $val);
        $term1 = $terms->fetch();
        $term2 = $terms->fetch();

        $_POST['term1']['tid']=$term1['tid'];
        $_POST['term1']['tsdate']=$_POST['term1start'];
        $_POST['term1']['tedate']=$_POST['term1end'];
        $_POST['term1']['tstatus']= checkDateStatus($_POST['term1']['tsdate'], $_POST['term1']['tedate']);

        $_POST['term2']['tid']=$term2['tid'];
        $_POST['term2']['tsdate']=$_POST['term2start'];
        $_POST['term2']['tedate']=$_POST['term2end'];
        $_POST['term2']['tstatus']= checkDateStatus($_POST['term2']['tsdate'], $_POST['term2']['tedate']);

        $termClass->save($_POST['term1'], 'tid');
        $termClass->save($_POST['term2'], 'tid');

        header("Location:../ManageModules/index/addsuccess");
      }

      $template = '../app/views/administrators/addModule.php';
      $content = loadTemplate($template, ['module'=>$module,
      'users'=>$users, 'courses'=>$courses, 'levels'=>$levels, 'terms'=>$terms, $role=>'Administrator']);

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
