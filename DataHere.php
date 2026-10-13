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
                        <a href="download.php" class="nav-link px-3 active">
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
                    <p class="pb-2 mt-4 mb-2 border-bottom h2">Download Page</p>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <!---- NEW ACCORDION ---->
                    <div class="accordion" id="accordionExample">
                        <!---- ODCI ---->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-warning text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Curriculum and Instruction
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <strong>Per Program</strong>
                                <p>BS in Fisheries and Aquatic Science || Checklist (
                                    <a href="https://drive.google.com/file/d/1yNMtr4-LV07JauiCjJw4RNXIJwoWytsW/view?usp=sharing" class="link-success" target="_blank"> 
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1ZEr4qNodNn5vL96ZW5awb0ltcnshZvsY/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank"> 
                                        xls</a> ) ||
                                    <a href="https://docs.google.com/document/d/1k5ToKBeaJOY_2PpHhDq5CBpWCn6XVGR7/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>Bachelor of Elementary Education || Checklist (
                                    <a href="https://drive.google.com/file/d/17iVwzpmGiMNKXuQqKKSrgpheLwVauKwP/view?usp=sharing" class="link-success" target="_blank">
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1a7RPiwWPJjM-tH_CWijhqhYSGxD34SgT/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/10YWTOvDGONC90WPL8VQa0gYq54iHYCY9/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>Bachelor of Secondary Education || Checklist ( pdf 
                                    <a href="https://drive.google.com/file/d/1uxCma_-59t16o3lwvcyADmZVFQEDX8__/view?usp=sharing" class="link-success" target="_blank">
                                         English</a>, 
                                    <a href="https://drive.google.com/file/d/1tAGZDjnORqUPnrg_3E5E_Ml8vPlPJrsC/view?usp=sharing" class="link-success" target="_blank">
                                         Math</a>, 
                                    <a href="https://drive.google.com/file/d/1BTENKvJ5eY7V-x3YJJapfESXcAXntW_e/view?usp=sharing" class="link-success" target="_blank">
                                         Science</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1cHq9IpaxcfpRNhoUbsTjbOYwdTd7WBjb/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/1-H9X0iAdPdULsw4oqfdqfhhJ5TSTgHL0/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>BS in Hospitality Management || Checklist (
                                    <a href="https://drive.google.com/file/d/18lpOKfp7rnsEjLaTlm6Z6sCGdBHz-dWq/view?usp=sharing" class="link-success" target="_blank">
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1pJAZIAYNNRBpIjW-Qrv6_1rVvJ0dVsq2/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/1S2v8TUh4yoi-8tffEJK4NkyiQCigl8DN/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>BS in Business Management  || Checklist (
                                    <a href="https://drive.google.com/file/d/1E6p63dIMuHWr_v3jlVOo0f4Tq2BvL6eZ/view?usp=sharing" class="link-success" target="_blank">
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1caq3LpUizaFoSg2JECdoMycEWJ9wMao-/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/1W-QZCii3EqZjgmp3fe0_Hq2fiyQzvIi0/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>BS in Computer Science || Checklist (
                                    <a href="https://drive.google.com/file/d/17ybJW19rnrT-UkvXOBpmDMy7JlzkasQ5/view?usp=sharing" class="link-success" target="_blank">
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1t4chkf3K4KqHZ5d3wPXtw1m9AASKQ2bb/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/1YjYYoUHzd-nBOxfxL2Bl_A0Yo7VEfcNf/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>BS in Information Technology  || Checklist (
                                    <a href="https://drive.google.com/file/d/1ngFzhhPf3D4kYKRfyrMEbViKsi7aA5Qv/view?usp=sharing" class="link-success" target="_blank">
                                        pdf</a>, 
                                    <a href="https://docs.google.com/spreadsheets/d/1fg3HCUbMkPi5MOFI7dwKUm7kSCMDtDRZ/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        xls</a>  ) ||
                                    <a href="https://docs.google.com/document/d/1njagdMq5E2cnb-dmf4gsEc5JeZbBqQ02/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                        Course Syllabus Template</a>
                                </p>
                                <p>e-Class Record Template ||
                                    <a href="https://docs.google.com/spreadsheets/d/13M5b--yyxKnIF6fl-dLZnHp0JBpcbOff/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Non-Laboratory</a> || 
                                    <a href="https://docs.google.com/spreadsheets/d/1fIR9VUoVjXgmKvyTlN81r0jBf5XFpz9Q/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    With Laboratory</a>
                                </p>
                                <strong>From Registra's Office</strong>
                                <p><a href="https://docs.google.com/document/d/1mb93nKM5PbzgJsnNUtCddfUp1lM5cI3q/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Adding, Changing and Dropping Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/13fg12Up5o9qPQN0Go33SH0UcyM5q3daG/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Application for Graduation Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1l9xhr-rnzI7JgRWSbZpX3uQ6d5suD6Jv/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Completion Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1OCl54BeYKRIrSBcDBpuVNQp24mW2M1sW/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Letter of Intent (Shifting Form)</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1d6bsJglBUNTLpAynGffhEhAV0QldirGS/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Request For Withdrawal of Registration</a>
                                </p>
                                
                                <strong>From OVPAA</strong>
                                <p><a href="https://docs.google.com/document/d/1dlZba3IPt5BvWD4tH-Bv-varLCOdFFaC/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-01 Reading and Reference Material Writing Proposal Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1vNTjwqK5hR8An4UPQNtobIAdAWsb5Fkq/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-02   Book Writing Contract</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1cgxsKnPts9morbLRNdsWU2hT-CQGmioF/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-03  Module Evaluation Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1dlZba3IPt5BvWD4tH-Bv-varLCOdFFaC/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-04  Reference Book Evaluation  Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1ognYmkiWyAEGGE4U6J-CdhY0-VbXkqCe/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-05 Textbook Evaluation Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1k3hwK3Ew08brT2nnlFhqWbKR5YlP4Ucr/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QF-08   Novel Writing Evaluation Form</a>
                                </p>
                                <p><a href="https://docs.google.com/presentation/d/1mYOCDEezKHjsm1OE89X8e9QF7EL55ZqL/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    VPAA-QP-01 Procedure on the Review and Approval of Printed Instructional Materials</a>
                                </p> 
                                
                            </div>
                            </div>
                        </div>
                        <!---- ODASS ---->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Administrative and Support Services
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>From Human Resource Office</strong>
                                <p><a href="https://docs.google.com/spreadsheets/d/1eo-EQPlbfuXVTzOTWjO0ftfyqD7LEmJi/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Application for Leave - Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1I_OTsVVf-6W69oZH1TuuandZcFPkFYfW/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    CSC Form 48 - Daily Time Record</a>
                                </p>
                                <p><a href="https://docs.google.com/spreadsheets/d/1kDjXtRUjy4mQOQcRtRT4mrwfCzG9VPKN/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    CS Form No. 211 Revised 2018 Medical Certificate</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1qZJegTzIFbFnUKJrUx9O_z-ExB7rhDR-/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    CS Form No. 212 Attachment - Work   Experience Sheet</a>
                                </p>
                                <p><a href="https://docs.google.com/spreadsheets/d/1805D8kbBjkPnbjatYWdb4yadZhrWgbQH/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    CS Form No. 212 Personal Data Sheet revised</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1FSMK6fwgD5w5vkJGWcFNZDS2EkhZaluh/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    CS-Form-No.-32-Oath-of-Office-2021</a>
                                </p>
                                <p><a href="https://docs.google.com/spreadsheets/d/19fCkzYoMJnoU01z-IQLpgNs4McGICIU2/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    DBM-CSC-Form-No.-1-Position-Description-Forms</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1XGxat-KSZ8gKSN1H_6PpY_n-qaUA9yYd/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    HRDO-QF-23-Individual-Performance-Report</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1yWcotW0Wk8c_8JUjEhET-88-RDjiPPTE/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Request Employee to Report</a>
                                </p>
                                <p><a href="https://drive.google.com/file/d/1ZeQMI9WpHpANAd0IXW8eKdYgdcYEX8Bo/view?usp=sharing" class="link-success" target="_blank">
                                    Pag-Ibig MPL Application Form</a>
                                </p>
                            </div>
                            </div>
                        </div>
                        <!---- RDES ---->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed bg-warning text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Research and Extension
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!--- RESEARCH --->
                                <strong>From Research Office</strong>
                                <p><a href="https://docs.google.com/document/d/1GqsL_kLNk4X4eJGwHp7-6q8k2LdksSEU/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    UREC-QF-01-Research-Proposal-Program</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1H1bXUCHjifcbv26prm5Ah26zSN5LVnxE/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    UREC-QF-02-Research-Proposal-Project</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/19bAZWc7s7kXd5CogxCFcigsvgjK9dagv/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    UREC-QF-09-Progress-Report-Format</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1cnXTi6qUBa1TOvrk8hKkdGIGwfZcbkK5/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    UREC-QF-11-Terminal-Report-Format</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1Hn-k3tlJGSCMZlcJWrizGZfu4pTVQA4R/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    UREC-QF-12-Financial-Status-Report-Format</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1gaM_DBtSxlmEhnWyhp6pkE6v4uUeA7J8/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Accomplishment Report Research Unit</a>
                                </p>
                                <!--- EXTENSION --->
                                <strong>From Extension Office</strong>
                                <p><a href="https://docs.google.com/document/d/1q1tksulx9xNpUYzn3ZVY2cIqv70J3mkC/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Advisory Services Evaluation Form</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/11Bw3qNgAil8oghQljjBo7wPqQZF-7zW0/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Evaluation-Form-For-Livelihood-Training-and-Seminars</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1LiQ1hZ-MZAdP4ynW49ppouILA1RO9a9C/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Evaluation-Form-General-English</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1Wo8Kx6EdgvCR7DTh-Nn1BEtJXfLPgDLH/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Evaluation-Form-General-Tagalog</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/108RGG_rYtt2nVDi-syNsIUfNXOgnhaCJ/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Extension Attendance-Sheet</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1v0LqKAv_P5AQzMyZbeXj6x53-Bygji_k/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    Extension Training Report</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1KjqDEo52Ozp1h04Jo0gSebcqj1ZTefTX/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    EXTN-QF-01 Extension Project Proposal Format</a>
                                </p>
                                <p><a href="https://docs.google.com/document/d/1rNAXpslFqfEX-VojdnbNom3basdmgeNj/edit?usp=sharing&ouid=107926273374775493861&rtpof=true&sd=true" class="link-success" target="_blank">
                                    EXTN-QF-11 Training_Seminar Proceedings Format</a>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!---- END ACCORDION ---->
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
    <script>
        function myFunction(id){
            if(id == '3'){
                window.location.assign("usermanagement.php");
            } else {
                alert("You are not authorized to access this page!")
            }
        }
    </script>
  </body>
</html>

