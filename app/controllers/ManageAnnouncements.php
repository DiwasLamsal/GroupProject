<?php

  class ManageAnnouncements extends Controller{

    public function index($val=""){
      $announcementClass = new DatabaseTable('announcements');
      $announcements = $announcementClass->findAllReverse('anid');

      $manage = "announcements";
      $template = '../app/views/administrators/userNote.php';
      $note = loadTemplate($template, ['val'=>$val, 'manage'=>$manage]);

      $template = '../app/views/administrators/manageAnnouncements.php';
      $content = loadTemplate($template, ['announcements'=>$announcements, 'val'=>$val, 'note'=>$note,  'role'=>'Administrator']);
      $selected = "Announcements";
      $title = "Admin - Announcements";

      require_once "../app/controllers/adminLoadView.php";
    }


    public function add(){
      $announcementClass = new DatabaseTable('announcements');
      if(isset($_POST['submit'])){
        $_POST['announcement']['anstatus']="Y";

        $announcementClass->save($_POST['announcement']);
        header("Location:../ManageAnnouncements/index/addsuccess");
      }

      $template = '../app/views/administrators/addAnnouncement.php';
      $content = loadTemplate($template, ['role'=>'Administrator']);
      $selected = "Announcements";
      $title = "Admin - Add new Announcement";

      require_once "../app/controllers/adminLoadView.php";
    }


    public function browse($val = ""){
      $announcementClass = new DatabaseTable('announcements');
      $announcement = $announcementClass->find('anid',$val);

      if($announcement->rowCount()>0){
        if(isset($_POST['submit'])){
          $_POST['announcement']['anid']=$val;
          $announcementClass->save($_POST['announcement'], 'anid');
          header("Location:../index/editsuccess");
        }

        $link = '/GroupProject/public/ManageAnnouncements/delete/'.$val;
        $template = '../app/views/administrators/modal.php';
        $modal = loadTemplate($template, ['type'=>'Announcement', 'link'=>$link]);

        $template = '../app/views/administrators/addAnnouncement.php';
        $content = loadTemplate($template, ['announcement'=>$announcement, 'modal'=>$modal]);
        $selected = "Announcements";
        $title = "Admin - Browse Announcement";
        require_once "../app/controllers/adminLoadView.php";
      }

      else{
        header("Location:../index/nosuchrecord");
      }

    }

    public function delete($val = ""){
      $announcementClass = new DatabaseTable('announcements');
      $announcement = $announcementClass->find('anid',$val);

      if($announcement->rowCount()>0){
        $announcementClass->delete('anid', $val);
        header("Location:../index/deletesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }

    }

    public function archive($val = ""){
      $announcementClass = new DatabaseTable('announcements');
      $announcement = $announcementClass->find('anid',$val);

      if($announcement->rowCount()>0){
        $anstatus = $announcement->fetch()['anstatus']=="Y"? "N" : "Y";
        $criteria = [
          'anid'=>$val,
          'anstatus'=>$anstatus
        ];
        $announcementClass->save($criteria, 'anid');
        header("Location:../index/archivesuccess");
      }
      else{
        header("Location:../index/nosuchrecord");
      }
    }


  }

?>
