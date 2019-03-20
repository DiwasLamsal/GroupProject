<?php

class ManageAdministrators extends Controller{

  public function index($val=""){
    $userClass = new DatabaseTable('users');
    $users = $userClass->findSorted('urole','Administrator', 'fname');

    $manage = "administrator";
    $template = '../app/views/administrators/userNote.php';
    $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

    $template = '../app/views/administrators/manageAdministrators.php';
    $content = loadTemplate($template, ['val'=>$val, 'users'=>$users, 'note'=>$note, 'role'=>'Administrator']);

    $title = "Admin - Staff";
    require_once "../app/controllers/adminLoadView.php";

  }

  public function add(){
    $userClass = new DatabaseTable('users');

    if(isset($_POST['submit'])){
      $_POST['user']['urole']="Administrator";
      $_POST['user']['ustatus']="Y";
      $_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
      $userClass->save($_POST['user']);
      header("Location:../ManageAdministrators/index/addsuccess");
    }

    $template = '../app/views/administrators/addAdministrator.php';
    $content = loadTemplate($template, ['role'=>'Administrator']);

    $title = "Admin - Add new Staff";

    require_once "../app/controllers/adminLoadView.php";
  }


  public function browse($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);

    if($user->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../index/editsuccess");
      }

      if(isset($_POST['passubmit'])){
        $_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../index/editpasssuccess");
      }

      $template = '../app/views/administrators/addAdministrator.php';
      $content = loadTemplate($template, ['user'=>$user, 'role'=>'Administrator']);

      $title = "Admin - Browse Administrator";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../index/nosuchuser");
    }

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
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){

      $ustatus = $user->fetch()['ustatus']=="Y"? "N" : "Y";
      $criteria = [
        'uid'=>$val,
        'ustatus'=>$ustatus
      ];
      $userClass->save($criteria, 'uid');
      header("Location:../index/archivesuccess");
    }
    else{
      header("Location:../index/nosuchuser");
    }
  }


}

?>
