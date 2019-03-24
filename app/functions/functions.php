<?php

function loadTemplate($fileName, $templateVars) {
  extract($templateVars);
  ob_start();
  require $fileName;
  $contents = ob_get_clean();
  return $contents;
}



function getGeneratedPassword($firstname, $lastname, $date){
  // Ram Krishna Shrestha 1990-05-15   FL-YYYY-MM-DD  RS-1990-05-15
  $pass = substr($firstname,0,1).substr($lastname, 0, 1).'-'.$date;
  return $pass;
}

// https://stackoverflow.com/questions/9612061/random-background-color-from-array-php

function generateRandomColor(){
  $colors = array('purple', 'black', 'brown', 'green', 'grey', 'CadetBlue', 'Chocolate',
                              'CornflowerBlue', 'Crimson', 'darkgoldenrod', 'DarkOliveGreen', 'DarkRed', 'DarkSlateBlue',
                               'DarkSlateGray', 'Navy', 'Olive',  'SeaGreen',  'Sienna',  'Teal', 'OliveDrab');
  return $colors[array_rand($colors)];
}



function checkDateStatus($sdate, $edate){
  $today = date("Y-m-d");
  if($edate<$today){
    return "Ended";
  }
  else if($sdate<$today && $edate>$today){
    return "Ongoing";
  }
  else{
    return "Not Started";
  }
}


?>
