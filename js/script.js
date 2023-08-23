function _open_menu(){
    $('.overlay-div').animate({'margin-left':'0'},200);
    $('.slide-side-div').animate({'margin-left':'0'},400);
}

function _close_menu(){
    $('.overlay-div').animate({'margin-left':'-100%'},200);
    $('.slide-side-div').animate({'margin-left':'-250px'},0);

}



function handle(){
    // var name = document.getElementById("name").value;
    // var mobie = document.getElementById('mobile').value;
    // var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
    
    if (password !== cpassword) {
        alert("Passwords didn't match!");
        return false; // Prevent form submission
    }
   
        // window.prompt("Registration successful! Thank you for signing up.");

    
    return true; // Allow form submission
   
}



