<?php
$con=mysqli_connect("localhost","root","root","ecommerce");

//get categories
function getCats()
{ global $con;
  $get_cats="select * from categoris";
  $run_cats=mysqli_query($con,$get_cats);
  while($row_cats=mysqli_fetch_array($run_cats))
  {
      $cat_id=$row_cats['cat_id'];
      $cat_title=$row_cats['cat_title'];
      echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

  }
}


function getPro()
{
  if(!isset($_GET['cat']))
  {

 global $con;
 $get_pro="select * from products order by RAND() LIMIT 0,8";
 $run_pro=mysqli_query($con,$get_pro);
 while($row_pro=mysqli_fetch_array($run_pro))
 {
   $pro_id=$row_pro['product_id'];
   $pro_title=$row_pro['product_title']; 
   $pro_brand=$row_pro['product_brand'];
   $pro_category=$row_pro['product_cat'];
   //$pro_desc=$row_pro['product_des'];
   $pro_price=$row_pro['product_price'];
   $pro_image=$row_pro['product_img'];
   //$pro_keywords=$row_pro['product_keywords'];
   echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/prod image/$pro_image' width='150' height='150'/>
     <p><b> Price: Rs. $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
          <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
      </div>
      ";
 }

  }
}

function getCatPro()
{
  if(isset($_GET['cat']))
  {
   $cat_id=$_GET['cat'];
   global $con;
   $get_cat_pro="select * from products where product_cat='$cat_id'";
   $run_cat_pro=mysqli_query($con,$get_cat_pro);
 while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
 {
   $pro_id=$row_cat_pro['product_id'];
   $pro_title=$row_cat_pro['product_title']; 
   $pro_brand=$row_cat_pro['product_brand'];
   $pro_category=$row_cat_pro['product_cat'];
   //$pro_desc=$row_pro['product_des'];
   $pro_price=$row_cat_pro['product_price'];
   $pro_image=$row_cat_pro['product_img'];
   //$pro_keywords=$row_pro['product_keywords'];
   echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/prod image/$pro_image' width='150' height='150'/>
     <p><b> Price: Rs. $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
          <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
      </div>
      ";
 }

  }
}





?>