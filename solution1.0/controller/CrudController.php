<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/Database.php';
include_once '../models/crud.php';

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

// $_POST['action']=50;
// $_POST['id']=1;
if(isset($_POST['action'])) {
  $action=$_POST['action']; 
}else{ 
  $action=0; 
}

// create
// if ($action == 1) {
//   $error = $output = array();
//   if (empty($_POST['firstname'])) {
//     array_push($error, "First Name is Required");
//   }
//   if (empty($_POST['lastname'])) {
//     array_push($error, "Last Name is Required");
//   }
//   if (empty($_POST['email'])) {
//     array_push($error, "Email is Required");
//   }
//   if (empty($_POST['phone'])) {
//     array_push($error, "Phone is Required");
//   }
//   if (empty($_POST['address'])) {
//     array_push($error, "Address is Required");
//   }
//   if (empty($_POST['status']) || !is_numeric($_POST['status'])) { // checking if the status fiels is empty or is numeric
//     array_push($error, "Status is Required and must be an integer");
// } else {
//     $status = intval($_POST['status']); //converting the value to an integer using intval()
//     if ($status !== 0 && $status !== 1) {
//         array_push($error, "Invalid Status value. It should be either 0 or 1.");
//     }
// }
//   if (!is_numeric($_POST['phone']) || strlen($_POST['phone']) !== 11) {
//     array_push($error, "Phone must be exactly 11 digits in correct phone format");
//   }  


//   if (empty($error)) {
//     $crud->firstname = treat($_POST['firstname']);
//     $crud->lastname = treat($_POST['lastname']);
//     $crud->email = treat($_POST['email']);
//     $crud->phone = treat($_POST['phone']);
//     $crud->address = treat($_POST['address']);
//     $crud->status = treat($_POST['status']);

//     if ($crud->create()) {
//       $output['message'] = 'Saved Successfully';
//     } else {
//       $output['error'] = true;
//       $output['message'] = 'Error occurred during database insert';
//     }
//   } else {
//     $output['error'] = true;
//     $output['message'] = $error;
//   }
//   echo json_encode($output);
// }


// edit
if ($action == 2) {
  $error = $output = array();
  if (empty($_POST['id'])) {
    array_push($error, "ID is Required");
  }
  if (empty($_POST['firstname'])) {
    array_push($error, "First Name is Required");
  }
  if (empty($_POST['lastname'])) {
    array_push($error, "Last Name is Required");
  }
  if (empty($_POST['email'])) {
    array_push($error, "Email is Required");
  }
  if (empty($_POST['phone'])) {
    array_push($error, "Phone is Required");
  }
  if (empty($_POST['address'])) {
    array_push($error, "Address is Required");
  }
  if (empty($_POST['age'])) {
    array_push($error, "Age is Required");
  }
  if (empty($_POST['status']) || !is_numeric($_POST['status'])) {
    array_push($error, "Status is Required");
} else {
    $status = intval($_POST['status']);
    if ($status !== 0 && $status !== 1) {
        array_push($error, "Invalid Status value. It should be either 0 or 1.");
    }
}

  if (!is_numeric($_POST['phone']) || strlen($_POST['phone']) !== 11) {
    array_push($error, "Invalid phone format");
  }



  if (empty($error)) {
    $crud->id=treat($_POST['id']);
    $crud->firstname = treat($_POST['firstname']);
    $crud->lastname = treat($_POST['lastname']);
    $crud->email = treat($_POST['email']);
    $crud->phone = treat($_POST['phone']);
    $crud->address = treat($_POST['address']);
    $crud->age = treat($_POST['age']);
    $crud->status = treat($_POST['status']);
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

//fetch for chart
if ($action == 7) {
  $result = $crud->fetchAddressData();
  
  // Fetch the data
  $res_arr = $result->fetchAll(PDO::FETCH_ASSOC);

  // Prepare data for the chart
  $chartData = array(
    'labels' => array(),
    'data' => array()
  );

  foreach ($res_arr as $row) {
    $chartData['labels'][] = $row['address'];
    $chartData['data'][] = $row['average']; // Assuming you have a column named 'average' in your database
  }

  echo json_encode($chartData);
}



?>