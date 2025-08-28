<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Enter a country</label>
        <input type="text" name="country">
        <input type="submit">
    </form>
</body>
</html>



<?php

$_POST["country"];
$country =  $_POST["country"];
echo "<br>";



$capitals = array(
"Dhaka"=>"Bangladesh",
 "London"=>"UK",
  "Paris"=>"France",
   "Tokyo"=>"Japan"
   );
foreach($capitals as $x => $x_value) {
    if($country == $x_value){
        echo "The capital of {$x_value} is {$x}.";
    }
}



   ?>