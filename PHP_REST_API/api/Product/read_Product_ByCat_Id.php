<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

//Instantiate DB & connect
$database = new Database();
$db=$database->connect();

//Intitate product object

$product=new Product($db);

 // Get ID
 $product->cid = isset($_GET['cid']) ? $_GET['cid'] : die();

 // Get post
 $result=$product->read_Product_by_category_Id();

  //get row count

  $num=$result->rowCount();

   
  if($num>0){
    //products array
    $products_arr=array();
    $products_arr['data']=array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
     extract($row);

     $product_item=array(
      'cid' =>$cid,
      'catname' =>$catname,
      'pid' => $pid,
       'description' =>$description,
       'service_descrip' =>$service_descrip,
       'price_original' =>$price_original,
       'price_discount' =>$price_discount ,
       'thickness' =>$thickness ,
       'width`' =>$width,
       'height' =>$height ,
       'image_present' => $image_present,
       'box' => $box
       
     );

     //push to Data
     array_push($products_arr['data'],$product_item);
}
//turn to jason and output
echo json_encode($products_arr);
   }else {
     echo json_encode(
       array('message'=>'No Products Found')
     );
   }