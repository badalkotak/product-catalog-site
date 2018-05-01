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
   <link rel="stylesheet" href="../../../Resources/css/base.css">
	<link rel="stylesheet" href="../../../Resources/css/details_layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="../../../Resources/favicon.ico" >

   <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>


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

   <!-- <section id="intro">
   ,sabdasmßå
   </section> -->
   <!-- footer
   ================================================== -->

   <div class="content">
   <!-- <section id="aboutus">
   Test
   </section> -->
      <div class="row">
      <!-- <center> -->
      <div id="portfolio-wrapper">

         <?php
         // $getMainCat=$cat->getMainCategory();

         $sub_cat = new SubCategory($dbConnect->getInstance());

         $sub_cat_id=$_REQUEST['scId'];
         $getCategoryName = $sub_cat->getSubCategories(0,$sub_cat_id);

         if($getCategoryName != null)
         {
            while($nameRow = $getCategoryName->fetch_assoc())
            {
                $sc_name = $nameRow['scName'];
                $mc_name = $nameRow['mcName'];
            }

            echo "<h3>$sc_name - $mc_name</h3>";
         }
         $getProduct=$product->getProducts($sub_cat_id);

         if($getProduct != null)
         {
            echo "<hr>";
            while($mainRow=$getProduct->fetch_assoc())
            {
               // $main_cat_name=$mainRow['category_name'];
               // $main_cat_id=$mainRow['id'];

              $product_id = $mainRow['id'];
              $product_name = $mainRow['product'];
              $product_image = $mainRow['product_image_path'];

               // echo '<div class="row">';

              $url = "product_desp.php?id=$product_id";

               echo '<div class="col portfolio-item">
                        <div class="item-wrap">
                           <a href="'.$url.'" target="_blank"><img src="product_images/'.$product_image.'" alt="" style = "height:160px; width:100%;"/></a>
                           <div class="portfolio-item-meta">
                              <h5><a href="'.$url.'">'.$product_name.'</a></h5>
                           </div>
                        </div>
                        </div>';

               // echo "<hr></div>";
               }
               }
               else
               {
                  echo "<h3>No Products on display. Check again soon!";
               }
         ?>
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

   <script src="../../../Resources/js/scrollspy.js"></script>
   <script src="../../../Resources/js/smoothscroll.js"></script>
   <script src="../../../Resources/js/jquery.flexslider.js"></script>
   <script src="../../../Resources/js/jquery.reveal.js"></script>
   <script src="../../../Resources/js/init.js"></script>
   <script src="../../../Resources/js/smoothscrolling.js"></script>


</body>

</html>