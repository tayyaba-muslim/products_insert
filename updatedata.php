<?php
include('connection.php');


if(isset($_POST['submit'])){
    // print_r($_POST);
    // print_r($_FILES);
    // die();
$user_id = $_POST['p_id'];
$pname = $_POST['pname'];
$pcat = $_POST['cat'];
$pdes = $_POST['des'];
$price = $_POST['price'];
$img_name = $_FILES['img']['name'];



$update = "UPDATE `products_details` set p_name = '$pname', p_category = '$pcat', p_description = '$pdes',
 p_price = '$price', p_image = '$img_name' where p_id = '$user_id'";
$res = mysqli_query($conn, $update);
move_uploaded_file($img_name , 'uploadfiles/' . $tmp_name);
if(!$res){
    die("query failed");
}
header('location:productdata.php');

}
?>