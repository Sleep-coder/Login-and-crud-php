<?php include("config.php"); ?>
<?php
session_start();  // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: ../website/login.html");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
  </head>

  <body>

    <h1 class="heading">CRUD APPLICATION IN PHP <span><a href="../website/logout.php"
          class="btn btn-danger logout-btn logout">Logout</a></span></h1>


    <div class="container">
      <div class="box1">
        <h2>ALL STUDENTS</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD
          STUDENTS</button>
      </div>
      <table class='table table-hover table-bordered table-striped'>
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query="select * from `students`";
          $result=mysqli_query($con,$query);    
          
          if(!$result){
            die( "Query Failed".mysqli_error($con));
          }
          else{
            while($row=mysqli_fetch_assoc($result)){
          
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
          </tr>
          <?php
          }
          }
?>


        </tbody>

      </table>

      <?php
      if(isset($_GET['message'])){
      echo"<h6>".$_GET['message']."</h6>";
      }

      if(isset($_GET['insert_msg'])){
        echo"<h6 style='color:green'>".$_GET['insert_msg']."</h6>";
        }
      
      if(isset($_GET['update_msg'])){
          echo"<h6 style='color:green'>".$_GET['update_msg']."</h6>";
          }

      if(isset($_GET['delete_msg'])){
            echo"<h6 style='color:green'>".$_GET['delete_msg']."</h6>";
            }
     ?>





      <form action="insert_data.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="f_name" class="form-control">
                  <label>Last Name</label>
                  <input type="text" name="l_name" class="form-control">
                  <label>Age</label>
                  <input type="text" name="age" class="form-control">
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="add_students" value="ADD">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>

</html>