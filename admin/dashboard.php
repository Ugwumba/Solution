<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}



include_once '../inst.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toast-css/1.1.0/grid.min.css" integrity="sha512-YOGZZn5CgXgAQSCsxTRmV67MmYIxppGYDz3hJWDZW4A/sSOweWFcynv324Y2lJvY5H5PL2xQJu4/e3YoRsnPeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toast-css/1.1.0/grid.min.css" integrity="sha512-YOGZZn5CgXgAQSCsxTRmV67MmYIxppGYDz3hJWDZW4A/sSOweWFcynv324Y2lJvY5H5PL2xQJu4/e3YoRsnPeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- jQuery from a CDN (version 3.5.1) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Popper.js from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <title>CRUD OPERATIONS</title>

</head>
<body>


    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <h3 class=" text-success">
                <?php
                if (isset($_SESSION['id'])) {
                    echo 'Welcome ' . $_SESSION['email'];
                }
                ?>
            </h3>
        </h4>
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <!-- Ajax Sourced Server-side -->
                <div class="card">
                    <h5 style="color:blueviolet !important;" class="card-header">
                        <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
                        <a data-bs-toggle="modal" data-bs-target="#add-modal" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Client</a>
                    </h5>
                    <div class="table-responsive">
                        <table id="crud-table" class="table-bordered table-responsive-sm table-dark">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:black !important;">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include '../pages/modals/crud.php'; ?>
    <?php include 'includes/footer.php'; ?>

    <!-- Datatables JavaScript from a CDN -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        loadlist();
    </script>

</body>

</html>