<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'student');

if(isset($_POST['delete_data'])){
    $id = $_POST['delete_id'];  // the name not the form not the id, the id goes to javascript

    $querry = "DELETE FROM stu_data WHERE ID = '$id' ";
    $querry_run = mysqli_query($connection, $querry);

    if($querry_run){
        echo '<script> alert("Data deleted") </script>';
            header("Location: modal.php");
    }
    else{
        echo '<script>alert("Data not deleted")</script>';
    }
}

?>