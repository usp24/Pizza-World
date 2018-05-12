<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pizza | User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../css/default/fa/fontawesome-free-5.0.9/svg-with-js/js/fontawesome-all.min.js"></script>
    <script src="../js/default/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/default/fa/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user.css">
    <script src="../css/default/fa/js/bootstrap.min.js"></script>
    <script src="../js/homeJS.js" type="text/javascript" ></script>
    <script>
        function fn(o){
            window.open('backend/delete2.php?o='+o,'_self');
        }
    </script>
</head>
<?php
session_start();
$user = $_SESSION["login_user"];
?>
<h1>Today's Orders</h1>

<body>
    <table>
        <tr>
            <th>Order-Id</th>
            <th>Crust</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Toppings</th>
            <th>Total</th>
            <th></th>
            <th></th>
        </tr>
    
<?php

$con = mysqli_connect("localhost:3324","root","");
mysqli_select_db($con,"pizza");
$r = mysqli_query($con,"select * from myorder");
$tot = 0;
while($row = mysqli_fetch_assoc($r)){
    echo "<tr><td>";
    echo $row["order_id"];
    echo "</td><td>";
    echo $row["crust"];
    echo "</td><td>";
    echo $row["size"];
    echo "</td><td>";
    echo $row["qty"];
    echo "</td><td>";
    echo $row["topping"];
    echo "</td><td>";
    echo $row["total"];
    echo "</td>";
    $tot += $row["total"];
    echo "<td><input type='button' value='Delivered' class='btn btn-success' onclick='fn(".$row["order_id"].")' /></td>";
    echo "<td><input type='button' value='Cancle' class='btn btn-danger' onclick='fn(".$row["order_id"].")' /></td>";
    echo "</tr>";
}
?>
</table> 
</body>
</html>