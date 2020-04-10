<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'category';

    // Properties
    public $cid;
    public $main_sub_cat;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
      cid,
      main_sub_cat

      FROM
        ' . $this->table . '
      ORDER BY
        cid ASC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

  


  }
