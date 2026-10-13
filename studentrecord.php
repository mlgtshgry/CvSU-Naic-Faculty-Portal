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
    $studentnumber="";
   } else {
        $studentnumber=$_GET['studentnumber'];
        
        $result=mysqli_query($conn,"select course from enrollstudentinformation where studentnumber='".$studentnumber."'");
        if(mysqli_num_rows($result) > 0){ //If there are no returning rows or no existing username
            while($row = mysqli_fetch_array($result)){
                $studcourse=$row['course'];
            }
            if($role==1){
                if($department=="1" and ($studcourse=="BSF" or $studcourse=="BSFAS")){
                    $studentnumber=$_GET['studentnumber'];
                }  elseif($department=="2" and ($studcourse=="BSCS" or $studcourse=="BSIT")){
                    $studentnumber=$_GET['studentnumber']; 
                } elseif($department=="3" and ($studcourse=="BSBM" or $studcourse=="BSHRM" or $studcourse=="BSHM")){
                    $studentnumber=$_GET['studentnumber'];
                } elseif($department=="4" and ($studcourse=="BSED" or $studcourse=="BEED" or $studcourse=="TCP")){
                    $studentnumber=$_GET['studentnumber'];
                } else {
                    Print '<script>alert("Viewing of student record from other department is not allowed.");</script>'; // Prompts the user
                    $studentnumber="";
                }
            }
        } else{
            Print '<script>alert("Student number does not exist!");</script>'; // Prompts the user
            $studentnumber="";
        }

   }
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
    <title>Faculty Portal | Student Record</title>
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
                        <a href="studentrecord.php" class="nav-link px-3 active">
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
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Student Record</p>
                </div>
            </div>
            <form name="myForm" method="GET" action="studentrecord.php">
                <div class="row  justify-content-start">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Input Student Number</span>
                                <input type="text" name="studentnumber" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn1 mb-4">Load Student Record</button>
                        </div>
                </div>
            </form>
            <!--- DATA TABLE --->
            <div class="row">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="bi bi-person-square"></i></span> Student Information
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <!--- FIRST TABLE --->
                                    <?php
                                    $flag=0;
                                    if ($studentnumber!=""){    
                                        $result=mysqli_query($conn,"select * from enrollstudentinformation where studentnumber='".$studentnumber."'");
                                        echo "<table class='table table-success table-striped table-sm small'>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                    echo "<th class='col-lg-2 col-md-4 col-sm-5'>Student Number</th>";
                                                    echo "<th class='col-lg-10 col-md-8 col-sm-7'>" . $studentnumber . "</th>";
                                                echo "</tr>";
                                            echo "<tr>";
                                                echo "<th>Student Name</th>";
                                                echo "<th>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . " " . $row['suffix'] . "</th>";
                                            echo "</tr>";
                                            echo "<tr>";
                                                echo "<th>Course</th>";
                                                echo "<th>" . $row['course'] . "</th>";
                                            echo "</tr>";

                                            echo "<tr>";
                                                echo "<th>Gender</th>";
                                                echo "<th>" . $row['gender'] . "</th>";
                                            echo "</tr>";

                                            echo "<tr>";
                                                echo "<th>Address</th>";
                                                echo "<th>" . $row['barangay'] .  ", " . $row['municipality'] . ", " . $row['province'] ."</th>";
                                            echo "</tr>";
                                            echo "<tr>";
                                                echo "<th>Year Admitted</th>";
                                                echo "<th> AY " . $row['yearAdmitted'] . "</th>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                # END OF FIRST TABLE
                                # ============== SECOND TABLE PER SEM ================
                                if ($studentnumber!=""){

                                    echo "<div class='accordion accordion-flush' id='accordionFlushExample'>";
                                    $sql="SELECT DISTINCT semester AS sem, schoolyear AS sy FROM enrollgradestbl WHERE studentnumber = '".$studentnumber."' ORDER by id DESC";
                                    $rsgrades=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $xx=0;
                                    while($x=mysqli_fetch_array($rsgrades)){
                                        $sem=$x['sem'];
                                        $sy=$x['sy'];
                                    # START OF ACCORDION ITEM
                                    echo "
                                        <div class='accordion-item'>
                                            <h2 class='accordion-header' id='flush-heading$xx'>
                                            <button class='accordion-button collapsed bg-success text-white' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$xx' aria-expanded='false' aria-controls='flush-collapse$xx'>
                                                $sem $sy
                                            </button>
                                            </h2>
                                            <div id='flush-collapse$xx' class='accordion-collapse collapse' aria-labelledby='flush-heading$xx' data-bs-parent='#accordionFlushExample'>
                                            <div class='accordion-body'>";
                                    # INSIDE OF ACCORDION - GRADES TABLE        
                                    echo "<table class='table table-success table-striped data-table table-sm small mydatatable' style='width: 100%'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Subject Code</th>";
                                        echo "<th>Description</th>";
                                        echo "<th class='text-center'>Grades</th>";
                                        echo "<th class='text-center'>Completion</th>";
                                        echo "<th class='text-center'>Units</th>";
                                        echo "<th class='text-center'>Credit Units</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    if ($studentnumber!=""){
                                            $sql2="SELECT e.subjectcode AS sc, s.subjecttitle AS st, e.units AS unit, e.mygrade AS grade, e.makeupgrade AS gradex FROM enrollgradestbl e INNER JOIN enrollsubjectstbl s ON e.subjectcode = s.subjectcode WHERE e.studentnumber = '".$studentnumber."'AND e.semester = '".$sem."' AND e.schoolyear = '".$sy."' GROUP BY e.semester, e.schoolyear, e.subjectcode ORDER BY e.id;";
                                            $rsgrades2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                                            $xxx=0; 
                                            $rem = "";
                                            $sGrade=0; #for Satisfactory grade condition
                                            $tun=0; #total enrolled units
                                            $tunGPA=0; #total enrolled units for GPA
                                            $tcun=0; #total credit units
                                            $tungr=0; #grades * units
                                            $gpa=0; #GWA
                                            while($x=mysqli_fetch_array($rsgrades2)){
                                                $sc=$x['sc'];
                                                $st=$x['st'];
                                                $gr=$x['grade'];
                                                $grx=$x['gradex'];
                                                $un=$x['unit'];
                                                $prod=0;
                                                if ($gr=="4.00" or $gr=="5.00"){
                                                    if($grx=="-"){
                                                        $cun="0";
                                                        $prod = $un * (float)$gr; #grade * credit units 
                                                        $tunGPA = $tunGPA + $un; #getting total enrolled units for GPA
                                                    } else {
                                                        $cun=$un;
                                                        $prod = $un * (float)$grx; #gradeX * credit units 
                                                        $tunGPA = $tunGPA + $un; #getting total enrolled units for GPA
                                                    }
                                                } elseif ($gr=="INC"){ 
                                                    if($grx=="-"){
                                                        $cun="0";
                                                    } else {
                                                        if ($sc=="NSTP 1" or $sc=="NSTP 2"){
                                                            $cun=$un; 
                                                            $rem = "*";   
                                                        } else {
                                                            $cun=$un;
                                                            $tunGPA = $tunGPA + $un; #getting total enrolled units for GPA
                                                            $prod = $un * (float)$grx; #grade * credit units 
                                                            if ($grx=="S"){ 
                                                                $sGrade= $sGrade + $un;
                                                                $rem = "*";
                                                            }
                                                        }
                                                    }
                                                } elseif ($gr=="DRP" or $gr=="no gr" or $gr=="US"){ 
                                                        $cun="0";
                                                } else {
                                                    if ($sc=="NSTP 1" or $sc=="NSTP 2"){
                                                        $cun=$un; 
                                                        $rem = "*";   
                                                    } else {
                                                        $cun=$un;
                                                        $tunGPA = $tunGPA + $un; #getting total enrolled units for GPA
                                                        $prod = $un * (float)$gr; #grade * credit units 
                                                        if ($gr=="S"){ 
                                                            $sGrade= $sGrade + $un;
                                                            $rem = "*";
                                                        }
                                                    }
                                                }
                                            echo "
                                                <tr>
                                                    <td>$sc</td>
                                                    <td>$st</td>
                                                    <td class='text-center'><strong>$gr</strong></td>
                                                    <td class='text-center'><strong>$grx</strong></td>
                                                    <td class='text-center'>$un</td>
                                                    <td class='text-center'>$cun $rem</td>
                                                </tr>
                                                ";
                                                $tcun = $tcun + $cun; #getting total credit units
                                                $tun = $tun + $un; #getting total enrolled units
                                                $tungr = $tungr + $prod; #getting the total grades * credit units
                                                $rem = "";
                                                $xxx=$xxx+1; #while increment
                                            } #END OF WHILE STATEMENT

                                            $tunGPA = $tunGPA - $sGrade;
                                            if ($tunGPA != 0){
                                                $gpa = $tungr / $tunGPA; #getting the GPA
                                            } else {
                                                $gpa = 0;
                                            }
                                            echo "</tbody>";
                                            echo "<tfoot>";
                                            echo "<tr>";
                                                echo "<th colspan='3'> </th>";
                                                echo "<th class='text-center'>Total</th>";
                                                echo "<th class='text-center'>$tun</th>";
                                                echo "<th class='text-center'>$tcun</th>";
                                            echo "</tr>";
                                            echo "<tr>";
                                                echo "<th colspan='4'> </th>";
                                                echo "<th class='text-center'>Average ($tunGPA units)</th>";
                                                echo "<th class='text-center'>"; echo number_format($gpa,2,'.',''); echo"</th>";
                                            echo "</tr>";
                                            echo "</tfoot>";
                                        echo "</table>";
                                    }                                    
                                    
                                    # END GRADES TABLE
                                    echo "  </div>
                                            </div>
                                        </div>
                                        ";
                                        $xx=$xx+1;
                                    }
                                     # END OF ACCORDION ITEM
                                    echo "</div>";
                            } 
                                # ============== SECOND TABLE PER SEM ================                                 
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
        //Initialise the Data Table
        $('.mydatatable').DataTable({
             lengthMenu:[[-1],["All"]],
             paging: false,
             ordering: false,
             searching: false,
             info: false,
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

