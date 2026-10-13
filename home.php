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
    <meta name="keywords" content="CvSU, CvSU Naic, Cavite State University, Cavite College of Fisheries, Faculty Portal">
    <meta name="author" content="CvSU Naic MIS Office">   
    <title>FACULTY PORTAL</title>
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
                        <a href="home.php" class="nav-link px-3 active">
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
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Welcome to <small>CvSU Naic Faculty Portal</small></p>
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Enrollment Status: <small>First Semester SY 2024-2025</small></p>
                    <!-- <p class="lead">This portal intend to help the faculty members of CvSU Naic. It compose of the following features: -->
                    </p>	
                    <hr>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-header">Academic</div>
                        <div class="card-body">
                            <h5 class="card-title">Check Enrolled Student</h5>
                            <p class="card-text">Faculty of CvSU Naic can view the official list of students per subject code. It can also view the students information like name, student number and course</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-header">Academic</div>
                        <div class="card-body">
                            <h5 class="card-title">Check Student Record</h5>
                            <p class="card-text">Faculty of CvSU Naic can view the students basic information and grades. It will help the class advisers to evaluate their class advisee during enrollment.</p>
                        </div>
                    </div>
                </div> -->
                <!--- HR SOON 
                <div class="col-md-3 mb-3">
                    <div style="background-color: #ffcc00" class="card text-dark h-100">
                        <div class="card-header">Human Resource</div>
                        <div class="card-body">
                            <h5 class="card-title">Human Resource Services </h5>
                            <p class="card-text">Faculty of CvSU Naic can view and update their records. Faculty can also request documents to the HR office like Certificate of Employment, Service Record and others.</p>
                        </div>
                    </div>
                </div>
                --->
                <!-- <div class="col-md-3 mb-3">
                    <div style="background-color: #ffcc00" class="card text-dark h-100">
                        <div class="card-header">Others</div>
                        <div class="card-body">
                            <h5 class="card-title">Download Form</h5>
                            <p class="card-text">Faculty of CvSU Naic can download forms from Registrar's Office, ODCI, ODASS and RDES
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->
                <div class="row">
                    <div class="col-6">
                        <div class="card" style="width: 100%;">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="width: 100;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 100%;">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div> -->
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
    </script>

    <script>
        $(document).ready(function () {
            $('.sub-btn').click(function () {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        })
    </script>

<?php
// Include database connection file
include 'dbconnection.php';

// Fetch data from the database
$sql = "SELECT * FROM enrollstudentenroll WHERE schoolyear = '2024-2025' AND semester = 'FIRST'";
$result = mysqli_query($conn, $sql);

// Check if data was fetched successfully
if (!$result) {
    die("Error retrieving data: " . mysqli_error($conn));
}

// Prepare data for chart
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'schoolyear' => $row['schoolyear'],
        'edate' => $row['edate'],
        'status' => $row['status'],
        'coursenow' => $row['coursenow']
    );
}

// Close database connection
mysqli_close($conn);

// Pass data to JavaScript
echo "<script>";
echo "console.log(" . json_encode($data) . ");"; // Debugging: Output data to browser console
echo "var chartData = " . json_encode($data) . ";";
echo "</script>";

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Count occurrences of BSIT and BSCS courses
var bsitCount = chartData.filter(item => item.coursenow === 'BSIT').length;
var bscsCount = chartData.filter(item => item.coursenow === 'BSCS').length;

// Create chart using data from PHP
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Number of Student per Course'],
        datasets: [{
            label: 'BSIT',
            data: [bsitCount], // BSIT count
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color for BSIT
            borderColor: 'rgba(255, 99, 132, 1)', // Border color for BSIT
            borderWidth: 1
        },
        {
            label: 'BSCS',
            data: [bscsCount], // BSCS count
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color for BSCS
            borderColor: 'rgba(54, 162, 235, 1)', // Border color for BSCS
            borderWidth: 1
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                onClick: function(event, legendItem) {
                    var index = legendItem.datasetIndex;
                    var chart = this.chart;
                    var meta = chart.getDatasetMeta(index);
                    meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                    chart.update();
                }
            }
        }
    }
});
</script>


<script>
// Count occurrences of BSIT and BSCS courses
var itdCount = chartData.filter(item => item.coursenow === 'BSCS').length + chartData.filter(item => item.coursenow === 'BSIT').length;

var tedCount = chartData.filter(item => item.coursenow === 'BEED').length + chartData.filter(item => item.coursenow === 'BSED').length;

