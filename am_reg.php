<?php
include("connect.php");

if(isset($_POST['sub']))
{
    
  
   $name=$_POST['name'];
   $addr=$_POST['address'];
  
   $email=$_POST['email'];
   
   $mob=$_POST['mobile'];
   $u=$_POST['u'];
   $p=$_POST['p'];
   
  $up=$_FILES['photo']['name'];
    $count=rand('1000000','9999999');
    $ext=$count."".substr($up,strrpos($up,"."));
   
    
    $up1=$_FILES['po1']['name'];
    $count1=rand('1000000','9999999');
    $poname=$count1."".substr($up1,strrpos($up1,".")); 
   
if(move_uploaded_file($_FILES['po1']['tmp_name'],getcwd()."\\img2\\$poname"))
{                         
  
   
   $ins=  mysqli_query($dbcon,"insert into amb values('','$name','$addr','$email','$mob','$u','$p','$ext','$poname','0','0','0')");
  $log=mysqli_query($dbcon,"insert into user_login values('','$u','$p','amb','0')" );
   move_uploaded_file($_FILES['photo']['tmp_name'],  getcwd()."//img1//$ext");
   if($ins>0)
   {
       header("location:am_reg.php?success=1");
   }
 else {
      // header("location:hosreg.php?success=2");    
     
   }
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="temp/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="temp/lib/animate/animate.min.css" rel="stylesheet">
    <link href="temp/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="temp/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="temp/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="temp/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php
    
    include 'menu.php';
    
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Ambulance Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#"><?php echo $title ?></a></li>
                    
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
        
            <div class="row pt-md-0">
                
                <div class="row pt-md-0">
                            
				<div class="col-lg-12 contact-agileits-w3layouts">
					
                                    
                                    <form method="post" enctype="multipart/form-data">
                                            <center>
                                            <table class="table table-bordered">
                                                
                                                
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">NAME</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="text" name="name" class="form-control" placeholder="IN BLOCK LETTERS"value="" required  onkeypress="return onlyAlphabets(event,this);"
                                                        oninvalid="InvalidMsg6(this);" 
                                                        oninput="InvalidMsg6(this);"  minlength="4"></span>
						    
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">ADDRESS</label></span>
                                                    </th>
                                                    <th>
                                                <span><textarea name="address" class="form-control" required  oninvalid="InvalidMsg3(this);" 
           oninput="InvalidMsg3(this);" minlength="10" ></textarea></span>

                                                    </th>
                                                </tr>
                                                
                                                					    
						    
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">E-MAIL</label></span>
                                                    </th>
                                                    <th>
                                                <span><input type="email" name="email" class="form-control"  value=""  required="" oninvalid="InvalidMsg4(this);" 
                                                oninput="InvalidMsg4(this);" id="email" ></span>

                                                    </th>
                                                </tr>
                                                
                                                <tr> 
                                                    <th>
                                                        <span><label style="color: grey">MOBILE_NO</label></span>
                                                    </th>
                                                    <th>
                                                <span><input type="text" name="mobile" class="form-control"value=""required=""onkeyup="chkc(this.value)"  onkeypress="return isNumber(event)" minlength="10" maxlength="10" /><span id="o3"></span></span>

                                                    </th>
                                                </tr>
                                            
                                                <tr>

                                                    <th >      
                                                        <span><label style="color: grey">USER_ID</label></span>
                                                    </th>
                                                    <th>
                                                       <span><input type="text" name="u" class="form-control" value="" id="confirm_email"  required oninvalid="validatePasswords()" placeholder="Enter E-Mail as User ID" ></span>
                                                    </th>
                                                    <script>
                                                    var email = document.getElementById("email"), confirm_email = document.getElementById("confirm_email");
                                                    function validatePasswords()
                                                    {
                                                        if(email.value != confirm_email.value) {
                                                            confirm_email.setCustomValidity("User ID and Email Don't Match");
                                                        } 
                                                        else {
                                                            confirm_email.setCustomValidity('');
                                                        }
                                                    }

                                                    email.onchange = validatePassword;
                                                    confirm_email.onkeyup = validatePassword;
                                                </script>


                                                </tr>
                                                <tr>

                                                    <th>
                                                        <span><label style="color: grey">PASSWORD</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="password" name="p" class="form-control"value=""required="" minlength="5" maxlength="10"
                                                        required oninvalid="InvalidMsg2(this);" 
         oninput="InvalidMsg2(this);" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ></span>

                                                    </th>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">Driver PHOTO</label>             
                                                </span>
                                                    </th>
                                                    <th>
                                                    <input type="file" name="photo" class="form-control"value=""required=""></span>

                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">Id Proof</label>             
                                                </span>
                                                    </th>
                                                    <th>
                                                    <input type="file" name="po1" class="form-control"value=""required=""required oninvalid="InvalidMsg2(this);" 
         oninput="InvalidMsg2(this);"></span>

                                                    </th>
                                                </tr>
                                                <span></span>
                                                <tr>
                                                    <th colspan="2">
                                                       <span><input type="submit" name="sub" class="btn btn-sm btn-primary"value="PROCEED"></span>

                                                    </th>
                                                </tr>
                                            </table>
                                            </center>
                                            
                                            <?php
                                            if (isset($_GET['success']))
                                            {
                                                if($_GET['success']=="1")
                                                {
                                                    echo '<script> swal("MEDI-CARE", "Succesfully Registered !", "success");</script>';
                                                    //echo"Your registration successfully completed";
                                                }
                                                if($_GET['success']=="2")
                                                {
                                                    echo '<script> swal("MEDI-CARE", "Error found!Try again!", "error");</script>';
                                                    //echo "Error found!Try again! ";
                                                }
                                            }
                                            
                                            ?>
                                            
					    </form>
                                    
				</div>
                            
			</div>
            </div>
        
        
        
        
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
       
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="temp/#">MEDI-CARE</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">MEDI-CARE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="temp/#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="temp/lib/wow/wow.min.js"></script>
    <script src="temp/lib/easing/easing.min.js"></script>
    <script src="temp/lib/waypoints/waypoints.min.js"></script>
    <script src="temp/lib/counterup/counterup.min.js"></script>
    <script src="temp/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="temp/lib/tempusdominus/js/moment.min.js"></script>
    <script src="temp/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="temp/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="temp/js/main.js"></script>
    <script src="csinvalid.js"></script>
</body>

</html>