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

Your name has been referred as a possible cause for concern because you are recorded as:
<br><br>
<b>Having poor or no attendance at classes</b>
<br><br>
<?php $date = Date('Y-m-d');?>
<p>
  It is essential that you see me as soon as possible. You must do this by <?php echo date('Y-m-d', strtotime($date. ' + 7 days'));?>.
  The meeting will provide an opportunity to check and review your progress and find a means of resolving any difficulties
  you may be experiencing. You are reminded that all students enrolling on a course at UCN are expected to meet the
  academic requirements of their programme. The Student Code details the implications of 'failure to meet academic,
  professional or vocational requirements' and whilst there may be mitigating circumstances not known to us at this time,
  you should regard this letter as an informal warning that your continuation on the course may be at risk. Failure to
  make contact may result in us deeming you to be withdrawn from your course.
</p>

<p>
  If for any reason you are experiencing difficulties which impact on your academic work, you should contact your
  personal tutor for advice.
</p>

<br>
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
