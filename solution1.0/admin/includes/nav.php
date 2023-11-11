<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">
                        <small class="text-muted">Dashboard</small>
                    </h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group <input-group-outline">
                        <input type="hidden" class="form-control" id="role2" name="role2" readonly value="<?php echo $_SESSION['role'];?>" style="color: #d63384; background:transparent;">

                        </div>
                    </div>

                    <!-- Logout link -->
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <h6>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    echo 'Welcome ' . $_SESSION['username'];
                                }
                                ?>
                            </h6>
                        </li>

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
        