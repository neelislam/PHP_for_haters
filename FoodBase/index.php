<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">
    

    <label>Quantity</label><br>
    <input type="text" name="quantity">
     <input type="submit" value="total">

</form>
</body>
</html>

<?php 
$item= "Cake";
$price= 125.99;
$quantity = $_POST["quantity"];

$total = $price * $quantity;


echo "You have ordered {$quantity} {$item}(s) at the price of Tk. {$price} each. <br>";

echo "Your total bill is Tk. {$total}/- <br>";

?>