<?php
  class Product {
    // DB stuff
    private $conn;
    private $table = 'product';

    // Product Properties
    public $pid;
    public $cid;
    public $description;
    public $service_descrip;
    public $price_original;
    public $price_discount;
    public $thickness;
    public $width;
    public $height;
    public $image_present;
    public $box;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get product
    public function read() {
      // Create query
      $query = 'SELECT
       c.main_sub_cat as subcat,
       p.pid,
              p.cid,
              p.description,
              p.service_descrip,
              p.price_original,
              p.price_discount,
              p.thickness,
              p.width,
              p.height,
              p.image_present,
              p.box

                                FROM ' . $this->table . ' p
                                LEFT JOIN
                                  category c ON p.cid = c.cid
                                ORDER BY
                                  p.pid ASC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

  }
