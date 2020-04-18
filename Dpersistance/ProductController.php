<!-- add -->
<?php
function addProduct($conn,$pid, $cid, $pdes,$sdes,$price, $discount, $thickness, $width, $hight , $imageurl,$boxed){

  // Let the DB autogenerate the id
  $sql = mysqli_query($conn,
  "INSERT INTO product (`pid`, `cid`, `description`, `service_discrip`, `price_original`, `price_discount`, `thickness`, `width`, `height`, `image_present`, `box`) VALUES ('$pid', '$cid', '$pdes','$sdes', '$price', '$discount', '$thickness', '$width', '$hight ', '$imageurl','$boxed');"

);
if($sql)
{
  ?>
  <script>
  alert('Product had been successfully added.');
  window.location.href='product.php?page=product_list';
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
}

?>

<!-- update -->
<?php
function updateProduct($conn,$pid, $cid, $pdes,$sdes,$price, $discount, $thickness, $width, $hight , $imageurl,$boxed){

  // Let the DB autogenerate the id
  $sql = mysqli_query($conn,"UPDATE `product` SET `description` = '$pdes', `service_discrip` = '$sdes', `price_original` = '$price',
    `price_discount` = '$discount', `thickness` = '$thickness', `width` = '$width', `height` = '$hight', `image_present` = '$imageurl', `box` = '$boxed' WHERE `product`.`pid` ='$pid';");

    if($sql)
    {
      ?>
      <script>
      alert('Product had been successfully Updated.');
      window.location.href='product.php?page=product_list';
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
  }

  ?>
  <!-- delte product -->
<?php
 function deleteproduct($conn,$id)
{

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

}


 ?>
 <!-- read -->
 <?php
 function Readproducts($conn)
 {
     $query=mysqli_query($conn,"select * from product ORDER BY pid asc")or die(mysql_error());



 }


  ?>
