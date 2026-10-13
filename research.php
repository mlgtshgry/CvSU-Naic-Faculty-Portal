<?php
   
   session_start(); //starts the session
   if($_SESSION['username']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $username = $_SESSION['username']; //assigns username value
   $role = $_SESSION['role']; //assigns role value
   $department = $_SESSION['department']; //assigns department value
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="cvsu-logo.png">
    <meta name="description" content="CvSU Naic Faculty Portal">
    <meta name="keywords" content="CvSU, CvSU Naic, Cavite State University, Cavite College of Fisheries, CCF">
    <meta name="author" content="CvSU Naic MIS Office">   
    <title>Faculty Portal | Dashboard</title>
    <style>
        .img-logo{
            height: 25px;
        }

        .item {
            position: relative;
            cursor: pointer;
        }

        /* .item:hover {
            background-color: #275c21;
        } */

        .item a {
            color: #fff;
            font: 16px;
            text-decoration: none;
            display: block;
            padding: 1px 15px;
            line-height: 40px;
        }

        .item i {
            margin-right: 15px;
        }

        .item a .dropdown {
            position: absolute;
            right: 0;
            transition: 0.3s ease;
        }

        .item .sub-menu {
            background: var(--success);
            display: none;
            line-height: 30px;
            padding-left: 30px;
        }

        /* .item .sub-menu .sub-item:hover {
            background-color: #275c21;
            color: #fff;
        } */

        .rotate {
            transform: rotate(90deg);
        }
    </style>
  </head>
  <body>
    
    <!--- NAVBAR --->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!--- offcanvass trigger--->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!--- offcanvass trigger--->
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="home.php"><img src="./cvsu-logo.png" class="img-logo" alt="cvsu-logo"> FACULTY PORTAL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!--- SEARCH BAR
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            --->
            <!--- LOGOUT --->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout<i class="bi bi-box-arrow-right"></i></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!--- NAVBAR --->
    <!--- OFF CANVASS --->
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <!---
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                           CORE 
                        </div>
                    </li> --->
                    <li>
                        <a href="home.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-speedometer2 "></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider">
                    </li>
                    <!-- ACADEMICS -->
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                           Academic
                        </div>
                    </li>
                    <li>
                        <a href="subjectcode.php" class="nav-link px-3 ">
                            <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
                            <span>Check Enrolled Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="studentrecord.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-file-earmark-person"></i></span>
                            <span>Check Student Record</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <!-- HUMAN RESOURCE
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                           Human Resource 
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-person-badge"></i></span>
                            <span>Faculty Record</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-file-earmark-text"></i></span>
                            <span>Document Request</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                     -->
                    <!-- OTHERS -->
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                           OTHERS
                        </div>
                    </li>
                    <li>
                        <div class="item"><a class="sub-btn nav-link px-3"><i class='bi bi-download'></i>Download Forms
                                <!--dropdown-->
                                <!--dropdown arrow-->
                                <i class="bi bi-caret-right-fill dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="instruction.php" class="sub-item nav-link px-3">Curriculum and Instruction</a>
                                <a href="administrative.php" class="sub-item nav-link px-3" style="font-size: 11px">Administrative Support and Services</a>
                                <a href="research.php" class="sub-item nav-link px-3">Research and Extension</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book"></i></span>
                            <span>Library Services (Soon)</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <!-- ADMIN PANEL -->
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                           ADMIN PANEL
                        </div>
                    </li>
                    <li>
                        <?php
                        Print "<a href='#' onclick='myFunction(".$role.")' class='nav-link px-3'>";
                        Print "<span class='me-2'><i class='bi bi-people-fill'></i></span>";
                        Print "<span>User Management</span>";
                        Print "</a>"
                        ?>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <!--- OFF CANVASS --->
    <!--- MAIN BODY --->  
    <main class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Research and Extension</p>
                    
                    <?php  if($role == "3"){?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createnewfile" style="float: right"><i class="bi bi-plus-circle-fill"></i> &nbsp Add Document</button>
                    <?php }?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="container">
                    <div class="card" style="padding-top: 1%; padding-left: 1%; padding-bottom: 1%; padding-right: 1%;">
                        <table id="docu" class="table table-bordered">
                            <thead style="text-align: center;">
                                <tr>
                                <th style="width: 10%;">Document Id</th>
                                    <th style="width: 45%;">Document Name</th>
                                    <th style="width: 20%;">Department</th>
                                    <th style="width: 20%; text-align:center;">Downloadable Files</th>
                                    
                                    <?php
                                    if($role == "3"){
                                        echo '<th style="width: 20%;">Date</th>';
                                        echo '<th style="width: 20%;">Action</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <?php
                        // Include the database connection file
                        include 'dbconnection.php';

                        // Create a SQL query to select all records from the documents table
                        $sql = "SELECT * FROM documenttb WHERE office = 'Reseach and Extension'";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // If there are rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row of the result set
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output table rows with data from each row
                                    echo "<tr>";
                                    echo "<td>" . $i. "</td>";
                                    echo "<td>" . $row['doc_name'] . "</td>";
                                    echo "<td>" . $row['office'] . "</td>";
                                    
                                    echo "<td style='text-align: center;'>";

                                    // Check if the PDF link is not empty
                                    if (!empty($row['word'])) {
                                        echo "<a href='" . $row['word'] . "' target='_blank'><i class='bi bi-file-earmark-word-fill' style='color: blue; font-size: 22px'></i></a>";
                                    }

                                    // Check if the Excel link is not empty
                                    if (!empty($row['excel'])) {
                                        echo "<a href='" . $row['excel'] . "' target='_blank'><i class='bi bi-file-earmark-spreadsheet-fill' style='color: green; font-size: 22px'></i></a>";
                                    }

                                    // Check if the Download link is not empty
                                    if (!empty($row['pdf'])) {
                                        echo "<a href='" . $row['pdf'] . "' target='_blank'><i class='bi bi-file-earmark-arrow-down-fill' style='color: red; font-size: 22px'></i></a>";
                                    }

                                    echo "</td>";
                                    

                                    // echo "<td><a href='your_excel_url'><i class='bi bi-file-earmark-word-fill' style='color: blue;'></i></a></td>";
                                   
                                    if($role == "3"){
                                        echo "<td>" . $row['last_update'] . "</td>";
                                        echo "<td style='text-align: center;'> <a href='javascript:void(0)' onclick=\"populateUpdateModal('".$row['doc_id']."','" . $row['doc_name'] . "', '" . $row['office'] . "', '" . $row['department'] . "', '" . $row['excel'] . "', '" . $row['word'] . "', '" . $row['pdf'] . "')\"><i class='bi bi-pencil-square' style='color: blue; font-size: 22px'></i></a></td>";

                                    }
                                    echo "</tr>";
                                    $i++;
                                }
                            } else {
                                // No records found
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                        } else {
                            // Error executing the query
                            echo "<tr><td colspan='6'>Error: " . mysqli_error($conn) . "</td></tr>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="createnewfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Document</h1>
                    <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="save_document.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="temp" id="temp" class="form-control" value="3" style="display: none;">

                        <div class="mb-3">
                            <label class="col-form-label">Document Name</label>
                            <input type="text" name="doc_name" id="doc_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Office</label>
                            <select class="form-control" name="office" id="office" required>
                                <option value="" disabled selected>Select Office</option>
                                <option value="Administrative and Support Services">Administrative and Support Services</option>
                                <option value="Curriculum and Instruction">Curriculum and Instruction</option>
                                <option value="Reseach and Extension">Reseach and Extension</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Department</label>
                            <select class="form-control" name="department" id="department" required>
                                <option value="" disabled selected>Select Department</option>
                                <option value="FASD">FASD</option>
                                <option value="ITD">ITD</option>
                                <option value="MD">MD</option>
                                <option value="TED">TED</option>
                                <option value="Extension">Extension</option>
                                <option value="Reseach">Research</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="OVPAA">OVPAA</option>
                                <option value="Registrar">Registrar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Excel</label>
                            <input type="text" name="excel" id="excel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Word Document</label>
                            <input type="text" name="word" id="word" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">PDF</label>
                            <input type="text" name="pdf" id="pdf" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatefile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Document</h1>
                    <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="update_document.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="temp" id="temp" class="form-control" value="3" style="display: none;">
                    <input type="text" name="doc_id1" id="doc_id1" class="form-control" value="1" style="display: none;">

                        <div class="mb-3">
                            <label class="col-form-label">Document Name</label>
                            <input type="text" name="doc_name1" id="doc_name1" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Office</label>
                            <select class="form-control" name="office1" id="office1" required>
                                <option value="" disabled selected>Select Office</option>
                                <option value="Administrative and Support Services">Administrative and Support Services</option>
                                <option value="Curriculum and Instruction">Curriculum and Instruction</option>
                                <option value="Reseach and Extension">Reseach and Extension</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Department</label>
                            <select class="form-control" name="dept1" id="dept1" required>
                                <option value="" disabled selected>Select Department</option>
                                <option value="FASD">FASD</option>
                                <option value="ITD">ITD</option>
                                <option value="MD">MD</option>
                                <option value="TED">TED</option>
                                <option value="Extension">Extension</option>
                                <option value="Research">Research</option>
                                <option value="Human Resource Office">Human Resource Office</option>
                                <option value="OVPAA">OVPAA</option>
                                <option value="Registrar">Registrar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Excel</label>
                            <input type="text" name="excel1" id="excel1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Word Document</label>
                            <input type="text" name="word1" id="word1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">PDF</label>
                            <input type="text" name="pdf1" id="pdf1" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    

    
    <!-- MAIN BODY -->

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
        function myFunction(id){
            if(id == '3'){
                window.location.assign("usermanagement.php");
            } else {
                alert("You are not authorized to access this page!")
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#docu').DataTable();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sub-btn').click(function () {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        })
    </script>

<script>
        // Define the populateUpdateModal function outside of $(document).ready()
        function populateUpdateModal(doc_id,doc_name, office, department, excel, word, pdf) {
            // Set the values of the input fields in the modal
            $('#doc_id1').val(doc_id);
            $('#doc_name1').val(doc_name);
            $('#office1').val(office);
            $('#dept1').val(department);
            $('#excel1').val(excel);
            $('#word1').val(word);
            $('#pdf1').val(pdf);


            console.log(department);
            
            // Show the modal
            $('#updatefile').modal('show');
        }
        
    </script>
  </body>
</html>

