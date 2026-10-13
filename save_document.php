<?php
// Include the dbconnection.php file to reuse the database connection
session_start();
include 'dbconnection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doc_name = $_POST["doc_name"];
    $office = $_POST["office"];
    $department = $_POST["department"];
    $excel = $_POST["excel"];
    $word = $_POST["word"];
    $pdf = $_POST["pdf"];
    $current_date = date("m-d-Y");
    $temp = $_POST['temp'];
    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO documenttb (doc_name, office, department, excel, word, pdf,last_update,log)
    VALUES ('$doc_name', '$office', '$department', '$excel', '$word', '$pdf', '$current_date', '" . $_SESSION['username'] . "')";


    // Check if the query executed successfully
    if ($conn->query($sql) === TRUE) {
        // Display success alert and reload the page
        if($temp == "1"){
            echo "<script>alert('New record created successfully'); window.location='administrative.php';</script>";
        }elseif($temp == "2"){
            echo "<script>alert('New record created successfully'); window.location='instruction.php';</script>";
        }elseif($temp == "3"){
            echo "<script>alert('New record created successfully'); window.location='research.php';</script>";
        }
    } else {
        // Display error alert and reload the page
        echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "'); </script>";
    }
    
    
}

// Close the database connection
$conn->close();
?>
