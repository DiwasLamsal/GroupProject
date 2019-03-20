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
  $colors = array('red', 'blue', 'purple', 'orange', 'black', 'brown', 'green', 'grey', 'CadetBlue', 'Chocolate',
                              'CornflowerBlue', 'Crimson', 'darkblue', 'darkgoldenrod', 'DarkOliveGreen', 'DarkRed', 'DarkSlateBlue',
                               'DarkSlateGray', 'Navy', 'Olive',  'SeaGreen',  'Sienna',  'Teal', 'YellowGreen', 'OliveDrab', 'LimeGreen');

  return $colors[array_rand($colors)];
}

?>
