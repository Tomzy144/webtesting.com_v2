<?php
ini_set('session.use_only_cookies', 1);
session_start();
session_regenerate_id();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
//header("Acces-Control-Allow-Origin: *");/// to call API and clear the error from the web-page//
?>
<?php
    // Database Configuration //
    $HOST_NAME = "localhost";
    $SERVER_USERNAME = "root";
    $SERVER_PASSWORD = "";
    $DATABASE_NAME="webtesting_db";

    // Create Connection To Database//
    $conn = mysqli_connect($HOST_NAME, $SERVER_USERNAME, $SERVER_PASSWORD) or die("connection error");
    mysqli_select_db($conn,$DATABASE_NAME);
?>


<?php 
$website_url= "http://localhost/webtesting.com"
//$website_url= "http://192.168.0.176/webtesting.com"
?>



<?php
// session variables//
    $s_staff_id=$_SESSION['staff_id']; 
?>






<?php
    // varaible declaration from staff registration login input //
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);



    // varaible declaration from staff registration input //
    $fullname=trim(strtoupper($_POST['fullname']));
    $email=trim($_POST['email']);
    $phonenumber=trim($_POST['phonenumber']);
    $status_id=trim($_POST['status_id']);
   

    // varaible declaration from reset password input //
    $otp=trim($_POST['otp']);
    $resetemail=trim($_POST['resetemail']);
    $createpassword=trim($_POST['createpassword']);
    $confirmpassword=trim($_POST['confirmpassword']);
    
?>






<?php include 'class.php';?>