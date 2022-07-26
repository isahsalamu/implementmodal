<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $course = $_POST['course'];
  $contact = $_POST['contact'];



$sql = "INSERT INTO stu_data (fname, lname, course,contact )
VALUES ('$fname', '$lname', '$course', $contact)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
