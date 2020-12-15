window.onload = function(){

  // Timeout just to test the function
  setTimeout(function(){
    document.getElementsByClassName('load')[0].style.display = "none";
  }, 10);


  var dropdown = document.getElementById('dropdown');
  dropdown.addEventListener('click', function(){
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("arrow").classList.toggle("rightArrow");
  });


}



function setDate(){
  //Set date value
  var date = new Date();
  document.getElementById('datePickerToday').valueAsDate = date;

  // Assumed 30 days per month
  var date2 = new Date();
  date2.setDate(date.getDate()+6*30);
  document.getElementById('datePickerFiveMonths').valueAsDate = date2;
  document.getElementById('datePickerFiveMonthsII').valueAsDate = date2;

  var date3 = new Date();
  date3.setDate(date.getDate()+365);
  document.getElementById('datePickerTenMonths').valueAsDate = date3;

}

//-------------------------------------------------------------------------------------//

function checkPassword(){
  var pass = document.getElementById('password');
  var passChecker = document.getElementById('passtest');
  var submit = document.getElementById('submission');
  var confirmPass = document.getElementById('confirmpassword');
  var confirmPassChecker = document.getElementById('confirmpasstest');

  submit.disabled = true;
  if(pass.value != confirmPass.value){
    confirmPassChecker.style.color = "red";
    confirmPassChecker.innerHTML = "Passwords do not match.";
    submit.disabled = true;
    submit.style.background="grey";
  }

  if(pass.value.length<9){
    passtest.style.color = "red";
    passtest.innerHTML = "Password too short.";
  }
  else if(pass.value.length > 8 && pass.value.length < 17){
    passtest.style.color = "green";
    passtest.innerHTML = "Valid password!";
  }

  if(pass.value == confirmPass.value){
    confirmPassChecker.style.color = "green";
    confirmPassChecker.innerHTML = "Passwords Match!";
  }

  if(confirmPass.value == " " || confirmPass.value == "" || pass.value ==""){
    confirmPassChecker.innerHTML = "<br>";
    submit.disabled = true;
    submit.style.background="grey";
  }

  if(passtest.style.color == "green" && confirmPassChecker.style.color == "green"){
    submit.disabled = false;
    submit.style.background="#8075B6";
  }
}

//-------------------------------------------------------------------------------------//

// Code taken from https://www.w3schools.com/howto/howto_js_collapsible.asp
function toggleCollapse(){
  var collapse = document.getElementsByClassName("collapsible");
  var i;
  for (i = 0; i < collapse.length; i++) {
  collapse[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
  }
}


//-------------------------------------------------------------------------------------//

function search(value){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      document.getElementById('studentsTable').innerHTML = this.responseText;
  }
  if(value.length==0){
    xhttp.open("GET", "/GroupProject/public/ManageStudents/createNoSearchContent", true);
  }
  else{
    xhttp.open("GET", "/GroupProject/public/ManageStudents/search/"+value, true);
  }

  xhttp.send();
}
//-------------------------------------------------------------------------------------//

// Code from W3schools -- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal_bottom
function modal(){
  // Get the modal
  var modal = document.getElementById('myModal');
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  // When the user clicks the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
