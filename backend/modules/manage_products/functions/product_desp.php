<!DOCTYPE html>
<html>

<head>


   <!--- Basic Page Needs
   ================================================== -->
	<meta charset="utf-8">
	<title>Winout</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" type="text/css" href="../../../Resources/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../../../Resources/css/base.css">
	<link rel="stylesheet" href="../../../Resources/css/details_layout.css">
  

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="../../../Resources/favicon.ico" >

</head>

<body data-spy="scroll" data-target="#nav-wrap">


   <!-- Header
   ================================================== -->
   <header class="mobile">

      <div class="row">

         <div class="col full">

            <div class="logo">
               <a href="../../../index.php#intro"><img alt="" src="../../../Resources/images/logo.png"></a>
            </div>

            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

              <?php
                require_once("../../../classes/DBConnect.php");
                require_once("../../manage_sub_category/classes/SubCategory.php");
                require_once("../classes/Product.php");

                $dbConnect = new DBConnect(Constants::SERVER_NAME,
                Constants::DB_USERNAME,
                Constants::DB_PASSWORD,
                Constants::DB_NAME);

                $product = new Product($dbConnect->getInstance());
                $product_id=$_REQUEST['id'];
              ?>

               <ul id="nav" class="nav">
	               <li><a href="../../../index.php#intro">Home</a></li>
	               <!-- <li><a href="#services">Services</a></li> -->
	               <li><a href="../../../index.php#portfolio">Portfolio</a></li>
	               <!-- <li><a href="#journal">Journal</a></li> -->
                  <li><a href="../../../index.php#aboutus">About Us</a></li>
                  <li><a href="../../../index.php#contact">Contact</a></li>

               </ul>

            </nav>

         </div>

      </div>

   </header> <!-- Header End -->

   <div class="content">

   <div class="container">
    <div class="row">
    <div class="col-sm-6">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
            $getProduct = $product->getDetails($product_id);

            if($getProduct != null)
            {
                while($row = $getProduct->fetch_assoc())
                {
                    $product_name=$row['product'];
                    $product_image=$row['product_image_path'];
                    $product_desp=$row['product_desp'];
                    $scName=$row['scName'];
                    $mcName=$row['mcName'];

                    echo '<div class="item active">
                            <img src="product_images/'.$product_image.'" alt="'.$product_name.'" style="width:100%;">
                          </div>';
                }
            }
            else
            {
                echo "<h3>No such product available!</h3>";
            }

            $getExtraImages = $product->getExtraProductImage($product_id);

            if($getExtraImages != null)
            {
                while ($extraRow = $getExtraImages->fetch_assoc())
                {
                    $extra_image = $extraRow['image'];

                    echo '<div class="item">
                            <img src="product_images/'.$extra_image.'" alt="'.$product_name.'" style="width:100%;">
                          </div>';                    
                }
            }
        ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- <div class="container"> -->
</div>

<div class="col-sm-6">
<table class="table">
    <tbody>
    <?php
    echo "<tr>";
      echo "<td><b>Product Name</b></td>";
      echo "<td>$product_name</td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td><b>Description</b></td>";
      echo "<td><p>$product_desp</p></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td><b>Category</b></td>";
      echo "<td>$scName > $mcName</td>";
    echo "</tr>";
    ?>      
    </tbody>
  </table>
</div>
</div>
</div>
</div>

   <footer class="footer">

      <div class="row">

         <div class="col g-7">
            <ul class="copyright">
               <li>&copy; 2018 Winout</li>
            </ul>
         </div>

         <div class="col g-5 pull-right">
            <ul class="social-links">
               <li><a href="#"><i class="icon-facebook"></i></a></li>
               <li><a href="#"><i class="icon-twitter"></i></a></li>
               <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
               <li><a href="#"><i class="icon-linkedin"></i></a></li>
               <li><a href="#"><i class="icon-skype"></i></a></li>
               <li><a href="#"><i class="icon-rss-sign"></i></a></li>
            </ul>
         </div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="Resources/js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="../../../Resources/js/jquery-migrate-1.2.1.min.js"></script>
   <script type="text/javascript" src="../../../Resources/js/slider.js"></script>
   <script type="text/javascript" src="../../../Resources/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>

   <script src="../../../Resources/js/jquery.flexslider.js"></script>
   <script src="../../../Resources/js/jquery.reveal.js"></script>
   <script src="../../../Resources/js/init.js"></script>


</body>

</html>