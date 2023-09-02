<?php include 'config/connection.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php include 'meta.php';?>
<head>
<title>Hostit</title>
</head>
<body>

<?php include 'config/content-page.php'?>
<?php include 'header.php'?>



    <div class="phone-div" id="myLinks">
        <ul>
            <li>Home</li>
            <li>Profile</li>
            <a href="<?php echo $website_url ?>/login"><li><button class="btn_list" >Sign Up</button></li></a>
            <a href="<?php echo $website_url ?>/login"><li><button class="btn_list"  >Login</button></li></a> 
        </ul>
    </div>
    
    <section class="slider-section">
        <div class="inner-div">
            <div class="div-in" data-aos="zoom-in" data-aos-duration="1000">
                <div class="text-div" >
                    <h1>Fast & Secure<br>Web Hosting</h1>
                    <p>Anything embarrassing hidden in the middle of text. All the Lorem Ipsuanything embarrassing hidden in the middle of text. All the Lorem Ipsumm </p>
                </div>
                <div class="btns-div">
                <button class="btn">Read More</button>
                <button class="btn btn1">Contact Us</button>
                </div>
            </div>

            <div class="div-in div-in2" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?php echo $website_url ?>/all-images/body-pix/slider-img.png">
            </div>
        </div>
        

    </section>
    <script>
            function myFunction() {
            var x = document.getElementById("myLinks");
            var y = document.querySelector(".slider-section");
            // var z = document.querySelector(".btn mobile_btn1");
            // var two = document.querySelector(".btn mobile_btn1");

            if (x.style.display === "block") {
            x.style.display = "none";
            y.style.paddingTop="50%";
            // z.style.display="block";
            // two.style.display="none";
            } 
            else {
            x.style.display = "block";
            // two.style.display="block";
            // z.style.display="none";

            x.style.backgroundColor="#03A7D3";
            x.style.backdropFliter= "blur(10px)";
            y.style.paddingTop="0%";
            }
            }
        </script>
        
<?php include 'bottom-scripts.php'?>
</body>
</html>