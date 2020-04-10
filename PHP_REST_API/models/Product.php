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

     // Get product By category
     public function read_Product_by_category() {
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
                                  p.cid ASC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get product By Product Id
      public function read_Product_by_ProId() {
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
                                    WHERE
                                    p.pid = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

         // Bind ID
         $stmt->bindParam(1, $this->pid);

        // Execute query
        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        // Set properties
        $this->pid = $row['pid'];
        $this->cid = $row['cid'];
        $this->description = $row['description'];
        $this->service_descrip = $row['service_descrip'];
        $this->price_original = $row['price_original'];
        $this->price_discount = $row['price_discount'];
        $this->thickness = $row['thickness'];
        $this->width = $row['width'];
        $this->height = $row['height'];
        $this->image_present = $row['image_present'];
        $this->box = $row['box'];


        return $stmt;
      }

  }
