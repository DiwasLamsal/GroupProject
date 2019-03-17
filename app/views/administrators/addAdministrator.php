
<form method = "POST" class = "userForm">

<div class = "formTitle"><h1 class = "formHeading">Add new Administrator</h1></div>

<div class = "formHolder">
  
  <div class = "formColumn1">
    <label for = "firstname">First Name: </label>
    <input type = "text" name = "user[fname]" required>

    <label for = "middlename">Middle Name: </label>
    <input type = "text" name = "user[mname]" >

    <label for = "lastname">Surame: </label>
    <input type = "text" name = "user[lname]" required>

    <label for = "password">Password: </label>
    <input type = "password" name = "user[password]" required>

    <label for = "confirmpassword">Confirm Password: </label>
    <input type = "password" name = "confirmpassword" required>

    <label for = "gender">Gender: </label>
    <select name = "user[gender]">
      <option value = "Male">Male</option>
      <option value = "Female">Female</option>
      <option value = "Other">Other</option>
    </select>

  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <label for = "birthdate">Birth Date: </label>
    <input type = "date" name = "user[birthdate]" value="1972-05-15">

    <label for = "address" required>Address: </label>
    <textarea name = "user[uaddress]"></textarea>

    <label for = "contact" required>Contact Number: </label>
    <input type = "contact" name = "user[ucontact]">

    <label for = "email" required>Email Address: </label>
    <input type = "email" name = "user[uemail]">

  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>
