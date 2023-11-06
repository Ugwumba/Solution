<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main"><br>
        <div style="padding:16px !important;" class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <img style="border-radius:50% !important;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR56rn6SPM8T2swfi_RHpSe1SWVBUMZDm9kd418KVsDq7RHyksHSEqT6mel1JQ845Erack&usqp=CAU" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Adminstrator</span>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="home.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'super_admin') {
                        echo '<li class="nav-item">
                                                                <a class="nav-link text-white    " href="admin-list.php">
                                                                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                                        <i class="material-icons opacity-10">table_view</i>
                                                                    </div>
                                                                    <span class="nav-link-text ms-1">Admins</span>
                                                                </a>
                                                            </li>';
                    } elseif ($_SESSION['role'] == 'sub_admin') {
                        echo '<li class="nav-item">
                                                                <a class="nav-link text-white " href="#">
                                                                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                                        <i class="material-icons opacity-10">table_view</i>
                                                                    </div>
                                                                    <span class="nav-link-text ms-1">Testing</span>
                                                                </a>
                                                            </li>';
                    }
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li> -->

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="logout.php" type="button">Logout</a>
            </div>
        </div>

    </aside>