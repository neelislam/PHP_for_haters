<?php

$username = "Titanium Dioxide";

echo isset($username);


$user = "";

echo isset($user);



$name = "Titanium Dioxide";

echo isset($name);

echo"<br>";
if(isset($username)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
?>