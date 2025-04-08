<?php

include("config.php");
if(isset($_POST["add_students"])){
  $fname = $_POST["f_name"];
  $lname= $_POST["l_name"];
  $age= $_POST["age"];
}

if($fname==""|| $lname== ""|| $age== ""){
  header("location:index.php?message=You need to fill all the credentials!");
}
else{
  $query="INSERT INTO `students`(`first_name`, `last_name`, `age`) VALUES ('$fname','$lname','$age')";

  $result=mysqli_query($con,$query);

  if(!$result){
    die("Query Failed".mysqli_error($con));
  }
else{
  header("location:index.php?insert_msg=Your data has been added successfully!");
}

}
?>