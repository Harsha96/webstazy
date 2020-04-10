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

$result=$product->read();
  //get row count

  $num=$result->rowCount();

  //check if any products

  if($num>0){
    //products array
    $products_arr=array();
    $products_arr['data']=array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
     extract($row);

     $product_item=array(
       'pid' => $pid,
       'description' =>$description,
       'service_descrip' =>$service_descrip,
       'price_original' =>$price_original,
       'price_discount' =>$price_discount ,
       'thickness' =>$thickness ,
       'width`' =>$width,
       'height' =>$height ,
       'image_present' => $image_present,
       'box' => $box,
       'cid' =>$cid
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
















 ?>