var fasdCount = chartData.filter(item => item.coursenow === 'BSFAS').length;

var mdCount = chartData.filter(item => item.coursenow === 'BSBM').length + chartData.filter(item => item.coursenow === 'BSHM').length+ chartData.filter(item => item.coursenow === 'BSBA').length;

var tcpCount = chartData.filter(item => item.coursenow === 'TCP').length;
// Create chart using data from PHP
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Number of Student Per Department'],
        datasets: [{
            label: 'ITD',
            data: [itdCount], // BSIT count
            backgroundColor: 'rgba(255, 95, 0, 0.3)', // Orange background color for the line
            borderColor: 'rgba(255, 105, 0, 1)',
            borderWidth: 1
        },
        {
            label: 'TED',
            data: [tedCount], // BSCS count
            backgroundColor: 'rgba(54, 162, 235, 0.3)', // Background color for BSCS
            borderColor: 'rgba(54, 162, 235, 1)', // Border color for BSCS
            borderWidth: 1
        },
        {
            label: 'FASD',
            data: [fasdCount], // BSCS count
            backgroundColor: 'rgba(54, 54, 235, 0.3)', // Background color for BSCS
            borderColor: 'rgba(54, 54, 235, 1)', // Border color for BSCS
            borderWidth: 1
        },
        {
            label: 'MD',
            data: [mdCount], // BSCS count
            backgroundColor: 'rgba(255, 200, 0, 0.3)', // Background color for BSCS
            borderColor: 'rgba(255, 100, 0, 0.3)', // Border color for BSCS
            borderWidth: 2
        },
        {
            label: 'TCP',
            data: [tcpCount], // BSCS count
            backgroundColor: 'rgba(255, 0, 0, 0.3)', // Red background color for the line
            borderColor: 'rgba(255, 0, 0, 1)',  // Border color for BSCS
            borderWidth: 1
        }
    ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                onClick: function(event, legendItem) {
                    var index = legendItem.datasetIndex;
                    var chart = this.chart;
                    var meta = chart.getDatasetMeta(index);
                    meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                    chart.update();
                }
            }
        }
    }
});
</script>




<script>
// Count occurrences of BSIT and BSCS courses
var itdCount = chartData.filter(item => item.coursenow === 'BSCS').length + chartData.filter(item => item.coursenow === 'BSIT').length;

var tedCount = chartData.filter(item => item.coursenow === 'BEED').length + chartData.filter(item => item.coursenow === 'BSED').length;

var fasdCount = chartData.filter(item => item.coursenow === 'BSFAS').length;

var mdCount = chartData.filter(item => item.coursenow === 'BSBM').length + chartData.filter(item => item.coursenow === 'BSHM').length+ chartData.filter(item => item.coursenow === 'BSBA').length;

var tcpCount = chartData.filter(item => item.coursenow === 'TCP').length;
// Create chart using data from PHP
// Create chart using data from PHP
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['ITD', 'TED', 'FASD', 'MD', 'TCP'], // Labels for the departments
        datasets: [{
            label: 'Number of Students (ITD, TED, FASD, MD)',
            data: [itdCount, tedCount, fasdCount, mdCount], // Data for ITD, TED, FASD, MD
            yAxisID: 'left-y-axis', // Assign to the left y-axis
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color for the line
            borderColor: 'rgba(255, 99, 132, 1)', // Border color for the line
            borderWidth: 1
        },
        {
            label: 'Number of Students (TCP)',
            data: [tcpCount], // Data for TCP
            yAxisID: 'right-y-axis', // Assign to the right y-axis
            backgroundColor: 'rgba(54, 200, 235, 0.2)', // Background color for the line
            borderColor: 'rgba(54, 200, 235, 1)', // Border color for the line
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
            left: {
                position: 'left', // Position the left y-axis
                type: 'linear', // Use linear scale
                display: true,
                id: 'left-y-axis', // ID for the left y-axis
                grid: {
                    display: true
                },
            },
            right: {
                position: 'right', // Position the right y-axis
                type: 'linear', // Use linear scale
                display: true,
                id: 'right-y-axis', // ID for the right y-axis
                grid: {
                    display: false
                },
                // Add any additional configuration for the right y-axis here
            }
        },
        plugins: {
            legend: {
                onClick: function(event, legendItem) {
                    var index = legendItem.datasetIndex;
                    var chart = this.chart;
                    var meta = chart.getDatasetMeta(index);
                    meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                    chart.update();
                }
            }
        }
    }
});

</script>


  </body>
</html>

