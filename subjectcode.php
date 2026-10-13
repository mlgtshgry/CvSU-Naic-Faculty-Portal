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
   if(empty($_GET)){
        $currentAY = "2026-2027";
        $currentSem = "FIRST";
   }else{
        $currentAY=$_GET['academicyear'];
        $currentSem=$_GET['semester'];
   }
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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="cvsu-logo.png">
    <title>Faculty Portal | Enrollment Information</title>
    <style>
        .btn1{
            border: none;
            outline: none;
            height: 40px;
            width: 50%;
            background-color: green;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn1:hover{
            background-color: #ffcc00;
            color: green;
            border: 1px solid green;
        }
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
                            <span>Library Services (soon)</span>
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
                    <?php
                    if($currentSem!="SUMMER"){
                        Echo "<p class='lead'>Schedule AY: ".$currentAY." - ".$currentSem." Semester</p>";
                    }else{
                        Echo "<p class='lead'>Schedule AY: ".$currentAY." - ".$currentSem." </p>";
                    }
                    ?>
                    <hr>
                </div>
            </div>
            <form name="myForm" method="GET" action="subjectcode.php">
                <div class="row  justify-content-start">
                        <div class="col-lg-3">
                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="inputGroupSelect01">Academic Year</label>
                                    <select class="form-select" id="inputGroupSelect01" name="academicyear">
                                        <?php
                                        echo "<option>".$currentAY."</option>";
                                        $result = mysqli_query($conn,"SELECT distinct schoolyear FROM enrollscheduletbl order by schoolyear desc");
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option>".$row['schoolyear']."</option>";
                                        } 
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-3">
                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="inputGroupSelect01">Semester</label>
                                    <select class="form-select" id="inputGroupSelect01" name="semester">
                                        <?php
                                        Echo "<option>".$currentSem."</option>";	
                                        ?>
                                        <option>FIRST</option>
                                        <option>SECOND</option>
                                        <option>SUMMER</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn1 mb-4">Load Schedule</button>
                        </div>
                </div>
            </form>
        </div>
        <!--- DATA TABLE --->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span>List of Subject
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-success table-striped data-table mydatatable table-sm" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Title</th>
                                    <th>Section</th>
                                    <th>Subject Type</th>
                                    <th>Schedule Code</th>                       
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    //error_reporting (E_ALL ^ E_NOTICE);
                                    $result = mysqli_query($conn,"SELECT enrollscheduletbl.schedcode, enrollscheduletbl.section, enrollscheduletbl.subjectype, enrollscheduletbl.subjectCode, enrollsubjectstbl.subjectTitle, enrollsubjectstbl.subjectcode FROM enrollscheduletbl LEFT JOIN enrollsubjectstbl ON enrollsubjectstbl.subjectcode=enrollscheduletbl.subjectCode where semester='".$currentSem."' and schoolyear='".$currentAY."' order by enrollscheduletbl.subjectCode");
                                    /*
                                    if (!$check1_res) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                        exit();
                                    } */
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $sch ="";
                                            
                                        echo "<tr>";
                                        echo "<td>" . $row['subjectCode'] . "</td>";
                                        echo "<td>" . $row['subjectTitle'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        echo "<td>" . $row['subjectype'] . "</td>";
                                        echo "<td><a href='studentlist.php?schedcodevar=" . $row['schedcode'] . "&subjectcodevar=" . $row['subjectTitle'] . "'>" . $row['schedcode'] . "</a></td>";
                                        echo "</tr>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Title</th>
                                    <th>Section</th>
                                    <th>Subject Type</th>
                                    <th>Schedule Code</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- DATA TABLE --->
    </main>
    <!--- MAIN BODY --->

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <!--- SCRIPT FOR DATA TABLE --->
    <script>
        function myFunction(id){
            if(id == '3'){
                window.location.assign("usermanagement.php");
            } else {
                alert("You are not authorized to access this page!")
            }
        }
        $('.mydatatable').DataTable({
             pagingType: 'full_numbers',
             lengthMenu:[[20,50,100,-1],[20,50,100,"All"]],
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
  </body>
</html>