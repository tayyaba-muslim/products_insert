<?php
include('connection.php');

if(isset($_POST['submit'])){
    // print_r($_FILES);
    $pname = $_POST['pname'];
    $pcat = $_POST['cat'];
    $pdes = $_POST['des'];
    $price = $_POST['price'];
    $img_name = $_FILES['img']['name'];
    $img_tmpname = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];

$insert_products ="INSERT INTO `products_details` (`p_name`, `p_category`, `p_description`, `p_price`, `p_image`)
     VALUES (' $pname', ' $pcat', '$pdes', '  $price ', '$img_name')";
     $result = mysqli_query($conn, $insert_products); 
     move_uploaded_file($img_tmpname, 'uploadfiles/'. $img_name);
     if(!$result){
      echo "query failed";
     }
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style.css">
    <title> products </title>
</head>
<body>

<?php
include('header.php');
?>
<div class="container">
<h1><u> Add Product </u></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="form-group">

<input type="hidden" name="p_id" class="form-control">
<br>
<label for="name"> Name </label>
<input type="text" name="pname" class="form-control">
<br>
<label for="cat"> Category </label>
<input type="text" name="cat" class="form-control">
<br>
<label for="des"> Description </label>
<input type="text" name="des" class="form-control">
<br>
<label for="price"> Price </label>
<input type="number" name="price" class="form-control">
<br>
<label for="img"> Image </label>
<input type="file" name="img" class="form-control">
<br>
<input type="submit" name="submit" value = "Add product" class="btn btn-primary">



</form>
</div>
</body>
</html>