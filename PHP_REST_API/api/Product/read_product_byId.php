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
  $product->pid = isset($_GET['pid']) ? $_GET['pid'] : die();

    // Get post
    $product->read_Product_by_ProId();

      // Create array
      $product_item=array(
        'pid' =>$product->pid,
        'description' =>$product->description,
        'service_descrip' =>$product->service_descrip,
        'price_original' =>$product->price_original,
        'price_discount' =>$product->price_discount ,
        'thickness' =>$product->thickness ,
        'width`' =>$product->width,
        'height' =>$product->height ,
        'image_present' =>$product->image_present,
        'box' =>$product->box,
        'cid' =>$product->cid
      );

       // Make JSON
  print_r(json_encode($product_item));
