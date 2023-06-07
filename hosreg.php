
<?php
include("connect.php");

if(isset($_POST['sub']))
{
    
  
   $name=$_POST['name'];
   $addr=$_POST['address'];
   $pin=$_POST['pin'];
   $dis=$_POST['district'];
   $email=$_POST['email'];
   $land=$_POST['land'];
   $mob=$_POST['mobile'];
   $u=$_POST['u'];
   $p=$_POST['p'];
   $type=$_POST['type'];
   $lt=$_POST['la'];
   $lg=$_POST['lo'];
    $up=$_FILES['photo']['name'];
    $count=rand('1000000','9999999');
    $ext=$count."".substr($up,strrpos($up,"."));
   
   $ins=  mysqli_query($dbcon,"insert into hosreg values('','$name','$addr','$pin','$dis','$email','$land','$mob','$u','$p','$type','$lt','$lg','$ext','0')");
  $log=mysqli_query($dbcon,"insert into user_login values('','$u','$p','hospital','0')" );
   move_uploaded_file($_FILES['photo']['tmp_name'],  getcwd()."//pic//$ext");
   if($ins>0)
   {
       header("location:hosreg.php?success=1");
   }
 else {
      // header("location:hosreg.php?success=2");    
     
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
    
    
    <script type="text/javascript">
    function nme(b2)
{
var k5=b2.length;
var ch2=/([a-z])$/;
if(ch2.test(b2)==false)
{
document.getElementById("np3").innerHTML="<font color='red'>*Only Alphabets*</font>";
$("#btn").hide();
return false;
}

else
{
  document.getElementById("np3").innerHTML="";  
  $("#btn").show();
}
} 
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
$("#btn").hide();
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
$("#btn").hide();
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
  $("#btn").show();
}
}
  
 function chkp(c)
{
var s=document.getElementById("p10").value;

if(s==c)
{
document.getElementById("p").innerHTML="<font color='Green'>*Password is Correct*</font>";
$("#btn").show();
return false;
}
else
{
document.getElementById("p").innerHTML="<font color='red'>*Verfy Password*</font>";
$("#btn").hide();
}
}





