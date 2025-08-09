<?php

$name = "Neel Shaheb";
$food = "Nachos";
$email = "fake@gmail.com";
echo $name;

$age = 21;
$users = 2;
$quantity = 5;

$gpa = 2.5;
$price = 3.87;
$tax_rate = 5.1;

$employed = true;
$online = false;
$for_sale = true;

echo "Hello {$name}<br>";
echo "You like {$food}<br>";
echo "Your mail: {$email}<br>";

echo"You are {$age} years old<br>";
echo"There are {$users} users online";
echo"You would like to buy {$quantity} item<br>";
echo"Your gpa is {$gpa} <br>";
echo"Your nachos is \${$price} <br>";
echo"The sales tax rate is: {$tax_rate}%<br>";
echo "Employed status: {$employed}<br>";
echo "Online status: {$online}<br>";
echo "For sale status: {$for_sale}<br>";





echo "You have ordered {$quantity} x {$food}<br>";

$total = null;


$total = $quantity * $price;


echo "Total price: {$total}<br>"
?>