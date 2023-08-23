<?php include 'connection.php' ?>
<?php include '../../../meta.php'?>
<?php
    $action = $_GET['action']; // $_GET perform function on the url //
?>


<?php
    if ($action == 'logOut'){
        $_SESSION['staff_id']=''; 
?>
    <script>
        window.parent(location="../login/");
    </script>    
<?php } ?>


<?php
sleep(1.5);
    if ($action == 'logIn'){
        $login_email_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE `email`='$email' AND `password`='$password'");
        $login_email_count=mysqli_num_rows($login_email_query);

       if($login_email_count>0){
        $fetch_staff_id=mysqli_fetch_array($login_email_query);
        $s_staff_id=$fetch_staff_id['staff_id'];

        $_SESSION['staff_id']=$s_staff_id; // session staff_id out //
        $s_staff_id=$_SESSION['staff_id'];  // session staff_id in //


        // $message = json_encode($alerter);
        // echo "alerter($Message);";
?>
<script>

            // alert('Login Successfull')
            window.parent(location="../login/admin/");
        </script>


<?php
       }else{
        ?>
       <script>
           alert('Invalid Login Details');
            window.parent(location="../login/");
        </script> 

        <?php

       }

    }
?>

<!-- UPDATE STAFF PROFILE -->
<?php
    if($action == 'update_profile'){
        $staff_id = $_GET['staff_id'];
        $passport = $_FILES["passport"]["name"];

        if($passport==''){
            //do nothing
        }else{
            $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
            $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
           if (in_array($extension, $allowedExts)){		
                move_uploaded_file($_FILES["passport"]["tmp_name"], "../uploaded_files/profile_pix/".$passport);
             }
                /// move_uploaded_file($_FILES["passport"]["tmp_name"], "../uploaded_files/profile_pix/".$passport);
           // mysqli_query($conn, "UPDATE staff_tab SET `passport`='$passport'");
           mysqli_query($conn, "UPDATE staff_tab SET `fullname`='$fullname',`email`='$email',`phonenumber`='$phonenumber',  `status_id`='$status_id',`passport`='$passport',`date`=NOW() WHERE `staff_id`='$staff_id'");
       
        }
       
        
        
    	
      
       
?>
        <script>
              alert('<?php echo $passport?>');
            alert('Update Successful');
            window.history.back();
        </script>

<?php
}

?>

<?php
     if ($action == 'validateEmail'){
        $staff_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE `email`='$resetemail'");
        $staff_count=mysqli_num_rows($staff_query);
        $staff_fetch=mysqli_fetch_array($staff_query);
        $staff_id=$staff_fetch['staff_id'];
        $status_id=$staff_fetch['status_id'];

       if ($staff_count>0) {
        if ($status_id==1){
            $sendotp = rand(11111, 99999);
            mysqli_query($conn, "UPDATE staff_tab SET `otp`='$sendotp' WHERE staff_id='$staff_id'") or die('cannot update the database');
       
?>      
            <script>
               window.parent(location="../login/resetpassword.php?staff_id=<?php echo $staff_id?>");
           </script> 
        
        <?php       
        }else{
?>      
         <script>
            alert('ACCOUNT SUSPENDED!');
            window.parent(location="../login/proceedresetpassword.php");
        </script> 
<?php 
        }

       }else{
        ?>
       <script>
           alert('EMAIL NOT FOUND');
            window.parent(location="../login/proceedresetpassword.php");
        </script> 

        <?php

       }

    }
?>





