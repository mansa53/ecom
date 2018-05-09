<!DOCTYPE HTML>
<?php
include("includes/db.php")
?>
<html>
<head>
<title>inserting products</title>

 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="lavender">
    
<form action="insert_product.php" method="post" enctype="multipart/form-data">
<table align="center" width="750px" bgcolor="skyblue" border="2">

<tr>
<td colspan="8"><h2>insert new post here</h2></td>
</tr>
<tr align="center">
<td>product title:</td>
<td><input type="text" name="product_title" required/></td>
</tr>
<tr align="center">
<td>product category</td>
<td>
<select name="product_category" required>
<option >select a category</option>
<?php
 $get_cats="select * from categoris";
 $run_cats=mysqli_query($con,$get_cats);
 while($row_cats=mysqli_fetch_array($run_cats))
 {
     $cat_id=$row_cats['cat_id'];
     $cat_title=$row_cats['cat_title'];
     echo"<option>$cat_title</option>";

 }
?>

</select>
</td>

<!--<td><input type="text" name="product_brand"></td> !-->
</tr>
<tr align="center">
<td>product image:</td>
<!--<td><input type="text" name="product_image"></td>!-->
<td><input type="file" name="product_image" required/></td>
</tr>
<tr align="center"> 
<td>product description:</td>
<!--<td><input type="text" name="product_description"></td>!-->
<td><textarea name="product_desc" cols="20" rows="10" ></textarea></td>
</tr>
<tr align="center">
<td>product brand:</td>
<td><input type="text" name="product_brand" required/></td>
</tr>
<tr align="center">
<td>product price:</td>
<td><input type="text" name="product_price"/></td>
</tr>
<tr align="center">
<td>product keywords:</td>
<td><input type="text" name="product_keywords" required/></td>
</tr>
<tr align="center">

<td colspan="8"><input type="submit" name="insert_post" value="insert now"/></td>
</tr>

</table>



</form>

</body>






</html>
<?php

if(isset($_POST['insert_post']))
{
    //getting text data from the fields
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
/*$product_title=$_POST['product_title'];*/
//getting image

$product_image=$_FILES['product_image']['name'];
$product_image_tmp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp,"prod image/$product_image");
$insert_product="insert into products
(product_title,product_brand,product_cat,product_des,product_price,product_img,product_keywords)
values('$product_title','$product_brand','$product_cat','$product_desc','$product_price','$product_image','$product_keywords')";
 
$insert_pro=mysqli_query($con,$insert_product);
if($insert_pro)
{
    echo "<script>alert('product has been inserted')</script>";
    echo "<script>window.open('insert_product.php','_self)</script>";
}


}



?>
