<div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Admins</h6>
                                </div>
                                <div class="col-lg-6 col-5 my-auto text-end">
                                    <h5 style="color:blueviolet !important;" class="card-header">
                                        <?php
                                        if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
                                            if ($_SESSION['role'] == 'super_admin') {
                                                echo '<a data-bs-toggle="modal" data-bs-target="#add-modal" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Admin</a>';
                                            } elseif ($_SESSION['role'] == 'sub_admin') {
                                                echo " ";
                                            }
                                        }
                                        ?>


                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php include '../pages/modals/m_admin-list.php'; ?>
                        <div class="card-body px-0 pb-2">
                            <div style="border-radius: 10px;" class="table-responsive">
                                <table style="background-color:rgb(236,52,116);" id="crud-table" class="table table-bordered align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase ">Id</th>
                                            <th class="text-uppercase ">Username</th>
                                            <th class="text-uppercase ">Role</th>
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
            </div>
            <!-- <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                CRUD OPERATIONS
                            </div>
                        </div>

                    </div>
                </div>
            </footer> -->
        </div>