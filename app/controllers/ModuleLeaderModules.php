<?php

  class ModuleLeaderModules extends Controller{

    public function index(){
      $moduleClass = new DatabaseTable('modules');

      if (session_status() == PHP_SESSION_NONE) {
      	session_start();
      }
      $modules = $moduleClass->find('mluid', $_SESSION['loggedin']['uid']);

      $template = '../app/views/moduleLeaders/assignedModules.php';
      $content = loadTemplate($template, ['modules'=>$modules]);
      $selected='Modules';
      $title = "Module Leader - Modules";

      require_once "../app/controllers/moduleLeaderLoadView.php";

    }

    public function moduleTerm($var = "", $message = ""){
      $termClass = new DatabaseTable("terms");
      $moduleClass = new DatabaseTable("modules");
      $term = $termClass->find('tid', $var);
      $term = $term->fetch();

      if($var==""){
        header("Location: ../ModuleLeaderModules");
      }

      //Call the function to set term's status before displaying
      $term = setTermStatus($term);

      $module = $moduleClass->find('mid', $term['tmid']);
      $module = $module->fetch();

      $template = '../app/views/moduleLeaders/moduleTerm.php';
      $content = loadTemplate($template, ['var'=>$message,'module'=>$module, 'term'=>$term]);
      $selected='Modules';
      $title = "Module Leader - Term";
      require_once "../app/controllers/moduleLeaderLoadView.php";
    }

    public function addAnnouncement($var = ""){
      $termClass = new DatabaseTable("terms");
      $term = $termClass->find('tid', $var);
      $term = $term->fetch();
      $moduleClass = new DatabaseTable("modules");
      $module = $moduleClass->find('mid', $term['tmid']);
      $module = $module->fetch();
      if($var==""){
        header("Location: ../ModuleLeaderModules");
      }
      // module_announcements
      $maClass = new DatabaseTable('module_announcements');
      if(isset($_POST['submit'])){
        $_POST['announcement']['matid']=$term['tid'];
        $maClass->save($_POST['announcement']);
        header("Location:/GroupProject/public/ModuleLeaderModules/moduleTerm/".$term['tid']."/addsuccess");
      }
      $template = '../app/views/moduleLeaders/addAnnouncement.php';
      $content = loadTemplate($template, ['term'=>$term, 'module'=>$module]);
      $selected = "Modules";
      $title = "Module Leader - Add new Announcement";
      require_once "../app/controllers/moduleLeaderLoadView.php";
    }

    public function browseAnnouncement($val = ""){
      $maClass = new DatabaseTable('module_announcements');
      $announcement = $maClass->find('maid',$val);
      if($announcement->rowCount()>0){
        if(isset($_POST['submit'])){
          $_POST['announcement']['maid']=$val;
          $maClass->save($_POST['announcement'], 'maid');

          $announcement=$announcement->fetch();
          $term = getTermById($announcement['matid'])->fetch();

          header("Location:/GroupProject/public/ModuleLeaderModules/moduleTerm/".$term['tid']."/editsuccess");
        }

        $template = '../app/views/moduleLeaders/addAnnouncement.php';
        $content = loadTemplate($template, ['announcement'=>$announcement]);
        $selected = "Modules";
        $title = "Module Leader - Browse Announcement";
        require_once "../app/controllers/moduleLeaderLoadView.php";
      }
      else{
        header("Location:/GroupProject/public/ModuleLeaderModules/index/error");
      }
    }

    public function deleteAnnouncement($var = ""){
      $maClass = new DatabaseTable('module_announcements');
      $announcement = $maClass->find('maid',$var);

      if($announcement->rowCount()>0){
        $announcement = $announcement->fetch();
        $term = getTermById($announcement['matid'])->fetch();
        $maClass->delete('maid', $var);
        header("Location:/GroupProject/public/ModuleLeaderModules/moduleTerm/".$term['tid']."/deletesuccess");
      }
      else{
          header("Location:/GroupProject/public/ModuleLeaderModules/moduleTerm/".$term['tid']."/norecord");
      }

    }

  }

?>
