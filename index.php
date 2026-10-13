<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CvSU Naic Faculty Portal">
    <meta name="keywords" content="CvSU, CvSU Naic, Cavite State University, Cavite College of Fisheries, CCF">
    <meta name="author" content="CvSU Naic MIS Office"> 

    <!-- Bootstrap CSS
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="cvsu-logo.png">
    <title>FACULTY PORTAL</title>
    <style>
        /* *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        } */
        .bg{
            background: green url("cvsu-naic-bg.png") no-repeat;
            width:100%;
            height:100%;
            background-size: cover;
        }
        /*
        .row{
            background: white;
            border-radius: 30px;
             box-shadow: 12px 12px 22px gray; 
            height: auto; 
        } */
        .img-logo{
            height: 50px;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
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
        a:link, a:visited {
        background-color: #ffcc00;
        color: green;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        width: 100%;
        border-radius: 4px;
        }
        a:hover, a:active {
        background-color: #FFE064;
        color: green;
        }
    </style> 

  </head>
  <body class="bg" style="font-family: Georgia, serif">
        <div class="container">
           <div class="row vh-100 align-items-center justify-content-center">
               <div class="col-lg-4 col-md-6 col-sm-8 text-center justify-content-center bg-white rounded p-4">
                    <img src="./cvsu-logo.png" class="img-logo mb-2" alt="cvsu-logo">
                    <h2 class="font-weight-bold py-2 op2">Cavite State University Naic - Portal</h2>
                    <h4 class="font-weight-bold py-2">Log in</h4>
                    <form action="checklogin.php" method="post">
                       <div class="form-row mb-4">
                            <input type="text" placeholder="Username" class="form-control my-2" name="username" required="required">
                       </div>
                       <div class="mb-4">
                            <input type="password" placeholder="Password"   class="form-control my-2" name="password" required="required">
                       </div>
                       <div class="mb-4">
                            <button type="submit" class="btn1 mt-2 mb-2">Login</button>
                       </div>
                       <div class="mb-4">
                            <a href="https://www.cvsu-naic.edu.ph/" target="_blank"><strong>Visit CvSU Naic Official Website</strong></a>
                       </div>
                       <!-- 
                       <p>Contact your Deparment Chairperson for the login credentials</p>
                       -->
                   </form>
               </div>
           </div>
       </div>

   
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
     -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
