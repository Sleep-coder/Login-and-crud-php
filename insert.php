<?php


include("config.php");
// if (isset($_POST["submit"])) {
//   // Debug the received POST data
//   echo "<pre>";
//   var_dump($_POST);
//   echo "</pre>";
//   die();  // Stop further execution to inspect the output
// }





if(isset($_POST["submit"])){
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $password = md5($_POST["password"]);
  
  
  $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";  
  $dup_email= mysqli_query($con,"SELECT * FROM `tbluser` WHERE Email='$email' ");
  
  
  if (!preg_match($pattern, $email)) {
      $errorMsg = "Invalid Email ID format";
      echo "<script>
              alert('$errorMsg');
              window.location.href='signup.html';
            </script>";
  } else {
      
      if (strlen($number) != 10) {
          $errorMsg = "Please provide a phone number of 10 digits!";
          echo "<script>
                  alert('$errorMsg');
                  window.location.href='signup.html';
                </script>";
      } else {
         
        
          if (!preg_match("/^[a-zA-Z0-9_]*$/", $name)) {
              $errorMsg = "Only alphabets, numbers, and underscores are allowed for User Name";
              echo "<script>
                      alert('$errorMsg');
                      window.location.href='signup.html';
                    </script>";
          } else {
              
              $dup_email = mysqli_query($con, "SELECT * FROM `tbluser` WHERE Email='$email'");
              if(mysqli_num_rows($dup_email)){
                  echo "
                  <script>
                    alert('This email is already taken');
                    window.location.href='signup.html';
                  </script>";  
              } else {
                  // Insert user data into the database
                  mysqli_query($con, "INSERT INTO `tbluser`(`Name`, `Email`, `Number`, `Password`) 
                                      VALUES ('$name', '$email', '$number', '$password')");
                  echo "
                  <script>
                    alert('Successfully Registered');
                    window.location.href='login.html';
                  </script>";
              }
          }
      }
  }
}


?>