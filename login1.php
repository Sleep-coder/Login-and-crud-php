<?php
include("config.php");
session_start();  // Start the session

if (isset($_POST["login"])) {
    $u_email = $_POST["useremail"];
    $u_password = md5($_POST["userpassword"]);

    // Check credentials
    $result = mysqli_query($con, "SELECT * FROM `tbluser` WHERE Email='$u_email' AND Password='$u_password'");
    if (mysqli_num_rows($result)) {
      
        $_SESSION['loggedin'] = true;

        
        echo "
        <script>
        alert('Login Success');
        window.location.href='../crud/index.php';  // Redirect to CRUD page
        </script>
        ";
    } else {
       
        echo "
        <script>
        alert('Incorrect Credentials');
        window.location.href='login.html';
        </script>
        ";
    }
}
?>