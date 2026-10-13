<?php
    session_start();
    
    include("dbconnection.php"); 

    if($_SERVER["REQUEST_METHOD"] == "POST"){  
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $bool=true;
    
    // Query the users table
    $query = mysqli_query($conn,"Select * from usertbl WHERE username='$username'"); 
    $table_users = "";
    $table_password = "";

    if(mysqli_num_rows($query) > 0) //If there are no returning rows or no existing username
    {
       while($row = mysqli_fetch_assoc($query)) // display all rows from query
       {
          $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
          $table_role = $row['role'];
          $table_department = $row['department'];
       }
       if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
       {
          if($password == $table_password)
          {
             $_SESSION['username'] = $username; //set the username in a session. This serves as a global variable
             $_SESSION['role'] = $table_role; //set the role in a session. This serves as a global variable
             $_SESSION['department'] = $table_department; //set the department in a session. This serves as a global variable
             header("location: home.php"); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
       }
    }
    else
    {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
    }
  }
?>
