<!DOCTYPE HTML>

<html>
<head>
<title>My online shop</title>
<?php
include("functions/function.php");
?>
<link rel="stylesheet" href="styles/styel.css" media="all">
</head>
<body>
  <!--Main Container starts here-->
  <div class="main">

    <!--Header starts here-->
    <div class="header">
       <img src="sample2.jpg"/>
    </div><!--header ends-->
    <!--Navigation Bar starts-->

    <div class="menubar">
      <ul id="menu">
        <li>  <a href="#">home</a> </li>
        <li> <a href="#">my products</a>        </li>
        <li> <a href="#">sign up</a>    </li>
        <li><a href="#">log in</a></li>
        <li><a href="#">shopping cart</a></li>
        <li><a href="#">contact us</a></li>

     
      <div id="form">
     <form  action="result.php" method="post" enctype="multipart/form-data">
     <input type="text" name="users" placeholder="search a product" style="width:1000x height:100px"/>
     <input type="submit" name="search" value="Search">
     </form>
     
    </div>
    </ul>
  </div>
  <!--Navigation Bar ends-->

  <!--Content wrapper starts-->
  <div class="content">
    
    <div id="sidebar">
      <ul id="cat">

      <?php getCats(); ?>

      <ul>

    </div>
    <div id="con">
   content
    
   <div id="products_box">
         <?php getPro();?>
       </div>   
  </div>
</div>
  <!--content wrapper ends-->
  <div class="footer">
    <h2><pre>&copy;
             2018 by www.xyz com"
             <b>back to top</b>

             </pre></h2>


  </div>
</div>
<!--main ends here-->
</body>
</html>
















