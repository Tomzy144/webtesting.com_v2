<?php
class allClass{


function _get_status_details($conn, $status_id){
    $query=mysqli_query($conn, "SELECT * FROM status_tab WHERE status_id='$status_id'");    
    $fetch=mysqli_fetch_array($query);
    $status_name=$fetch['status_name'];

    return '[{"status_name":"'.$status_name.'"}]';
}


function _get_user_details($conn, $s_staff_id,$website_url){
    $query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$s_staff_id'");    
    $fetch=mysqli_fetch_array($query);
    $staff_id=$fetch['staff_id'];
    $fullname=$fetch['fullname'];
    $email=$fetch['email'];
    $phonenumber=$fetch['phonenumber'];
    $passport=$fetch['passport'];

    return '[{"staff_id":"'.$staff_id.'","fullname":"'.$fullname.'","email":"'.$email.'","phonenumber":"'.$phonenumber.'","passport":"'.$passport.'"}]';
}


function _get_staff_profile_details($conn, $staff_id){
    $query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$staff_id'");
    $fetch=mysqli_fetch_array($query);
        $staff_id=$fetch['staff_id'];
        $fullname=$fetch['fullname'];
        $email=$fetch['email'];
        $phonenumber=$fetch['phonenumber'];
        $status_id=$fetch['status_id'];
        $passport=$fetch['passport'];

    return '[{"staff_id":"'.$staff_id.'","fullname":"'.$fullname.'","email":"'.$email.'","phonenumber":"'.$phonenumber.'","password":"'.$password.'","status_id":"'.$status_id.'","passport":"'.$passport.'"}]';
}


function _get_role_details($conn, $role_id){
    $query=mysqli_query($conn, "SELECT * FROM role_tab WHERE role_id='$role_id'");    
    $fetch=mysqli_fetch_array($query);
    $role_name=$fetch['role_name'];

    return '[{"role_name":"'.$role_name.'"}]';
}


}//end of class
$callclass=new allClass();
?>
