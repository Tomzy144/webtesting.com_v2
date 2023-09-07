<?php
ini_set('session.use_only_cookies', 1);
session_start();
session_regenerate_id();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
//header("Acces-Control-Allow-Origin: *");/// to call API and clear the error from the web-page//
?>

<?php 
//$website_url= "http://localhost/webtesting.com_v2"
$website_url= "http://192.168.0.176/webtesting.com_v2"
?>

<?php
$thename='Webtesting'; 
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
// session variables//
    $s_staff_id=$_SESSION['staff_id']; 
?>

<?php
////////// login session
if ($_POST && !empty($_POST['email'])) {
$_SESSION['email'] = $_POST['email'];
}
$email=$_SESSION['email'];
if ($_POST && !empty($_POST['password'])) {
$_SESSION['password'] = $_POST['password'];

}
$spass=($_SESSION['password']);
?>

























<?php
class allClass{
/////////////////////////////////////////

function _get_role_details($conn, $role_id){
    $query=mysqli_query($conn, "SELECT * FROM role_tab WHERE role_id='$role_id'");    
    $fetch=mysqli_fetch_array($query);
    $role_name=$fetch['role_name'];

    return '[{"role_name":"'.$role_name.'"}]';
}

/////////////////////////////////////////
function _get_status_details($conn, $status_id){
    $query=mysqli_query($conn, "SELECT * FROM status_tab WHERE status_id='$status_id'");    
    $fetch=mysqli_fetch_array($query);
    $status_name=$fetch['status_name'];

    return '[{"status_name":"'.$status_name.'"}]';
}

function _get_user_details($conn, $s_staff_id){
    $query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$s_staff_id'");    
    $fetch=mysqli_fetch_array($query);
    $staff_id=$fetch['staff_id'];
    $fullname=$fetch['fullname'];
    $email=$fetch['email'];
    $phonenumber=$fetch['phonenumber'];
    $role_id=$fetch['role_id'];
    $status_id=$fetch['status_id'];
    $passport=$fetch['passport'];
    $date=$fetch['date'];
    $last_login=$fetch['last_login'];

    return '[{"staff_id":"'.$staff_id.'","fullname":"'.$fullname.'","email":"'.$email.'","phonenumber":"'.$phonenumber.'","role_id":"'.$role_id.'","status_id":"'.$status_id.'","passport":"'.$passport.'","date":"'.$date.'","last_login":"'.$last_login.'"}]';
}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////
function _get_staff_details($conn, $staff_id){
		$query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$staff_id'");
   	 	$fetch=mysqli_fetch_array($query);
        $staff_id=$fetch['staff_id'];
        $fullname=$fetch['fullname'];
        $email=$fetch['email'];
        $phonenumber=$fetch['phonenumber'];
        $role_id=$fetch['role_id'];
        $status_id=$fetch['status_id'];
        $passport=$fetch['passport'];
        $otp=$fetch['otp'];
		$date=$fetch['date'];
		$last_login=$fetch['last_login'];
       

    return '[{"staff_id":"'.$staff_id.'","fullname":"'.$fullname.'","email":"'.$email.'","phonenumber":"'.$phonenumber.'","role_id":"'.$role_id.'","status_id":"'.$status_id.'","passport":"'.$passport.'","otp":"'.$otp.'","date":"'.$date.'","last_login":"'.$last_login.'"}]';
}



function _get_staff_profile_details($conn, $staff_id){
    $query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$staff_id'");
    $fetch=mysqli_fetch_array($query);
        $staff_id=$fetch['staff_id'];
        $fullname=$fetch['fullname'];
        $email=$fetch['email'];
        $phonenumber=$fetch['phonenumber'];
        $role_id=$fetch['role_id'];
        $status_id=$fetch['status_id'];
        $passport=$fetch['passport'];
		$date=$fetch['date'];
		$last_login=$fetch['last_login'];

    return '[{"staff_id":"'.$staff_id.'","fullname":"'.$fullname.'","email":"'.$email.'","phonenumber":"'.$phonenumber.'","role_id":"'.$role_id.'","status_id":"'.$status_id.'","passport":"'.$passport.'","date":"'.$date.'","last_login":"'.$last_login.'"}]';
}


/////////////////////////////////////////
function _get_sequence_count($conn, $item){
	$count=mysqli_fetch_array(mysqli_query($conn,"SELECT counter_value FROM counter_tab WHERE counter_id = '$item' FOR UPDATE"));
	 $num=$count[0]+1;
	 mysqli_query($conn,"UPDATE `counter_tab` SET `counter_value` = '$num' WHERE counter_id = '$item'")or die (mysqli_error($conn));
	 if ($num<10){$no='00'.$num;}elseif($num>=10 && $num<100){$no='0'.$num;}else{$no=$num;}
	 return '[{"num":"'.$num.'","no":"'.$no.'"}]';
}


}//end of class
$callclass=new allClass();


