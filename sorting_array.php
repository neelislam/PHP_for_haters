<?php
$arr1 = [10, 20, 30, 40, 50];
$arr = [1, 2, 3, 4, 5, "a", "b", "c", "d", "e"];

echo "<h2>Initial Arrays</h2>";
echo "<h3>Array \$arr:</h3>";
echo "<pre>";
print_r($arr);
echo "</pre>";

echo "<h3>Array \$arr1:</h3>";
echo "<pre>";
print_r($arr1);
echo "</pre>";

// Merge arrays
$mergedArr = array_merge($arr, $arr1);
echo "<h2>Merged Array</h2>";
echo "<h3>Result of array_merge(\$arr, \$arr1):</h3>";
echo "<pre>";
print_r($mergedArr);
echo "</pre>";

// Keep only numbers from merged array
$numericArr = array_values(array_filter($mergedArr, 'is_numeric'));

// Sort the numeric array
sort($numericArr);
echo "<h2>Sorted Numeric Array</h2>";
echo "<h3>Result of sort(\$numericArr):</h3>";
echo "<pre>";
print_r($numericArr);
echo "</pre>";

echo "<h2>Array Push and Pop Operations</h2>";
$stack = [100, 200];
echo "<h3>Initial Stack:</h3>";
echo "<pre>";
print_r($stack);
echo "</pre>";

// Push
array_push($stack, 300);
echo "<h3>After array_push(\$stack, 300):</h3>";
echo "<pre>";
print_r($stack);
echo "</pre>";

// Pop
$poppedValue = array_pop($stack);
echo "<h3>After array_pop(\$stack):</h3>";
echo "<pre>";
print_r($stack);
echo "</pre>";

echo "<h3>Popped value:</h3>";
echo $poppedValue;
?>
