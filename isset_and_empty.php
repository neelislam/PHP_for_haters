<?php

$username = "Titanium Dioxide";

echo isset($username);


$user = null;

echo isset($user);



echo"<br>";
if(isset($username)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";
if(isset($name)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";
if(isset($user)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";

//empty




$username2 = "Titanium Dioxide";

echo isset($username2);


$user2 = null;
$user3 = false;
$user4 = "";




echo isset($user2);
echo"<br>";
if(isset($name4)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}


echo"<br>";
if(isset($username2)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";
if(isset($name2)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";
if(isset($user3)){
    echo"This variable is set";
} else {
    echo "This variable is not set";
}
echo"<br>";

?>