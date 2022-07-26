 

<!-- 3rd connection -->
<?php
$connection = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connection, 'student');

//what happens if i click the button insertdata

if(isset($_POST['insertdata']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $course = $_POST['course'];
  $contact = $_POST['contact'];


  $query = "INSERT INTO stu_data (`fname` , `lname`, `course` , `contact`) VALUES ('$fname', '$lname', '$course' , '$contact')";
  $query_run = mysqli_query($connection, $query);


  if ($connection->query($query_run) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query_run . "<br>" . $connection->error;
  }
  

  if($query_run){
    echo '<script>alert("data saved"); </script>';
    header('Location: modal.php');
  }else{
    echo '<script>alert("data not saved"); </script>';
  }
}

?>