<!-- add -->
<?php
function addcat($conn,$cid,$main_sub_cat){

  // Let the DB autogenerate the id
  $sql = mysqli_query($conn,
  "INSERT INTO `category` (`cid`, `main_sub_cat`) VALUES ('$cid', '$main_sub_cat');"
 );


   if($sql)
   {
     ?>
       <script>
           alert('Categorey has been successfully added.');
           window.location.href='cat.php?page=product_list';
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
 }
 ?>

<!-- update -->
<?php
function updatecat($conn,$main_sub_cat, $cid){

  // Let the DB autogenerate the id
  $sql = mysqli_query($conn,"UPDATE `category` SET `main_sub_cat` = '$main_sub_cat' WHERE `category`.`cid` ='$cid';");

if($sql)
{
  ?>
    <script>
        alert('category had been successfully Updated.');
        window.location.href='cat.php?page=product_list';
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
}
?>
  <!-- delte product -->
<?php
function deletecat($conn,$id)
{

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
}
 ?>
 <!-- read -->
 <?php
 function Readcat($conn)
 {
     $query=mysqli_query($conn,"select * from category ORDER BY pid asc")or die(mysql_error());



 }
  ?>