<!-- RESET PASSWORD -->
<?php
        
    if ($action =='resetPassword') {

        if($createpassword != $confirmpassword){
?>
            <script>
                alert('PASSWORD NOT MATCH!!!');
                window.parent(location="../login/resetpassword.php");
            </script>
<?php 

        }else{
            $staff_id=$_GET['staff_id'];
            // CHECK IF THE ID IS A STAFF ID //
            $check_staff_id_query=mysqli_query($conn, "SELECT staff_id FROM staff_tab WHERE staff_id='$staff_id'");
            $count_staff_id=mysqli_num_rows($check_staff_id_query);

            if ($count_staff_id>0){
            // UPDATE THE STAFF TAB IF IT IS A STAFF_ID //
                mysqli_query($conn, "UPDATE staff_tab SET `password`='$confirmpassword' WHERE staff_id='$staff_id'") or die('cannot update the database');
?>
            <script>
                alert('PASSWORD RESET SUCCESSFUL');
                window.parent(location="../login");
            </script>

<?php 

}
}
}
?>


 <!-- STAFF REGISTRATION -->

 <?php
    if ($action == 'staffRegistration'){
        $email_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE `email`='$email'");
        $email_query_count=mysqli_num_rows($email_query);

        if($email_query_count>0){
            ?>
            <script>
            alert('Email Cannot Be used');
            window.parent(location="../login/signup.php");
            </script> 
            <?php   
        }else{
           
        $passport = $_FILES["passport"]["name"];

        $counter_id="STF";
        $counter_query=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='STF'") or die ("cannot select from counter tab");
        $fetch_counter_query=mysqli_fetch_array($counter_query);
        $counter_value=$fetch_counter_query['counter_value'];
        $staff_id="STF".$counter_value;
        // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$counter_value' WHERE counter_id='STF'");
        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
        $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
       if (in_array($extension, $allowedExts)){				 //////////array 
        move_uploaded_file($_FILES["passport"]["tmp_name"], "../upload_pix/staff_pix/".$passport);
       }
        
        // INSERT INTO STAFF TAB //
        mysqli_query($conn, "INSERT INTO `staff_tab`
        (`staff_id`, `fullname`, `email`, `phonenumber`, `status_id`, `passport`, `password`, `date`) 
        VALUES('$staff_id', '$fullname', '$email', '$phonenumber', '$status_id', '', '$password',NOW())") or die ("cannot insert into staff_tab");
       





       $email_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE `email`='$email' AND `password`='$password'");
       $email_count=mysqli_num_rows($email_query);

      if($email_count>0){
       $fetch_staff_id=mysqli_fetch_array($email_query);
       $s_staff_id=$fetch_staff_id['staff_id'];

       $_SESSION['staff_id']=$s_staff_id; // session staff_id out //
       $s_staff_id=$_SESSION['staff_id'];  // session staff_id in //
      }

    

?>
<script>
// alert("../login/admin/reg-successful.php");


 window.parent(location="../login/admin/index.php");
</script> 
<?php   
 }
}
?>












 <!-- INSTITUTION REGISTRATION -->

 <?php
    if ($action == 'institutionRegistration'){
        $email_query=mysqli_query($conn, "SELECT * FROM institution_tab WHERE `institution_email`='$institutionemail'");
        $email_query_count=mysqli_num_rows($email_query);

        if($email_query_count>0){
            ?>
            <script>
             alert('Eamil Cannot Be used');
             window.parent(location="../login/admin/institution-registration.php");
            </script> 
            <?php   
             }else{



    $passport = $_FILES["passport"]["name"];

        $counter_id="INSTI";
        $counter_query=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='INSTI'") or die ("cannot select from counter tab");
        $fetch_counter_query=mysqli_fetch_array($counter_query);
        $counter_value=$fetch_counter_query['counter_value'];
        $institution_id="INSTI".$counter_value;
        // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$counter_value' WHERE counter_id='INSTI'");
    

        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
        $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
       if (in_array($extension, $allowedExts)){				 //////////array 
        move_uploaded_file($_FILES["passport"]["tmp_name"], "../upload_pix/logo_pix/".$passport);
       }
        
        // INSERT INTO INSTITUTION TAB //
        mysqli_query($conn, "INSERT INTO `institution_tab`
        (`institution_id`, `institution_cat_id`, `institution_name`, `institution_website`, `institution_phonenumber`, `institution_email`, `institution_address`, `staff_id`, `status_id`,  `passport`, `date`) 
        VALUES('$institution_id', '$institution_cat_id', '$institutionname', '$institutionwebsite', '$institutionphonenumber', '$institutionemail', '$institutionaddress', '$staff_id', '$status_id', '$passport', NOW())") or die ("cannot insert into institution_tab");
    

?>
<script>
 alert('Registration Successful');
 window.parent(location="../login/admin/institution-registration.php");
</script> 
<?php   
 }
}
?>





<!-- UPDATE INSTITUTION PROFILE -->
<?php
    if($action == 'updateInstitutionProfile'){
        $staff_id = $_GET['staff_id'];
        $institution_id = $_GET['institution_id'];
        $passport = $_FILES["passport"]["name"];

        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
        $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
       if (in_array($extension, $allowedExts)){				 //////////array 
        move_uploaded_file($_FILES["passport"]["tmp_name"], "../upload_pix/logo_pix/".$passport);
         mysqli_query($conn, "UPDATE institution_tab SET `passport`='$passport' WHERE `institution_id`='$institution_id'");
      }
      
        mysqli_query($conn, "UPDATE institution_tab SET `institution_name`='$institutionname',`institution_website`='$institutionwebsite',`institution_phonenumber`='$institutionphonenumber', `institution_email`='$institutionemail', `institution_address`='$institutionaddress', `staff_id`='$staff_id', `status_id`='$status_id',  `date`=NOW() WHERE `institution_id`='$institution_id'") or die ("cannot update institution tab");
?>
        <script>
            alert('Update Successful');
            window.history.back();
        </script>

<?php
}

?>