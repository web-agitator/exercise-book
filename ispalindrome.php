<?php
// $str="AVIDA DI VITA DESIAI OGNI AMORE VERO MA INGOIAI SEDATIVI DA DIVA";
$str="Are we not drawn onward, we few, drawn onward to new era?";
function san($str){
  $str=strtolower($str);
  $str=preg_replace('/\s/', '',$str);
  $str = preg_replace('/[^a-z0-9 -]+/', '', $str);
  return $str;
}
$str=san($str);
$reverse=strrev($str);
echo $str . "<br>" . $reverse . "<br>";
if (strcmp($str, $reverse) !== 0) {
    echo 'The phrase is not palindrome';
}
else {
  echo "The phrase is palindrome";
}
