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

$cat_id=$_REQUEST['edit'];

$getCat = $category->getCategory(0,$cat_id);

if($getCat!=null)
{
  echo "in while";
  while($row = $getCat->fetch_assoc())
  {
    echo $name=$row['name'];
    $tag_line=$row['tag_line'];
    $layout=$row['layout'];
    $cover_image=$row['cover_image'];
  }

  $sendArr[] = [$cover_image,$cat_id];
}
else
{
  $message = "No such category!";
  // echo "<script>alert('$message');window.location.href='index.php';</script>";
}

?>
<ul class="sidebar-menu">
        <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>
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
        <small>Edit category</small>
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
        <label class="control-label col-sm-2" for="name">Category Name:</label>
        <div class="col-sm-10">
          <?php
            echo '<input type="text" class="form-control" id="name" name="name" value="'.$name.'">';
          ?>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="tag">Tag Line:</label>
        <div class="col-sm-10">
        <?php
          echo '<input type="text" class="form-control" id="tag" name="tag" value="'.$tag_line.'">';
        ?>
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
          <?php

          for($val=0;$val<=5;$val++)
          {
            if($val == 0)
              $text = "Default: None";
            else
              $text = $val;

            if($val == $layout)
            {
              echo "<option value=$val selected>$text</option>";
            }
            else
            {
              echo "<option value=$val>$text</option>";
            }
          }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group">
      <?php
            echo '<label class="control-label col-sm-2" for="img_cat">Current Cover Image</label>
            <a id="img_cat" name="img_cat" href=cover_images/'.$cover_image.'><center><i style="color:#000000" class="fa fa-eye"><br>View</center></i></a>'
          ?>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="cat_img"> Change Cover Image</label>
          <input type="file" id="cat_img" name="file">
        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <?php
            echo '<input hidden type="text" name="id" value="'.$cat_id.'"></input>';
            echo '<button type="submit" class="btn btn-success" id="submit" name="oldImg" value="'.$cover_image.'">Update</button>';
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
    <?php
      echo 'var cat_id='.$cat_id.';';
    ?>

    console.log("ID:"+cat_id);

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
	            data: "layout=" + layout + "&id="+ cat_id,
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

  // return false;
  });
});

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
