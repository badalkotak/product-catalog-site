<?
include("../../../Resources/Dashboard/header.php");
require_once("../../../classes/DBConnect.php");
require_once("../../manage_sub_category/classes/SubCategory.php");
require_once("../classes/Product.php");


$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$product = new Product($dbConnect->getInstance());
$sub_cat = new SubCategory($dbConnect->getInstance());
?>
<ul class="sidebar-menu">
        <li><a href="../../login/functions/Dashboard.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-list-alt"></i> <span>Manage Sub-Category</span></a></li>
        <li><a href="index.php"><i class="fa fa-product-hunt"></i> <span>Manage Products</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Products
        <!-- <small>Manage your website</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
    <div class="box-body">

      <!-- Your Page Content Here -->

      <?php
          $product_id = $_REQUEST['extra'];
          $getCount = $product->getExtraImagesCount($product_id);

          if($getCount != null)
          {
              while($countRow = $getCount->fetch_assoc())
              {
                  $count = $countRow['COUNT(id)'];
              }
          }
      ?>
      <?php
      $product_result=$product->getDetails($product_id);
        $i = 0;
        if($product_result!=null)
        {
            while($row = $product_result->fetch_assoc())
            {
                $i++;
                $product_name=$row['product'];
             }
        }
        else
        {
            echo "";
        }

        echo "<h3>$product_name</h3><hr>";
      
      // echo '<div class="form-group">
      //   <label class="control-label col-sm-2" for="name">Product Name:'.$product_name.'</label>';

        if($count < 5)
          {
      ?>
        <!-- <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="Product">
        </div> -->
      <!-- </div> -->
      <form class="form-horizontal" action="insert_extra_image.php" method="post" id="addSubCategory" enctype="multipart/form-data">
      <div class="form-group">
          <label class="control-label col-sm-2" for="product_img">Product Image</label>
          <input type="file" id="product_img" name="file">
        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <?php
              echo '<button type="submit" class="btn btn-success" id="submit" name="submit" value='.$product_id.'>Add</button>';
          ?>
        </div>
      </div>

      <div style="color:#f56954" id="error"></div>
    </form>
    <hr>
    <?}
    else
    {
        echo "<h4>Only 5 extra images can be added!</h4><hr>";
    }
    ?>

    <div class="table-container1">
      <table class="table table-bordered table-hover example2">
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Product Image</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // echo $product_id;
        $product_result=$product->getExtraProductImage($product_id);
        $i = 0;
        if($product_result!=null)
        {
            while($row = $product_result->fetch_assoc())
            {
                $i++;
                $product_image=$row['image'];
                $image_id=$row['id'];

                echo "<tr>";
                  echo "<td>$i</td>";
                  echo "<td><a href=product_images/$product_image><center><i style='color:#000000' class='fa fa-eye'><br>View</center></i></a></td>";
                  $arr=array($image_id,$product_image,$product_id);
                  echo "<form action=delete_extra_image.php method=post><td><button value=$product_id name=pid hidden></button><button type='submit' class='btn btn-danger'>Delete</button></td>";
                  foreach($arr as $value)
                  {
                      echo "<input type=text name='data[]' value='$value' hidden></input>";
                  }
                  echo "</form>";
                echo "<tr>";
            }
        }
        ?>
      </tbody>
      </table>
      </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <!-- Anything you want -->
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 Winout.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../../../Resources/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../../Resources/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../Resources/AdminLTE-2.3.11/dist/js/app.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
