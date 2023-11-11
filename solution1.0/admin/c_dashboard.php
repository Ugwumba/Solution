<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page
  header('Location: ../client/login.php');
  exit();
}

include_once '../inst.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB6Ulp3B39m7aUR_7AdoI7LhVvOnxq2Rl4fQ&usqp=CAU">
  <title>
    Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Welcome</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="c_dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
      <a class="btn bg-gradient-primary w-100" href="C_change_psw.php" type="button">Change Password</a>
        <a class="btn bg-gradient-primary w-100" href="c_logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <h5>
              <!-- <?php
                    if (isset($_SESSION['id'])) {
                      echo 'Welcome ' . $_SESSION['email'];
                    }
                    ?> -->
            </h5>
          </ol>
          <h6 class="font-weight-bolder mb-0">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php
                if (isset($_SESSION['id'])) {
                  if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                    echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                  }
                }
                ?>

              </h5>
            </div>
          </div>
        </div>
        <?php include '../pages/modals/c_profile.php'; ?>
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;" id="open-profile-edit-modal">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>

                    </div>
                  </div>
                </div>
                <div class="card" style="width: 100%; padding:10px;">
                  <p class="text-sm">
                    <?php
                    if (isset($_SESSION['id'])) {
                      if (!empty($_SESSION['about'])) {
                        echo $_SESSION['about'];
                      } else {
                        echo "<p style='color:red;'>No information found</p>";
                      }
                    }
                    ?>

                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                      <strong class="text-dark">Full Name:</strong> &nbsp;
                      <?php
                      if (isset($_SESSION['id'])) {
                        if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                          echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                        }
                      }
                      ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                      <strong class="text-dark">Mobile:</strong> &nbsp;
                      <?php
                      if (isset($_SESSION['id'])) {
                        echo $_SESSION['phone'];
                      }
                      ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                      <strong class="text-dark">Email:</strong> &nbsp;
                      <?php
                      if (isset($_SESSION['id'])) {
                        echo $_SESSION['email'];
                      }
                      ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                      <strong class="text-dark">Age:</strong> &nbsp;
                      <?php
                      if (isset($_SESSION['id'])) {
                        echo $_SESSION['age'];
                      }
                      ?>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                      <strong class="text-dark">Location:</strong> &nbsp;
                      <?php
                      if (isset($_SESSION['id'])) {
                        echo $_SESSION['address'];
                      }
                      ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../pages/js/profile.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script>
    document.getElementById('open-profile-edit-modal').addEventListener('click', function() {
      $('#profile-edit-modal').modal('show'); // Assuming you are using jQuery
    });
  </script>

</body>

</html>