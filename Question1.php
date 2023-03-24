<?php
function swapElements($array, $index1, $index2) {
  $temp = $array[$index1];
  $array[$index1] = $array[$index2];
  $array[$index2] = $temp;
  for ($i=0; $i < count($array); $i++) { 
    echo $array[$i];
  }
}

$arr = [1, 2, 3, 4, 5,6];
$arr = swapElements($arr, 0, 4);
echo $arr; 
