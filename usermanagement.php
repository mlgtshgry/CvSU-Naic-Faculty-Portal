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
    <title>Faculty Portal | User Management</title>
    <style>
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
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
    <!--- DATABASE CONNECTIO --->
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
                        <a href="download.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-file-earmark-arrow-down"></i></span>
                            <span>Download Forms</span>
                        </a>
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
                        <a href="#" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-people-fill"></i></span>
                            <span>User Management</span>
                        </a>
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
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">User Management</p>
                </div>
            </div>
            <!--- NAV TAB ---> 
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="true">Add User</button>
                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">View List </button>
                    
                </div>
            </nav>
            <!--- NAV CONTENT --->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                    <div class="row">
                        <div class="col-lg-7 px-3 pt-3 ">
                            <form action="usermanagement.php" method="post">
                                <div class="form-row">
                                    <div class="col-lg-7">
                                        <label class="form-label">Username</label>
                                        <input type="text" placeholder="Username" class="form-control mb-4" name="username" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-7 " >
                                        <label class="form-label">Password</label>
                                        <input type="password" placeholder="********"   class="form-control mb-4" name="password" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-7 " >
                                        <label class="form-label">Role</label>
                                        <select class="form-select mb-4" aria-label="Default select example" name="role" required>
                                            <option value="">Open this select menu</option>
                                            <option value="1">Faculty</option>
                                            <option value="2">Official</option>
                                            <option value="3">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-7 " >
                                        <label class="form-label">Department</label>
                                        <select class="form-select mb-4" aria-label="Default select example" name="department" required>
                                            <option value="">Open this select menu</option>
                                            <option value="1">FASD</option>
                                            <option value="2">ITD</option>
                                            <option value="3">MD</option>
                                            <option value="4">TED</option>
                                            <option value="5">ASD</option>
                                            <option value="6">ADMIN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-7">
                                        <button type="submit" class="btn1 mt-2 mb-3">Add User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                    <div class="row">
                        <div class="col-lg-7 px-3 pt-3 ">    
                            <p class="h3">View Users</p>
                            <table class="table table-success table-striped table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                    
                                    $query = mysqli_query($conn, "Select * from usertbl"); //SQL Query
                                    while($row = mysqli_fetch_array($query)) //Display all the rows from query
                                    {
                                        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
                                        if($table_users!="superadmin"){
                                            Print "<tr>";
                                                Print "<td>".$row['username']."</td>";
                                                Print "<td><a href='#'>edit</a></td>";
                                                Print "<td><a href='#'>delete</a></td>";
                                            Print "</tr>";
                                        }
                                    }
                                ?>
                             </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
    <!--- MAIN BODY --->

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=mysqli_real_escape_string($conn, $_POST['username']);
        $password=mysqli_real_escape_string($conn, $_POST['password']);
        $role=mysqli_real_escape_string($conn, $_POST['role']);
        $department=mysqli_real_escape_string($conn, $_POST['department']);
        $bool=true;

        $result = mysqli_query($conn, "Select * from usertbl"); //Query the users table
    
        if (mysqli_num_rows($result) > 0){
            //Display all rows from query
            while($row=mysqli_fetch_assoc($result)){    
                //the first username row is passed on to $table_users, and so on until the query is finished
                $table_users=$row['username'];
                //checks if there are any matching fields    
                if($username==$table_users){   
                    //set bool to false
                    $bool=false; 
                    Print '<script>alert("Username is not available!");</script>'; //Prompt the user
                    Print '<script>window.location.assign("usermanagement.php");</script>'; //redirects to usermanagement.php
                    }
            }
        } else {
        echo "0 Results";
        }
    
        $sql = "INSERT INTO usertbl (username, password, role, department) VALUES ('$username','$password','$role','$department')";
        if($bool){
                mysqli_query($conn,$sql); //Insert the value to the table user_tbl
                Print '<script>alert("Successfully Registered");</script>'; //Prompt the user
                Print '<script>window.location.assign("usermanagement.php");</script>'; //redirects to usermanagement.php
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }
?>