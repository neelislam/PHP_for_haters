<?php
 include("database.php");

 $username = "Captain America";
 $password = "America123";

 $sql = "INSERT INTO users (user, password)
 VALUES ('$username', '$password')";

try{
mysqli_query($conn, $sql);
echo "Added to database";

}
catch(mysqli_sql_exception){
    echo "Could not add to database";
}

 mysqli_close($conn);
?>


