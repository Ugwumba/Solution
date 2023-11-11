<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Clients</p>
                        <h4 class="mb-0" id="clientCount">0</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Users</p>
                        <h4 class="mb-0" id="subadminCount">0</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Super_Admin</p>
                        <h4 class="mb-0">1</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
    </div><br>
        <div style="width:70% !important;" class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div style="padding:16px !important; background-color:#d63384 !important;" class="shadow-primary border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="stateChartCard">
                    <h6 class="mb-0">State Chart</h6>
                    <p class="text-sm">Average Age of States</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div>
                </div>
            </div>
        </div>
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Clients</h6>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include '../pages/modals/crud.php'; ?>
                <div class="card-body px-0 pb-2">
                    <div style="border-radius: 10px;" class="table-responsive">
                        <table style="background-color:rgb(236,52,116);" id="crud-table" class="table table-bordered align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase ">Id</th>
                                    <th class="text-uppercase ">First Name</th>
                                    <th class="text-uppercase ">Last Name</th>
                                    <th class="text-center text-uppercase">Email</th>
                                    <th class="text-center text-uppercase">Phone</th>
                                    <th class="text-center text-uppercase">State</th>
                                    <th class="text-center text-uppercase">Age</th>
                                    <th class="text-center text-uppercase">Status</th>
                                    <th class="text-center text-uppercase">Created_at</th>
                                    <th class="text-center text-uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:#1a1a1a !important;">
                                <!-- Your table rows go here -->

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h">
                <div class="card-header pb-0">
                    <h6>CLIENTS/<small>with the same phone number</small></h6>
                </div>
                <div class="card-body p-3">
                    <div style="border-radius: 10px;" class="table-responsive">
                        <table style="background-color:rgb(236,52,116);" id="phone-table" class="table table-bordered align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase">Id</th>
                                    <th class="text-uppercase ">First Name</th>
                                    <th class="text-center text-uppercase">Phone</th>



                                </tr>
                            </thead>
                            <tbody style="color:#1a1a1a !important;">
                                <!-- Your table rows go here -->
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>