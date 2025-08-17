<?php
// 1. Indexed Array (Numeric keys)
$fruits = ["Apple", "Banana", "Mango"];
echo "Indexed Array:<br>";
echo $fruits[0] . "<br>"; // Apple
echo $fruits[1] . "<br>"; // Banana
echo $fruits[2] . "<br><br>"; // Mango


// 2. Associative Array (Custom keys)
$age = [
    "Rahim" => 20,
    "Karim" => 22,
    "Salam" => 19
];
echo "Associative Array:<br>";
echo "Rahim is " . $age["Rahim"] . " years old.<br>";
echo "Karim is " . $age["Karim"] . " years old.<br>";
echo "Salam is " . $age["Salam"] . " years old.<br><br>";


// 3. Multidimensional Array (Array inside array)
$students = [
    ["Name" => "Rahim", "Age" => 20, "Grade" => "A"],
    ["Name" => "Karim", "Age" => 22, "Grade" => "B"],
    ["Name" => "Salam", "Age" => 19, "Grade" => "A+"]
];
echo "Multidimensional Array:<br>";
echo $students[0]["Name"] . " - " . $students[0]["Grade"] . "<br>"; // Rahim - A
echo $students[1]["Name"] . " - " . $students[1]["Grade"] . "<br>"; // Karim - B
echo $students[2]["Name"] . " - " . $students[2]["Grade"] . "<br><br>";


// 4. Array Functions Example
echo "Array Functions:<br>";
echo "Total fruits: " . count($fruits) . "<br>"; // 3
echo "Fruits List:<br>";
print_r($fruits); // Prints full array
echo "<br><br>";

?>
