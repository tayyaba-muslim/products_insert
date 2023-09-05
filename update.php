<?php
include('connection.php');
$user_id = $_GET['p_id'];
// echo $user_id;
$updateSql ="SELECT * from `products_details` where p_id = '$user_id'";
$fetch = mysqli_query($conn, $updateSql);
if(!$fetch){
    die("query failed");
}
if(mysqli_num_rows($fetch) > 0){

    while($row = mysqli_fetch_assoc($fetch)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
    <title>Form handling </title>
</head>
<body>
<div class="container">
<h1>Update Details </h1>
<form action="updatedata.php" class="form-group" method="post" enctype="multipart/form-data">

    <input type="hidden" name="p_id" class="form-control" value="<?php echo $row['p_id']?>" >
<label for="name"> Name </label>
<input type="text" name="pname" class="form-control" value="<?php echo $row['p_name']?>" >
<br>
<label for="cat"> Category </label>
<input type="text" name="cat" class="form-control" value="<?php echo $row['p_category']?>" >
<br>
<label for="des"> Description </label>
<input type="text" name="des" class="form-control" value="<?php echo $row['p_description']?>" >
<br>
<label for="price"> Price </label>
<input type="number" name="price" class="form-control" value="<?php echo $row['p_price']?>" >
<br>
<label for="img"> Image </label>
<input type="file" name="img" class="form-control" value="<?php echo $row['p_image']?>" >
<br>
<input type="submit" name="submit" value = "Add product" class="btn btn-primary">



</form>
</div>
    <?php
}
}

?>

</body>
</html>