<!DOCTYPE html>
<html>
<head>
<?php include ('../content/header.php');?>
<?php  include('../Connection/dbconnection.php') ;?>
<?php session_start();?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include ('../content/navbar.php')?>
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

      <?php include ('../content/leftsidebar.php')?>
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
            <h1>Product Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <?php   $id=$_GET['pid']; ?>
            <form class=""  name="form" action="#" method="post">


            <div class="card-body">
              <div class="form-group">
                <label for="inputName">product ID </label>
                <input type="text" name="pid"  class="form-control" required="required" value="<?php echo $id ?>"  disabled>
              </div>
              <div class="form-group">
                <label for="inputName">Category ID</label>
                <input type="text" name="cid" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="inputDescription">product Description</label>
                <textarea name="pdes" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Service Description</label>
                <textarea name="sdes" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Price</label>
                <input type="text" name="price" class="form-control"  required="required">
              </div>
              <div class="form-group">
                <label for="inputDescription">Discount Price</label>
                <input type="text" name="discount" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Thickness</label>
                <input type="text" name="thickness" class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputDescription">Width</label>
                <input type="text" name="width" class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputDescription">Hight</label>
                <input type="text" name="hight" class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputDescription">Upload image</label>
                <textarea name="imageurl" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">box</label>
                <input type="text" name="boxed" class="form-control">
              </div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="update" value="update" class="btn btn-success float-right">
        </div>
      </div>
          </form>
    </section>
    <!-- /.content -->
  </div>
  <?php require_once('../Dpersistance/ProductController.php'); ?>
  <?php


        if(isset($_POST['update']))
        {
          updateProduct($conn,$_POST['pid'], $_POST['cid'], $_POST['pdes'],$_POST['sdes'],$_POST['price'], $_POST['discount'] ,
          $_POST['thickness'], $_POST['width'], $_POST['hight'], $_POST['imageurl'], $_POST['boxed']);


        }
      ?>

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
  <?php include ('../content/footer.php')?>







</body>
</html>
