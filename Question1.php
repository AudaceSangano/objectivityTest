<?php
function swapArray($array, $index1, $index2) {
  $temp = $array[$index1];
  $array[$index1] = $array[$index2];
  $array[$index2] = $temp;
  print_r($array);  
}

$orginalArray = [1, 2, 3, 4, 5,6];

echo "Original array: ";
print_r($orginalArray); 
echo "<br>";

echo "Modified array: ";
$modifiedArray = swapArray($orginalArray, 0, 4);
