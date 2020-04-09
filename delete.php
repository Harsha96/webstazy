<?php
	include('Connection/dbconnection.php');


	$id=$_GET['pid'];
	$query = "DELETE FROM product WHERE pid=$id";
	$result = mysqli_query($conn,$query) or die ( mysqli_connect_error());
	
  if($result)
  {
    ?>
      <script>
          alert('Product Deleted successfully.');
          window.location.href='product.php';
      </script>
    <?php
  }

  else
  {
    ?>
      <script>
          alert('Invalid.');
          window.location.href='product.php';
      </script>
    <?php
  }

?>
