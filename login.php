<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>


  <?php include ('include/header.php')?>

</head>


<body class="hold-transition login-page" >
<?php
  require('Connection/dbconnection.php');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];



  //Checking is user existing in the database or not
  $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
  $result = mysqli_query($conn,$query) or die( mysqli_connect_error());
  $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
?>

<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <button type="submit" class="btn btn-primary btn-block" value="Log in" >Sign In</button>

      </form>


      <!-- /.social-auth-links -->



    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<?php } ?>


  </body>
</html>
