<?
include("../../../Resources/Dashboard/header.php");

require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/InvesterCorner.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$invester = new InvesterCorner($dbConnect->getInstance());
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
        Invester Corner
        <small>Manage your website Invester Corner</small>
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
        <label class="control-label col-sm-2" for="title">Title:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="title" name="title">
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="file">File:</label>
          <input type="file" id="file" name="file">
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
      <!-- class="table table-bordered table-hover example2"  -->
      <!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Title</th>
            <th>File</th>
            <th>Date Added</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $getIC = $invester->getIC(0);
        $i = 0;
        if($getIC!=null)
        {
            while($ic_row = $getIC->fetch_assoc())
            {
                $i++;
                $title=$ic_row['title'];
                $file=$ic_row['file'];
                $date_added=$ic_row['date_added'];
                $ic_id=$ic_row['id'];

                echo "<tr>";
                  echo "<td>$i</td>";
                  echo "<td>$title</td>";
                  echo "<td><a href=files/$file><center><i style='color:#000000' class='fa fa-eye'><br>View</center></i></a></td>";
                  echo "<td>$date_added</td>";
                  echo "<form action=edit.php><td><button type='submit' class='btn btn-warning' name='edit' value='$ic_id'>Edit</button></td></form>";
                  echo "<form action=delete.php><td><button type='submit' class='btn btn-danger' name='delete' value='$ic_id'>Delete</button></td></form>";
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

  $("#submit").click(function(){
    var title=$("#title").val();
    // var passwd=$("#passwd").val();
    // var desp=$("#desp").val();
    // var desp=$("#desp").val();
    var file=$("#file").val();
    // var cat=$("#cat").val();

    // var status = false;

    if(title=="" || file=="")
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

<!-- <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
