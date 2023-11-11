<?php


include_once '../inst.php';
include_once '../config/Database.php';
include_once '../models/m_admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$crud = new Crud($db);

//Cleansing Function
function treat($data){
  $data=trim($data);
  $data=strip_tags($data);
  $data=htmlspecialchars($data);
  return $data;
}


if(isset($_POST['action'])) {
  $action=$_POST['action']; 
}else{ 
  $action=0; 
}

// create
if ($action == 1) {
  $error = $output = array();
  if (empty($_POST['username'])) {
    array_push($error, "Username is Required");
  }
  if (empty($_POST['password'])) {
    array_push($error, "Password is Required");
  }
  if (empty($_POST['role'])) {
    array_push($error, "Role is Required");
  }



  if (empty($error)) {
    $crud->username = treat($_POST['username']);
    $crud->password = treat($_POST['password']);
    $crud->role = treat($_POST['role']);

    if ($crud->create()) {
      $output['message'] = 'Saved Successfully';
    } else {
      $output['error'] = true;
      $output['message'] = 'Error occurred during database insert';
    }
  } else {
    $output['error'] = true;
    $output['message'] = $error;
  }
  echo json_encode($output);
}


// edit
if ($action == 2) {
  $error = $output = array();
  if (empty($_POST['id'])) {
    array_push($error, "ID is Required");
  }
  if (empty($_POST['username'])) {
    array_push($error, "Username is Required");
  }

  if (empty($_POST['role'])) {
    array_push($error, "Role is Required");
  }



  if (empty($error)) {
    $crud->username = treat($_POST['username']);
    $crud->role = treat($_POST['role']);
    if ($crud->update()) {
      $output['message'] = 'Updated Successfully';
    } else {
      $output['error'] = true;
      $output['message'] = 'Error occurred during database update';
    }
  } else {
    $output['error'] = true;
    $output['message'] = $error;
  }
  echo json_encode($output);
}




//Delete
if($action==3){
  $error=$output=array();
  $crud->id=treat($_POST['id']);
  if($crud->delete()){
    $output['message'] = 'Deleted Successfully';
  }else{
    $output['error'] = true;
    $output['message'] = $db->$error;
  }
  echo json_encode($output);
}

//fetch
if ($action == 4) {
  $result = $crud->fetchItems();
  
  // Get row count
  $num = $result->rowCount();
  
  // Fetch the data
  $res_arr = $result->fetchAll(PDO::FETCH_ASSOC);

  $dataset = array(
      "echo" => 1,
      "totalrecords" => $num,  // Use $num for the row count
      "totaldisplayrecords" => $num,
      "data" => $res_arr
  );

  echo json_encode($dataset);
}

if ($action == 5) {
  $output = array(); // Initialize the response array

  $crud->id = treat($_POST['id']);
  $result = $crud->fetchItem_single();

  if ($result) {
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      // Assuming the 'status' field in the database is either 0 or 1, you can cast it to an integer
      $row['status'] = (int)$row['status'];

      echo json_encode($row);
    } else {
      // Handle the case where the data couldn't be fetched
      $output['error'] = true;
      $output['message'] = 'Client data not found.';
      echo json_encode($output);
    }
  } else {
    // Handle the case where there's an issue with the database query
    $output['error'] = true;
    $output['message'] = 'Error occurred during database query.';
    echo json_encode($output);
  }
}

// count $ display sub_admin
if ($action == 6) {
  $clientCount = $crud->countClients();
  echo json_encode(['clientCount' => $clientCount]);
  exit; // Terminate the script after sending the response
}



//fetch
if ($action == 8) {
  $result = $crud->fetchphone();
  
  // Get row count
  $num = $result->rowCount();
  
  // Fetch the data
  $res_arr = $result->fetchAll(PDO::FETCH_ASSOC);

  $dataset = array(
      "echo" => 1,
      "totalrecords" => $num,  // Use $num for the row count
      "totaldisplayrecords" => $num,
      "data" => $res_arr
  );

  echo json_encode($dataset);
}






?>