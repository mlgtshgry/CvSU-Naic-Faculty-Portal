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
   
   include("dbconnection.php");
   
   $schedlocate=$_GET["schedcodevar"];
   $subjectlocate=$_GET["subjectcodevar"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="CvSU Naic Faculty Portal">
    <meta name="keywords" content="CvSU, CvSU Naic, Cavite State University, Cavite College of Fisheries, CCF">
    <meta name="author" content="CvSU Naic MIS Office"> 
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="cvsu-logo.png">
    <title>Faculty Portal | Student List</title>
    <style>
        .btn1{
            border: none;
            outline: none;
            height: 40px;
            width: 50%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn1:hover{
            background-color: white;
            color: black;
            border: 1px solid;
        }
        .img-logo{
            height: 25px;
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
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="home.php"><img src="./cvsu-logo.png" class="img-logo" alt="cvsu-logo"> PORTAL (LOCAL SERVER)</a>
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
                <a class="nav-link" href="logout.php">Logout <i class="bi bi-box-arrow-right"></i></a>
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
                        <a href="subjectcode.php" class="nav-link px-3 active">
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
                        <a href="download.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-file-earmark-arrow-down"></i></span>
                            <span>Download Forms</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book"></i></span>
                            <span>Library Services</span>
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
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Enrollment Information</p>
                </div>
            </div>
            <!--- DATA TABLE --->
            <div class="row">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="bi bi-table me-2"></i></span>List of Students
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <!--- FIRST TABLE --->
                                    <?php
                                            $result = mysqli_query($conn, "SELECT enrollscheduletbl.* FROM enrollscheduletbl where enrollscheduletbl.schedcode='" . $schedlocate . "'");
                                            echo "<table class='table table-success table-striped table-sm small'>";
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                            echo "<th class='col-lg-2 col-md-4 col-sm-5'>Schedule Code</th>";
                                                            echo "<th class='col-lg-10 col-md-8 col-sm-7'>" . $schedlocate . "</th>";
                                                        echo "</tr>";
                                                    echo "<tr>";
                                                        echo "<th>Subject Code</th>";
                                                        echo "<th>" . $row['subjectCode'] . "</th>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                        echo "<th>Subject Title</th>";
                                                        echo "<th>" . $subjectlocate . "</th>";
                                                    echo "</tr>";

                                                    echo "<tr>";
                                                        echo "<th>Units</th>";
                                                        echo "<th>" . ($row['units']+$row['labunits']) . "</th>";
                                                    echo "</tr>";

                                                    echo "<tr>";
                                                        echo "<th>Subject Type</th>";
                                                        echo "<th>" . $row['subjectype'] . "</th>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                        echo "<th>Section</th>";
                                                        echo "<th>" . $row['section'] . "</th>";
                                                    echo "</tr>";
                                                }
                                            echo "</table>";
                                        echo "</td>";
                                    # ========== SECOND TABLE ============
                                    echo "<table class='table table-success table-striped data-table table-sm small mydatatable' style='width: 100%'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Student Number</th>";
                                            echo "<th>Course</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        $x=1;
                                        $result = mysqli_query($conn, "SELECT enrollstudentinformation.studentNumber, enrollstudentinformation.firstName, enrollstudentinformation.course, enrollstudentinformation.lastName, enrollstudentinformation.middleName FROM enrollsubjectenrolled LEFT JOIN enrollstudentinformation ON  enrollstudentinformation.studentNumber=enrollsubjectenrolled.studentnumber where enrollsubjectenrolled.schedcode='" . $schedlocate . "' and enrollsubjectenrolled.status<>'DROPPED' order by enrollstudentinformation.lastName");
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td>" . $x . "</span></td>";
                                                echo "<td>" . $row['lastName'].",".$row['firstName']." &nbsp; ".substr($row['middleName'],0,1)."</td>";
                                                echo "<td>" . $row['studentNumber'] . "</td>";
                                                echo "<td>" . $row['course'] . "</td>";
                                        echo "</tr>";
                                        $x++;
                                        }
                                        echo "</tbody>";
                                        echo "<tfoot>";
                                        echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Student Number</th>";
                                            echo "<th>Course</th>";
                                        echo "</tr>";
                                        echo "</tfoot>";
                                    echo "</table>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <!--- DATA TABLE --->
        </div>
    </main>
    <!--- MAIN BODY --->
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script>
        function myFunction(id){
            if(id == '3'){
                window.location.assign("usermanagement.php");
            } else {
                alert("You are not authorized to access this page!")
            }
        }
        //Initialise the Data Table
        $('.mydatatable').DataTable({
             lengthMenu:[[-1],["All"]],
             paging: false,
             ordering: false,
             dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        });

    </script>
  </body>
</html>