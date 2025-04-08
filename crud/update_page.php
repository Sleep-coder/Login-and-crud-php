<?php include("config.php"); ?>

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
    <h1 class="heading">CRUD APPLICATION IN PHP</h1>

    <div class="container">
      <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      
        $query="select * from `students` where `id`='$id'";
        $result=mysqli_query($con,$query);    
        
        if(!$result){
          die( "Query Failed".mysqli_error($con));
        }
        else{
          $row=mysqli_fetch_assoc($result);
        
        }
      }


      ?>



      <?php
if(isset($_POST["update_students"])){
  if(isset($_GET["id_new"])){
  $id_new=$_GET["id_new"];
  }
  $fname=$_POST['f_name'];
  $lname=$_POST['l_name'];
  $age=$_POST['age'];

  $query="update `students` set `first_name`='$fname',`last_name`='$lname',`age`='$age' where `id`='$id_new'";
  $result=mysqli_query($con,$query);    
        
        if(!$result){
          die( "Query Failed".mysqli_error($con));
        }
        else{
          header("location:index.php?update_msg=You have successfully updated the data!");
        }
}
?>




      <form action="update_page.php?id_new=<?php echo $id;?>" method="post">
        <div class="form-group">
          <label for="f_name">First Name:</label>
          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']?>">
          <label for="" l_name>Last Name</label>
          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']?>">
          <label for="age">Age</label>
          <input type="text" name="age" class="form-control" value="<?php echo $row['age']?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
      </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>

</html>