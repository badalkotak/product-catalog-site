<?
include("../../../Resources/Dashboard/header.php");

require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");
require_once("../../manage_category/classes/MainCategory.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$category = new MainCategory($dbConnect->getInstance());
$product = new Product($dbConnect->getInstance());

$product_id=$_REQUEST['edit'];

$getProducts = $product->getDetails($product_id);
  $i = 0;
  if($getProducts!=null)
  {
    while($product_row = $getProducts->fetch_assoc())
    {
        $i++;
        $name=$product_row['name'];
        $desp=$product_row['desp'];
        $product_image=$product_row['image'];
        $category_id=$product_row['cat_id'];
        // $date_added=$product_row['date_added'];
        // $product_id=$product_row['id'];
    }
  }

?>
<ul class="sidebar-menu">
        <li class="active"><a href="../../login/functions/Dashboard.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
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
        Products
        <small>Manage your website Products</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
    <div class="box">
    <div class="box-body">

    <form class="form-horizontal" action="update.php" method="post" id="addSubCategory" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Product Name:</label>
        <div class="col-sm-10">
          <?php
            echo '<input type="text" class="form-control" id="name" name="name" value="'.$name.'">';
          ?>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="desp">Description:</label>
        <div class="col-sm-10">
        <?php
          echo '<textarea class="form-control" rows="3" id="desp" name="desp">'.$desp.'</textarea>';
        ?>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="cat">Select Category</label>
        <div class="col-sm-10"> 
          <select class="form-control" id="cat" name="cat">
            <option value=0>Select Category</option>
          <?php
          $category_result=$category->getCategory();
          $i = 0;
          if($category_result!=null)
          {
              while($row = $category_result->fetch_assoc())
              {
                $i++;
                $cat_name=$row['name'];
                $cat_id=$row['id'];

                if($cat_id == $category_id)
                {
                  echo '<option value='.$cat_id.' selected>'.$cat_name.'</option>';  
                }
                else
                {
                  echo '<option value='.$cat_id.'>'.$cat_name.'</option>';
                }
                
              }
          }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="curr_product_img">Current Product Image</label>
          <?php
            echo '<a href="product_images/'.$product_image.'" id="curr_product_img"><center><i style="color:#000000" class="fa fa-eye"><br>View</center></i></a>';
          ?>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="product_img">Change Product Image</label>
          <input type="file" id="product_img" name="file">
        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
        <?php
          echo '<button type="submit" class="btn btn-success" id="submit" name=id value="'.$product_id.'">Done</button>';
        ?>
        </div>
      </div>

      <div style="color:#f56954" id="error"></div>
    </form>

    </div>
    </div>

    </section>
    <!-- /.content -->
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

<!-- <script>

$(document).ready(function(){

  // $("#addSubCategory").submit(function(event){
  //   event.preventDefault();
  // });

  $("#submit").click(function(){
    var cat_name=$("#name").val();
    // var passwd=$("#passwd").val();
    var layout=$("#layout").val();
    // var desp=$("#desp").val();
    var cat_img=$("#cat_img").val();
    var tag_line=$("#tag").val(); 

    if(cat_name=="" || cat_img=="" || tag_line=="")
    {
      var alert_icon = document.createElement('i');
      alert_icon.setAttribute('class', 'fa fa-exclamation-triangle');
      $("#error").html(alert_icon).append("Please input all the fields!");
      return false;
    }
    else
    {
      return true;
    }
  });
});

</script>
 -->

 <script>

$(document).ready(function(){

  // $("#addSubCategory").submit(function(event){
  //   event.preventDefault();
  // });

  $("#submit").click(function(){
    var product_name=$("#name").val();
    // var passwd=$("#passwd").val();
    var desp=$("#desp").val();
    // var desp=$("#desp").val();
    var product_img=$("#product_img").val();
    var cat=$("#cat").val();

    var status = false;

    if(product_name=="" || desp=="" || cat == 0)
    {
      var alert_icon = document.createElement('i');
      alert_icon.setAttribute('class', 'fa fa-exclamation-triangle');
      $("#error").html(alert_icon).append("Please input all the fields!");
      return false;
    }
    else
    {
      return true;
    }
    
  });
});

</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
