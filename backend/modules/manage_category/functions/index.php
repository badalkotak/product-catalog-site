<?
include("../../../Resources/Dashboard/header.php");

require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/MainCategory.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$category = new MainCategory($dbConnect->getInstance());
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
        Main Category
        <small>Manage your website categories</small>
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

    <form class="form-horizontal" action="insert.php" method="post" id="addSubCategory" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Category Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="tag">Tag Line:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tag" name="tag">
        </div>
      </div>

      <!-- <div class="form-group">
        <label class="control-label col-sm-2" for="desp">Description:</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" id="desp" name="desp"></textarea>
        </div>
      </div>
 -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="layout">Layout</label>
        <div class="col-sm-10"> 
          <select class="form-control" id="layout" name="layout">
            <option value=0>Default: None</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
          </select>
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="cat_img">Cover Image</label>
          <input type="file" id="cat_img" name="file">
        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" id="submit">Add</button>
        </div>
      </div>

      <div style="color:#f56954" id="error"></div>
    </form>

    <div class="table-container1">
      <table class="table table-bordered table-hover example2">
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Category Name</th>
            <th>Tag Line</th>
            <th>Category Image</th>
            <th>Layout</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $category_result=$category->getCategory();
        $i = 0;
        if($category_result!=null)
        {
            while($row = $category_result->fetch_assoc())
            {
                $i++;
                $name=$row['name'];
                $tag_line=$row['tag_line'];
                $layout=$row['layout'];
                $cover_image=$row['cover_image'];
                $cat_id=$row['id'];

                echo "<tr>";
                  echo "<td>$i</td>";
                  echo "<td>$name</td>";
                  echo "<td>$tag_line</td>";
                  echo "<td><a href=cover_images/$cover_image><center><i style='color:#000000' class='fa fa-eye'><br>View</center></i></a></td>";
                  if($layout == 0)
                  {
                    $layout="None";
                  }
                  echo "<td>$layout</td>";
                  echo "<form action=edit.php><td><button type='submit' class='btn btn-warning' name='edit' value='$cat_id'>Edit</button></form>";
                  echo "<form action=delete.php><td><button type='submit' class='btn btn-danger' name='delete' value='$cat_id'>Delete</button></td></form>";
                echo "<tr>";
            }
        }
        ?>
      </tbody>
      </table>
      </div>

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
    var cat_name=$("#name").val();
    // var passwd=$("#passwd").val();
    var layout=$("#layout").val();
    // var desp=$("#desp").val();
    var cat_img=$("#cat_img").val();
    var tag_line=$("#tag").val();

    var status = false;

    if(cat_name=="" || tag_line=="")
    {
      var alert_icon = document.createElement('i');
      alert_icon.setAttribute('class', 'fa fa-exclamation-triangle');
      $("#error").html(alert_icon).append("Please input all the fields!");
      return false;
    }
    else
    {
      if(layout != 0)
      {
        count = 0;
        $.ajax(
          {
              type: "POST",
              async: false,
              url: "checkLayout.php",
              data: "layout=" + layout,
              success: function (json) {
                console.log(json);
                  status = json.status;

                  // console.log(status);
              }
          });
      }
    }

  if(status == true)
  {
    console.log("In if");
    var alert_icon = document.createElement('i');
    alert_icon.setAttribute('class', 'fa fa-exclamation-triangle');
    $("#error").html(alert_icon).append("This layout is already assigned to someother category!");
    return false;
  }
  else
  {
    console.log("In else");
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
