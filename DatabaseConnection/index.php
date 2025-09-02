<?php
 include("database.php");


 $sql = "SELECT * FROM task";


$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo $row["id"] . "<br>";
    echo $row["name"] . "<br>";
    echo $row["reg_date"] . "<br>";
    echo $row["password"] . "<br>";
}


 mysqli_close($conn)
?>


