<?php
include "header.php";
?>
<style>
    .highlighted {
        background-color: #05ddfc; /* Change this to any color you want for highlighting */
    }
</style>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

    <?php
    include "top_nav.php";
    ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-flex justify-content-between my-3">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Customer Data</h1>
                    <form action="export.php" method="post">					
                                <button type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="btn btn-info">Export to CSV</button>
                    </form>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" cellspacing="0">
                                <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th style="width:10%;">Date</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th style="width:10%;">DOB</th>
                                        <th>Passport No.</th>
                                        <th>E-mail</th>
                                        <th>Mobile</td>
                                        <th>Profession</th>
                                        <th>Designation </th>
                                        <th>Organization</th>
                                        <th>Income</th>
                                        <th>Subsidy</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        include "db_conn.php";
                                        $fetchAllData = mysqli_query($conn,"SELECT * FROM form ORDER BY id DESC");
                                        $Sno = 1;

                                        while($row = mysqli_fetch_assoc($fetchAllData)){
                                            $date = $row['current'];
                                            $timestamp = strtotime($date);
                                            $formattedDate = date('d M y', $timestamp);

                                            $date_of_birth = $row ['dob'];
                                            $timestamp2 = strtotime($date_of_birth);
                                            $dob = date('d M Y', $timestamp2);

                                            // Check if the row is highlighted
                                            $highlightClass = $row['status'] == 'highlighted' ? 'highlighted' : '';
                                        ?>
                                            <tr id="row-<?= $row['id']; ?>" class="<?= $highlightClass; ?>">
                                                <td><?php echo $Sno++;?></td>
                                                <td style="width:10%;"><?php echo $formattedDate;?></td>
                                                <td><?php echo $row ['name'];?></td>
                                                <td><?php echo $row ['gender'];?></td>
                                                <td style="width:10%;"><?php echo $dob;?></td>
                                                <td><?php echo $row ['passport'];?></td>
                                                <td><?php echo $row ['email'];?></td>
                                                <td><?php echo $row ['mobile'];?></td>
                                                <td><?php echo $row ['profession'];?></td>
                                                <td><?php echo $row ['position'];?></td>
                                                <td><?php echo $row ['orginization'];?></td>
                                                <td><?php echo $row ['income'];?></td>
                                                <td><?php echo $row ['applying'];?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="invoice.php?id=<?= $row ['id'];?>" class="btn btn-outline-success mr-3"><i class="fa-solid fa-file-invoice"></i></a>
                                                        <a href="view.php?id=<?= $row ['id'];?>" class="btn btn-outline-success mr-3"><i class="fa-solid fa-eye"></i></a>
                                                        <button class="btn btn-outline-primary highlight-btn mr-3" data-id="<?= $row['id']; ?>"><i class="fa-solid fa-highlighter"></i></button>
                                                        <a href="delete.php?id=<?= $row ['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.highlight-btn').click(function() {
            var rowId = $(this).data('id');
            var button = $(this);
            
            // Send AJAX request to highlight.php
            $.ajax({
                url: 'highlight.php',
                type: 'POST',
                data: {id: rowId},
                success: function(response) {
                    if(response == 'success') {
                        // Highlight the row by adding the 'highlighted' class
                        $('#row-' + rowId).toggleClass('highlighted');
                    } else {
                        alert('Failed to update the status.');
                    }
                }
            });
        });
    });
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>