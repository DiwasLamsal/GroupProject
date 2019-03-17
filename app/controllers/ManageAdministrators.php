<?php

  class ManageAdministrators extends Controller{

    public function index($val=""){
      $userClass = new DatabaseTable('users');
      $users = $userClass->findAll();

      $template = '../app/views/administrators/manageAdministrators.php';
      $content = loadTemplate($template, ['val'=>$val, 'users'=>$users]);

      $title = "Admin - Staff";
      require_once "../app/controllers/adminLoadView.php";

    }


    public function add(){
      $userClass = new DatabaseTable('users');

      if(isset($_POST['submit'])){

        $_POST['user']['urole']="Administrator";
        $_POST['user']['ustatus']="Y";

        $_POST['user']['password']=password_hash($_POST['users']['password'], PASSWORD_DEFAULT);

        $userClass->save($_POST['user']);

        header("Location:../ManageAdministrators/index/successful");
      }


      $template = '../app/views/administrators/addAdministrator.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Add new Staff";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
