<?php include("config.php"); ?>
<?php

if(isset($_GET["id"])){
  $id = $_GET["id"];
} 

$query="delete from `students` where `id`='$id'";

$result=mysqli_query($con,$query);

if(!$result){
  die("Query Failed".mysqli_error($con));
}

else{
  header("location:index.php?delete_msg=You have deleted the record!");
}


?>