<?php
// Include the database connection file
session_start();
include 'dbconnection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doc_id = $_POST['doc_id1'];
    $doc_name = $_POST['doc_name1'];
    $office = $_POST['office1'];
    $department = $_POST['dept1'];
    $excel = $_POST['excel1'];
    $word = $_POST['word1'];
    $pdf = $_POST['pdf1'];

    $temp = $_POST['temp'];
    // Perform input validation here if needed

    // Prepare SQL statement to update the record
    $sql = "UPDATE documenttb SET doc_name='$doc_name', office='$office', department='$department', excel='$excel', word='$word', pdf='$pdf', log='" . $_SESSION['username'] . "' WHERE doc_id='$doc_id'";


    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Record updated successfully
        if($temp == "1"){
            echo "<script>alert('Update successfully'); window.location='administrative.php';</script>";
        }elseif($temp == "2"){
            echo "<script>alert('Update successfully'); window.location='instruction.php';</script>";
        }elseif($temp == "3"){
            echo "<script>alert('Update successfully'); window.location='research.php';</script>";
        }
    } else {
        // Error updating record
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