function vem(a)  
     {  
          //var a = document.myform.email.value;  
          var atposition = a.indexOf("@");  
          var dotposition = a.lastIndexOf(".");  
          if (atposition<1 || dotposition<atposition+2 || dotposition+2>=a.length) 
          {  
               document.getElementById("em").innerHTML="<font color='red'>*Please Check Your Email Address*</font>";
                $("#btn").hide();  
          }  
          else
{
                document.getElementById("em").innerHTML="";  
  $("#btn").show();
}
     }  
    </script>
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Hospital Registration</h1>
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
            
            
				<div class="col-lg-12">
					
                                    
                                    <form method="post" enctype="multipart/form-data">
                                            <center>
                                            <table class="table table-bordered">
                                                
                                                
                                                <tr>
                                                    <th  >
                                                        <span><label style="color: grey">NAME</label></span>
                                                    </th>
                                                    <th>
                                                        <span class="form-group"><input type="text" name="name" minlength="3" class="form-control" required autocomplete="off" placeholder="IN BLOCK LETTERS"value=""
                                                        onkeypress="return onlyAlphabets(event,this);"
                                                        oninvalid="InvalidMsg6(this);" 
                                                        oninput="InvalidMsg6(this);" ></span>
                                                                            </th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th >
                                                        <span><label style="color: grey">ADDRESS</label></span>
                                                    </th>
                                                    <th>
                                                <span ><textarea name="address" class="form-control" oninvalid="InvalidMsg3(this);" 
           oninput="InvalidMsg3(this);" 
          required minlength="10" ></textarea></span>

                                                    </th>
                                                </tr>
                                                 
                                                
                                                <tr>
                                                    <th >
                                                

                                                        <span><label style="color: grey">PIN</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="text" name="pin"  minlength="6" maxlength="6" pattern="[1234567890][0-9]{5}" class="form-control" value=""  oninvalid="InvalidMsg1(this);" 
             oninput="InvalidMsg1(this);"  onkeypress="return isNumber(event)" required ></span>

                                                    </th>
                                                </tr>
                                                
                                                <tr> 
                                                    <th >
                                                        <span><label style="color: grey">DISTRICT</label></span>
                                                    </th>
                                                    <th>
                                                        <span>
                                                            <select name="district" class="form-control" required>
                                                                <option value="">-Choose One-</option>
                                                                <option value="trivandrum">Trivandrum</option>
                                                                <option value="kollam">Kollam</option>
                                                                <option value="pathanamthitta">Pathanamthitta</option>
                                                                <option value="alappuzha">Alappuzha</option>
                                                                <option value="kottayam">Kottayam</option>
                                                                <option value="kottayam">Idukki</option>
                                                                <option value="kottayam">Ernakulam</option>
                                                                <option value="kottayam">Trissur</option>
                                                                <option value="kottayam">Palakkad</option>
                                                                <option value="kottayam">Malappuram</option>
                                                                <option value="kottayam">Kozhikkodu</option>
                                                                <option value="kottayam">Vayanadu</option>
                                                                <option value="kottayam">Kannur</option>
                                                                <option value="kottayam">Kasargodu</option>
                                                            </select>
                                                        </span>
                                                    </th>
                                                </tr>					    
						    
                                                <tr>
                                                    <th >
                                                        <span><label style="color: grey">E-MAIL</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="email" name="email" class="form-control" id="email" onkeyup="vem(this.value)" value="" oninvalid="InvalidMsg4(this);" 
           oninput="InvalidMsg4(this);" required /><span id="em"></span></span>

                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">LAND LINE</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="text" name="land" maxlength="11" minlength="11" onkeypress="return isNumber(event)" class="form-control"value="" required></span>

                                                    </th>
                                                </tr>
                                                <tr> 
                                                    <th>
                                                        <span><label style="color: grey">MOBILE_NO</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="text" name="mobile"class="form-control"value="" minlength="10" maxlength="10" onkeyup="chkc(this.value)"  onkeypress="return isNumber(event)"
          oninvalid="InvalidMsg(this);" 
           oninput="InvalidMsg(this);" required /><span id="o3"></span>

                                                    </th>
                                                <script>
                                                    function phonenumber(inputtxt)
                                                    {
                                                        var phoneno = /^\d{10}$/;
                                                        if(inputtxt.value.match(phoneno))
                                                        {
                                                            return true;
                                                        }
                                                        else
                                                        {
                                                            alert("Not a valid Phone Number");
                                                            return false;
                                                        }
                                                    }

                                                </script>
                                                </tr>
                                            
                                                <tr>

                                                    <th>      
                                                        <span><label style="color: grey">USER_ID</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="email" name="u" placeholder="Enter Your Email as User ID" id="confirm_email" class="form-control" value="" required oninvalid="validatePasswords()" oninvalid="InvalidMsg4(this);" 
           oninput="InvalidMsg4(this);"><span id="em"></span></span>
                                                    </th>

                                                </tr>
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
                                                <tr>

                                                    <th>
                                                        <span><label style="color: grey">PASSWORD</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="password"  name="p" id="password" class="form-control"value="" required  oninvalid="InvalidMsg2(this);" 
         oninput="InvalidMsg2(this);"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></span>

                                                    </th>
                                                </tr>
                                                <tr>

                                                    <th>
                                                        <span><label style="color: grey">CONFIRM PASSWORD</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="password" id="confirm_password" class="form-control"value="" oninvalid="validatePassword()" required></span>

                                                    </th>
                                                </tr>
                                                <script>
                                                    var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
                                                    function validatePassword()
                                                    {
                                                        if(password.value != confirm_password.value) {
                                                            confirm_password.setCustomValidity("Passwords Don't Match");
                                                        } 
                                                        else {
                                                            confirm_password.setCustomValidity('');
                                                        }
                                                    }

                                                    password.onchange = validatePassword;
                                                    confirm_password.onkeyup = validatePassword;
                                                </script>
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">IS THE HOSPITAL</label></span>
                                                    </th>
                                                    <th>
                                                        <span><input type="radio" name="type" value="govt"  id="myRadio" required/>GOVT &nbsp; &nbsp; &nbsp;
                                                        <input type="radio" name="type" value="private" id="myRadio" required/>PRIVATE</span>	

                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                       <div id="map" style="width: 100%; height: 500px"></div> 
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">LATITUDE</label></span>
                                                    </th>
                                                    <th>
                                            <input type="text"class="form-control" name="la"id="lat"placeholder="Double Click on the map" value="" required  >
                  
                                                    </th>
                                                </tr>
                                                
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">LONGITUDE</label></span>
                                                    </th>
                                                    <th>
                                                <input type="text" class="form-control"name="lo"placeholder="Double Click on the map" id="lng" value="" required >
                      
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span><label style="color: grey">UPLOAD PHOTO</label>             
                                                </span>
                                                    </th>
                                                    <th>
                                                    <input type="file" name="photo" class="form-control"value="" required></span>

                                                    </th>
                                                </tr>
                                                <span></span>
                                                <tr>
                                                    <th colspan="2">
                                                <center>
                                                       <span><input type="submit" name="sub"  onclick="myFunction()" class="btn btn-primary w-100 py-3"value="PROCEED"></span>
                                                </center>
                                                    </th>
                                                    <th>
                                                        
                                                        
                                                    </th>
                                                </tr>
                                            </table>
                                            </center>
                                            
                                            <?php
                                            if (isset($_GET['success']))
                                            {
                                                if($_GET['success']=="1")
                                                {
                                                    echo '<script> swal("MEDI-CARE", "Your Registration Sucessfull, Wait for approve !", "success");</script>';
                                                   /* echo '<script language="javascript">';
                                                   echo 'alert("Your Registration Sucessfull, Wait for approve!")';
                                                   echo '</script>';*/
                                                }
                                                if($_GET['success']=="2")
                                                {
                                                   echo '<script language="javascript">';
                                                   echo 'alert("Error! Try again")';
                                                   echo '</script>';
                                                }
                                            }
                                            
                                            ?>
                                            
					    </form>
                                    
				</div>
                            
            <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 9.1529656, lng: 76.7355742},
          zoom: 18,
          mapTypeId: 'roadmap'
        });
        google.maps.event.addListener(map, 'dblclick', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("lat").value=e.latLng.lat();
                document.getElementById("lng").value=e.latLng.lng();
            });
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
        
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzXv05Tg7stti5DyuH1_FmXPWKFS9EkHE&libraries=places&callback=initAutocomplete"
         async defer></script>
                            
                            
			
            
            
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