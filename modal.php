<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- bootstrap requirement -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<!-- Button trigger modal -->


<!-- ########################Insert data  Modal #############################################-->
<div class="modal fade" id="Addstudentdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="insert.php" method="POST">

            <div class="modal-body">
                <div class="mb-3">
                <label  class="form-group">First name</label>  
                <input type="text" name="fname" class="form-control" placeholder="Enter first name:...">          
                </div>
                <div class="mb-3">
                <label class="form-label">Last name</label>.
                <input type="text" name="lname"class="form-control" placeholder="Enter last name:...">
                </div>
                <div class="mb-3 ">
                <label class="form-label">Course  </label>.
                <input type="text" name="course" class="form-control" placeholder="Enter student course:...">
                </div>
                <div class="mb-3 ">
                <label class="form-label">Phone number  </label>.
                <input type="number" name="contact" class="form-control" placeholder="Enter phone number:...">
                </div>
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- ######################## end of Insert data  Modal #############################################-->



<!-- #############################edit and update pop up############################  -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Data  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="update.php" method="POST">

            <div class="modal-body">
                <input type="hidden" id="update_id" name="update_id">
                <div class="mb-3">
                <label  class="form-group">First name</label>  
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name:...">          
                </div>
                <div class="mb-3">
                <label class="form-label">Last name</label>.
                <input type="text" name="lname" id="lname"class="form-control" placeholder="Enter last name:...">
                </div>
                <div class="mb-3 ">
                <label class="form-label">Course  </label>.
                <input type="text" name="course" id="course" class="form-control" placeholder="Enter student course:...">
                </div>
                <div class="mb-3 ">
                <label class="form-label">Phone number  </label>.
                <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter phone number:...">
                </div>
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- ###################################End of edit modal ########################## -->

<!-- ##############################delete modal###########################  -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Data  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="delete.php" method="POST">

            <div class="modal-body">
                <input type="hidden" id="delete_id" name="delete_id">
                <h4>Are you sure you want to delete this data?</h4>
                 
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO, cancle</button>
            <button type="submit" name="delete_data" class="btn btn-primary ">Yes, Delete</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- ###################################end of delete modal################################ -->




<!-- ###################################display data table################################ -->

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>PHP crud pop</h2>
              </div>

              <div class="card">
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addstudentdata">
                    Add data
                </button>
                </div>
            </div>

            <!-- the fetch table divi -->
            <div class="card">
              <div class="card-body">
                <h2>This is data from the database</h2>
                
                
                <?php 
                 $connection = mysqli_connect("localhost","root", "");
                  $db = mysqli_select_db($connection, 'student');             
                
                  $querry = "SELECT * FROM stu_data";

                  $querry_run = mysqli_query($connection, $querry);
                ?>

              <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Coures</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>


                      
                <?php 
                  if($querry_run){
                    foreach($querry_run as $row){

                   ?>
                      <tbody>
                        <tr>
                          <td><?php echo $row ['ID']?></td>
                          <td><?php echo $row ['fname']?></td>
                          <td><?php echo $row ['lname']?></td>
                          <td><?php echo $row ['course']?></td>
                          <td><?php echo $row ['contact']?></td>
                          <td> <button type="button" class="btn btn-success btnedit"  > Edit </button></td>
                          <td> <button type="button" class="btn btn-danger btndelete "  > Delete </button></td>

                          <!-- <td> <button type="button" class="btn btn-danger"> Delete </button></td> -->



                        </tr>
                         
                      </tbody>
                      <?php      
                    }
                  }
                  else{
                    echo "NO record found";
                  }
                ?>
                    </table>
              </div>
            </div>
        </div>
    </div>



 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->



<!-- Delete data from the database -->
<script>
  $(document).ready(function(){
    $('.btndelete').on('click',function(){
      $('#deletemodal').modal('show');

  $tr = $(this).closest('tr');
  
  var data = $tr.children("td").map(function(){
    return $(this).text();
  }).get();

  
  $('#delete_id').val(data[0]);
   
    });
  }); 

</script>



<!-- edit and update code -->
<script>
  $(document).ready(function(){
    $('.btnedit').on('click',function(){
      $('#editmodal').modal('show');

  $tr = $(this).closest('tr');
  
  var data = $tr.children("td").map(function(){
    return $(this).text();
  }).get();

  
  $('#update_id').val(data[0]);
  $('#fname').val(data[1]);
  $('#lname').val(data[2]);
  $('#course').val(data[3]); 
  $('#contact').val(data[4]);

    });
  }); 

</script>

</body>
</html>