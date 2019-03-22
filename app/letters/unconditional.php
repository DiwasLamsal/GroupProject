<?php

?>

<style>
@media print {
@page { margin: 0; }
body { margin: 1.6cm; }
}

</style>

<br>
<b>Date: </b><?php echo date('d-m-Y');?>
<br>
<br>
  <?php echo $user['uaddress'];?>
<br>
<br>
Dear <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>,<br>

We are glad to offer you a a place in the University. Please make sure that you have read the
requirements you need to meet in order for a complete admission.
<br><br>

We will require you to attend college premises with all the required documents. Your application will be
deemed cancelled if you fail to do so within the given time.<br>
In the meantime, if you have any queries regarding any aspect of the offer, you can feel
free to contact us.

<br><br>
<b>Deadline: </b><?php $date = Date('Y-m-d');
   echo date('Y-m-d', strtotime($date. ' + 14 days'));?>
  <br><br>

Yours Sincerely, <br>

<?php
if(session_status() == PHP_SESSION_NONE)session_start();
echo $_SESSION['loggedin']['fname'].' '.$_SESSION['loggedin']['lname'];?>, <br>

Email: <?php echo $_SESSION['loggedin']['uemail'];?> <br><br>

<p style ="text-align: center;">
  Woodlands University College </p>
<br>



<?php
  if(isset($print)){
?>
  <script>

    window.print();

  </script>
<?php
  }
?>
