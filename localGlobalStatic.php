<?php

// we will us e session, post, get, files
$a=40;
$c=400;


function test(): void{
    $a=200;
    echo "Value of a inside function: $a<br>";
    global $a; // Accessing the global variable
    echo "Value of a after global keyword: $a<br>";
    static $b = 100; // Static variable retains its value between function calls
    echo "Value of b inside function: $b<br>";
    $b += 10; // Incrementing static variable
    echo "Value of b after increment: $b<br>";
    $GLOBALS['a']."<br>"; 
    echo "Value of a after modifying with \$GLOBALS: {$GLOBALS['a']}<br>";
}
echo $a."<br>"; 
echo $c."<br>"; 
test();


?>