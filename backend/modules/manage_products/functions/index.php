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
        <li class="active"><a href="../../login/functions/Dashboard.php"><i class="fa fa-product-hunt"></i> <span>Manage Products</span></a></li>
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
      <form class="form-horizontal" action="insert.php" method="post" id="addSubCategory" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Product Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="Product">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="desp">Product Description:</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" id="desp" name="desp"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="cat">Category</label>
        <div class="col-sm-10"> 
          <select class="form-control" id="cat" name="cat">
            <option value=0>Select Category</option>

          <!-- <input type="password" class="form-control" id="pwd" placeholder="Enter password"> -->
          <?php
          $result=$sub_cat->getSubCategories(0);
          $i = 0;
          if($result!=null)
          {
              while($row = $result->fetch_assoc())
              {
                  $i++;
                  $sub_cat_id=$row['scId'];
                  $sub_cat_name=$row['scName'];
                  $main_cat_name=$row['mcName'];

                  echo "<option value=$sub_cat_id>$sub_cat_name - $main_cat_name</option>";
              }
          }
          ?>
          </select>
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2" for="product_img">Product Image</label>
          <input type="file" id="product_img" name="file">
        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" id="submit">Add</button>
        </div>
      </div>

      <div style="color:#f56954" id="error"></div>
    </form>
    <hr>

    <div class="table-container1">
      <table class="table table-bordered table-hover example2">
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Sub-Category</th>
            <th>Main-Category</th>
            <th>Product Image</th>
            <th>Extra Images</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $product_result=$product->getProducts(0);
        $i = 0;
        if($result!=null)
        {
            while($row = $product_result->fetch_assoc())
            {
                $i++;
                $sub_cat_id=$row['scId'];
                $sub_cat_name=$row['scName'];
                $main_cat_name=$row['mcName'];
                $product_id=$row['pId'];
                $product_name=$row['pName'];
                $product_desp=$row['pDesp'];
                $product_image=$row['pImage'];

                echo "<tr>";
                  echo "<td>$i</td>";
                  echo "<td>$product_name</td>";
                  echo "<td>$product_desp</td>";
                  echo "<td>$sub_cat_name</td>";
                  echo "<td>$main_cat_name</td>";
                  echo "<td><a href=product_images/$product_image><center><i style='color:#000000' class='fa fa-eye'><br>View</center></i></a></td>";
                  echo "<form action=addExtra.php><td><button type='submit' class='btn btn-default' name='extra' value='$product_id'>Add</button></form>";
                  echo "<form action=edit.php><td><button type='submit' class='btn btn-warning' name='edit' value='$product_id'>Edit</button></form>";
                  echo "<form action=delete.php><td><button type='submit' class='btn btn-danger' name='delete' value='$product_id'>Delete</button></td></form>";
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

<script>

$(document).ready(function(){

  // $("#addSubCategory").submit(function(event){
  //   event.preventDefault();
  // });

  $("#submit").click(function(){
    var product_name=$("#name").val();
    // var passwd=$("#passwd").val();
    var cat=$("#cat").val();
    var desp=$("#desp").val();

    if(product_name=="" || cat==0 || desp=="")
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
