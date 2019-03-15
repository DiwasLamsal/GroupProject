<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Head -->
  <head>
    <title>Login To University Portal</title>
    <link rel = "stylesheet" type = "text/css" href = "css/loginStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<!-- End of head -->

<!-- Body -->
  <body>
    <div class = "loginFormContainer">

      <div class = "loginImageHolder">
        <img src = "resources/images/login.svg" width="100">
      </div>

        <form method = "post" action = "">
          <!-- <label for = "id">University ID:</label> -->
          <input type = "text" name = "id" placeholder="College ID" required>
          <!-- <label for = "id">Password:</label> -->
          <input type = "password" name = "password" placeholder="Password" required>

          <input type = "submit" name = "submit" value="Submit">
        </form>
        <br><br>
        <a href = "#">Forgot your password?</a>
    </div>


  </body>
<!-- End of body -->


</html>
