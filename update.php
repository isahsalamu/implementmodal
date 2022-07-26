 

<!-- 3rd connection -->
<?php
$connection = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connection, 'student');

//what happens if i click the button insertdata

if(isset($_POST['update_data']))
{
  $id = $_POST['update_id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $course = $_POST['course'];
  $contact = $_POST['contact'];


  $query = "UPDATE  stu_data  SET fname = '$fname' , lname='$lname', course='$course' , contact='$contact' WHERE ID= '$id' ";
  $query_run = mysqli_query($connection, $query);


//   if ($connection->query($query_run) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $query_run . "<br>" . $connection->error;
//   }
  

  if($query_run){
    echo '<script>alert("data updated"); </script>';
    header("Location: modal.php");
  }else{
    echo '<script>alert("data not updated"); </script>';
  }
}

?>