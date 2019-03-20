window.onload = function(){

  // Timeout just to test the function
  setTimeout(function(){
    document.getElementsByClassName('load')[0].style.display = "none";
  }, 10);


  var dropdown = document.getElementById('dropdown');
  dropdown.addEventListener('click', function(){
    document.getElementById("myDropdown").classList.toggle("show");
  });


}
