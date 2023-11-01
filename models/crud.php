<?php 
  class Crud {
    // DB stuff
    private $conn;
    private $table = 'clients';

    // Post Properties
    public $id, $firstname, $lastname, $email, $phone, $address, $status, $created_at;
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    //Get
    public function fetchItems($id = null) {
      // Create SQL statement
      if (is_null($id)) {
          $sql = "SELECT * FROM clients ORDER BY created_at DESC";
      } else {
          $sql = "SELECT * FROM clients WHERE id = ? ORDER BY created_at DESC";
      }
      
      // execute statement
      $query = $this->conn->prepare($sql);
      $query->execute();
      return $query;
  }
  
  public function countItems() {
    // Create statement
    $sql = "SELECT count(id) FROM $this->table";
    // Execute statement
    $query = $this->conn->prepare($sql);
    $query->execute();
    return $query;
  }

    // Get Single 
    public function fetchItem_single() {
      $query = "SELECT id, firstname, lastname, email, phone, address, status FROM $this->table WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $this->id);
      $stmt->execute();
      return $stmt;
  }
  

   // Create 
public function create() {
  // Create statement
  $sql = "INSERT INTO $this->table SET  firstname = ?, lastname=?, email=?, phone = ?, address = ? , status = ?";
  
  // Execute query
  $query = $this->conn->prepare($sql);
  if ($query->execute([$this->firstname, $this->lastname, $this->email, $this->phone, $this->address, $this->status])) {
    return true;
  } else {
    // Print error if something goes wrong
    $errorInfo = $query->errorInfo();
    printf("Error: %s. SQLSTATE: %s.\n", $errorInfo[2], $errorInfo[0]);
  }
  return false;
}

  // Update 
public function update() {
  // Create statement
  $sql = "UPDATE $this->table SET firstname = ?, lastname=?, email=?, phone = ?, address = ?, status = ? WHERE id = ?";
  
  // Execute query
  $query = $this->conn->prepare($sql);
  if ($query->execute([$this->firstname, $this->lastname, $this->email, $this->phone, $this->address, $this->status, $this->id])) {
    return true;
  } else {
    // Print error if something goes wrong
    $errorInfo = $query->errorInfo();
    printf("Error: %s. SQLSTATE: %s.\n", $errorInfo[2], $errorInfo[0]);
  }
  return false;
}


  // Delete 
public function delete() {
  // Create query to delete the row
  $sql = "DELETE FROM $this->table WHERE id = ?";
  
  // Execute statement
  $query = $this->conn->prepare($sql);
  
  // Execute query with the ID parameter
  if ($query->execute([$this->id])) {
    return true;
  } else {
    // Print error if something goes wrong
    $errorInfo = $query->errorInfo();
    printf("Error: %s. SQLSTATE: %s.\n", $errorInfo[2], $errorInfo[0]);
  }
  return false;
}

  
  }