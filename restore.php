<?php
include('connection.php');
$user_id = $_GET['p_id'];

$delete = "UPDATE `products_details` SET status = '1' where p_id ='$user_id' ";

$result1 = mysqli_query($conn, $delete);

if(!$result1){
    die("query failed");
}
header('location:productdata.php');


?>