<?php
	include('Connection/dbconnection.php');


	$id=$_GET['cid'];
	$query = "DELETE FROM category WHERE cid=$id";
	$result = mysqli_query($conn,$query) or die ( mysqli_connect_error());

  if($result)
  {
    ?>
      <script>
          alert('Category Deleted successfully.');
          window.location.href='cat.php';
      </script>
    <?php
  }

  else
  {
    ?>
      <script>
          alert('Invalid.');
          window.location.href='cat.php';
      </script>
    <?php
  }

?>
