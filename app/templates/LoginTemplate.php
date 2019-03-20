
<?php
  if(isset($_POST['submit'])){


  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Head -->
  <head>
    <title>Login To University Portal</title>
    <link rel = "stylesheet" type = "text/css" href = "/GroupProject/public/css/loginStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<!-- End of head -->

<!-- Body -->
  <body>
    <div class = "loginFormContainer">

      <div class = "loginImageHolder">
        <img src = "/GroupProject/public/resources/images/login.svg" width="100">
      </div>

        <form method = "post">
          <!-- <label for = "id">University ID:</label> -->
          <input type = "text" name = "id" placeholder="College ID" required>
          <!-- <label for = "id">Password:</label> -->
          <input type = "password" name = "password" placeholder="Password" required>
          <p id = "loginValidationText" style="font-size: 15px; color: red; margin-bottom: 10px; margin-top: 10px;">
            <?php echo $loginText;?>
          </p>

          <input type = "submit" name = "submit" value="Submit">
        </form>
        <br><br>
        <a href = "#">Forgot your password?</a>
    </div>


  </body>
<!-- End of body -->


</html>
