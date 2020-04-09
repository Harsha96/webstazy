<!DOCTYPE html>
<html>
<head>
<?php include ('include/header.php')?>
<?php  require('Connection/dbconnection.php'); ?>
<?php session_start();?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include ('include/navbar.php')?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <?php include ('include/leftsidebar.php')?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
          <a href="addproduct.php"><button  class="btn btn-success">Add New</button></a>
              <thead>
                  <tr>
                      <th style="width: 1%">
                          PID
                      </th>
                      <th style="width: 20%">
                          Cat ID
                      </th>
                      <th style="width: 30%">
                          Product Discription
                      </th>
                      <th>
                          Original Price
                      </th>
                      <th style="width: 8%" class="text-center">
                          Discount Price
                      </th>
                      <th style="width: 20%">
                          Box
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php

                         include('Connection/dbconnection.php');
                          $query=mysqli_query($conn,"select * from product ORDER BY pid asc")or die(mysql_error());
                          while($row=mysqli_fetch_array($query))
                          {
                            $pid      = $row['pid'];
                            $cid     = $row['cid'];
                            $pdes    = $row['description'];
                            $sdes      = $row['service_discrip'];
                            $price     = $row['price_original'];
                            $discount    = $row['price_discount'];
                            $thickness   = $row['thickness'];
                            $width    = $row['width'];
                            $hight      = $row['height'];
                            $imageurl    = $row['image_present'];
                            $boxed   = $row['box'];

                        ?>




                  <tr>
                      <td>
                        <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['pid'] ?></a>
                      </td>
                      <td>
                      <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['cid'] ?></a>
                      </td>
                      <td>
                            <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['description'] ?></a>
                      </td>
                      <td>
                        <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['price_original'] ?></a>

                      </td>
                      <td>
                        <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['price_discount'] ?></a>
                      </td>
                      <td>
                        <a href="view_product.php?pid=<?php echo $row["pid"]; ?>" title="Update"><?php echo $row['box'] ?></a>
                      </td>

                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete.php?pid=<?php echo $row["pid"]; ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                     <?php } ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
