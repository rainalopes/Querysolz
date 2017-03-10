<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
{
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM login WHERE email_id = '$myusername' and password= '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQL_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
     
    
      if($count == 1 && $row['designation']=="teacher") 
{
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome_mentor.php");
      }
else {
        
        header("location: error.html");
      }
   }
 ?><!DOCTYPE html>
<html lang="en">



 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!--   <style>
  .fixed-nav-bar
   {
  position: fixed;
  }
  </style>
  -->



	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Querysolz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>


        <script>





function mvalidateForm()
{

var x = document.forms["msignin"]["username"].value;
    if (x == null || x == "") {
       alert("Username must be filled out");
        return false;
    }
    

var y = document.forms["msignin"]["password"].value;
    if (y == null || y == "") {
        alert("Password must be filled out");
        return false;
    }

}

</script>


        <script>

function mvalidatesignupForm()
{


var illegalChars = /[\W_]/; // allow only letters and numbers
var fn = document.forms["msignform"]["fname"].value;
var alpha=/^[A-Za-z\s]+$/;
 if (fn== "" || fn== null) {
                 alert("Firstname is required");
                 msignform.fname.value="";
                 return false;
    }
    else if (!alpha.test(fn)) {
   alert("Firstname consists of alphanets");
      msignform.fname.value="";
      return false;
  }
  else{

  
      }


var ln = document.forms["msignform"]["lname"].value;
 if (ln== "" || ln== null) {
                 alert("Lastname is required");
                 msignform.lname.value="";
                 return false;
    }
    else if (!alpha.test(ln)) {
   alert("Lastname consists of alphanets");
      msignform.lname.value="";
      return false;
  }
  else{

  
      }



var c= document.forms["msignform"]["qualification"].value;
var letters = /^[0-9a-zA-Z]+$/; 
 if (c== "" || c== null) {
                 alert("Qualification must be filled out");
                 msignform.qualification.value="";
                 return false;
    }


var fo= document.forms["msignform"]["foe"].value;
var letters = /^[0-9a-zA-Z]+$/; 
 if (c== "" || c== null) {
                 alert("Field Of Experience is required");
                 msignform.foe.value="";
                 return false;
    }





var em= document.forms["msignform"]["email"].value;
 if (em== "" || em== null) {
                 alert("EmailID must be filled out");
                 msignform.email.value="";
                 return false;
    }


var p = document.forms["msignform"]["contact"].value;
    if (p == null || p == "") {
        alert("Contact number must be filled out");
        return false;
    }else if(p.length<10){  
  alert("Contact number should be 10 numbers!!");  
  msignform.contact.value="";
       return false;  
    }else if (isNaN(p)) {
    alert("Must input numbers");
    msignform.contact.value="";
    return false;
     }else{  
     
     }  

var pa= document.forms["msignform"]["passwd"].value;
 if (pa== "" || pa== null) {
         alert("Enter Password also");
         return false;
    }else if( (msignform.passwd.value.length < 7) || (msignform.passwd.value.length > 15)){

      alert("The password is the wrong length. ");
      msignform.passwd.value="";
      return false;
    }else if (illegalChars.test(msignform.passwd.value)) {
        alert( "The password contains illegal characters.\n");
        
          return false;
 
    } else if ( (msignform.passwd.value.search(/[a-zA-Z]+/)==-1) || (msignform.passwd.value.search(/[0-9]+/)==-1) ) {
      alert("The password must contain at least one numeral.\n");
         return false;
  } else
    {
      
    }


 var secondpassword=document.forms["msignform"]["cnfpasswd"].value;

if (secondpassword=="" || secondpassword == null) {
  alert("Confirm Password must be filled");
  return false;
}else if (pa == secondpassword)
{
  return true;
}
else{
  alert("password must be same!");
  return false;
}


}






</script>

	
	<nav class="navbar  navbar-fixed-top">
	<div style="background-color: rgba(255,255,255,0.5);" id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><a href="index.html">Querysolz</a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="query.html">Questions</a></li>
						<li><a href="contactus.html">ContactUs</a></li>
						<li><a href="aboutus.html">AboutUs</a></li>
						<li style="padding-right: 15px;"><a href="feedback.html">Feedback</a></li>
						<select class="place_holder dropdown" style="height:30px;width:86px;padding-right:;margin-top: -15px;border-radius: 0px 0px 0px 0px;-moz-border-radius: 0px 0px 0px 0px;webkit-border-radius: 0px 0px 0px 0px;border: 2px solid #8c888c;" name="whichpage" id="whichpage" 
 							onChange="if(this.selectedIndex!=0)
							self.location=this.options[this.selectedIndex].value">
						 <option selected="selected" style="display: none;">Mentor Login</option>
    					<option value="ssig.php" style="font-size: 15px;font-family: Arial;font-weight: bold;font-size:17px;" class="btn btn-default">Student Login</option>
						</select>
					</ul>
				</nav>
			</div>
		</div>

	</header>
	</nav>
	

	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight" style="position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    z-index: 0 !important;
    width: 100% !important;
    height: 100% !important;">
			<ul  style="zoom:1;height:auto;image-rendering:crisp-edges;" class="slides">
		   	<li style="background-image: url(images/image_1.jpg);">
		   	</li>
		   	<li style="background-image: url(images/image_2.jpg);">
		   	</li>
		   	<li style="background-image: url(images/image_3.jpg);">
		   	</li>
		   	<li style="background-image: url(images/image_9.jpg);">
		   	</li>
		  	</ul>
	  	</div>

	</aside>
	


<div class="item">
  <img src="img/hero_05.jpg" alt="#">
  <div class="container">
    <div class="carousel-caption">
    


    	<div class="container">
        <div class="container">
        <div id="loginbox" style="margin-left:-1%;margin-top:-42%;position: fixed;" class="mainbox col-md-7 col-md-offset-3 col-sm-4 col-sm-offset-2">                    
    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" style="text-rendering: optimizeLegibility;font-size: 18px;color:black;">Sign In As Mentor</div>
                        <div style="float:right;position: relative; top:-17px;text-rendering: optimizeLegibility;"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" onsubmit="return mvalidateForm()" name="msignin">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label style="text-rendering: optimizeLegibility;color: black;">
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    
                                    <! Button -->

                                    <div class="col-sm-12 controls">
                                       <button type="submit" name='submit' id="btn-login" class="btn btn-success"> Login</button>
                                 

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px;font-size:18px;text-rendering: optimizeLegibility;color: black;" >
                                            Don't have an account! 
                                        <a style="padding-left: 60px;font-size:18px;text-rendering: optimizeLegibility;color: #DC143C;" href="#" onClick="$('#loginbox').hide(); $('#signstd').show()">
                                            Sign Up As Mentor
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                        </div>                     
                    </div>  
        </div>

<!--

<div id="signstd" style="display:none;margin-left:2%;margin-top:100%;" class="mainbox col-md-7 col-md-offset-3 col-sm-4 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="padding-top: 101%;">
                            <div class="panel-title">Sign Up As Student</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signstd').hide(); $('#loginbox').show()">Sign In </a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                     
                                  
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Qualification</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Qualification" placeholder="Qualification">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Field Of Experience</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Field" placeholder="Field Of Experience">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Contact</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Contact" placeholder="Contact">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confpasswd" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div style="padding-left: 30%;" class="form-group">
                                                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    </div>
                                </div>                                      
                                </div>
                            </form>
                         </div>
                    </div>                
         </div> 
    </div>
   </div>

-->
	 


        <div id="signstd" style="display:none;margin-left:-10%;margin-top:100%;" class="mainbox col-md-7 col-md-offset-3 col-sm-4 col-sm-offset-2">
		<div class="container" style="margin-left:-27%;padding-top:70%;">
        <div id="loginbox" class="mainbox col-md-8 col-md-offset-3 col-sm-4 col-sm-offset-2">         
        <div class="panel panel-info">
        
        <div class="panel-heading" style="margin-left:;">
        <div class="panel-title" style="text-rendering: optimizeLegibility;font-size: 18px;color:black;">Sign Up As Mentor</div>
        </div>
        
        <div style="padding-top:30px" class="panel-body">













        <form id="signupform" class="form-horizontal" role="form" action="teacher_reg.php" method="post" name="msignform" onsubmit="return mvalidatesignupForm()">


										
		<div class="col-md-6">				
		<div class="form-group" style="padding-top: 30px;">
		<input class="form-control" name="fname" placeholder="First Name" type="text">
		</div>
		</div>

		<div class="col-md-6" style="padding-top: 30px;padding-left: 40px;">	
		<div class="form-group">
		<input class="form-control" name="lname" placeholder="Last Name" type="text">
		</div>
		</div>
					
		<div class="col-md-6">
		<div class="form-group" style="padding-top: 20px;">
		<input class="form-control" name="qualification" placeholder="Qualification" type="text">
		</div>
		</div>

		<div class="col-md-6" style="padding-top: 20px;padding-left: 40px">
		<div class="form-group">
		<input class="form-control" name="foe" placeholder="Field Of Experience" type="text">
		</div>
		</div>
						
		<div class="col-md-6">
		<div class="form-group" style="padding-left: -15px;padding-top: 15px;">
		<input class="form-control" name="email" placeholder="Email" type="email">
		</div>
		</div>
				
		<div class="col-md-6" style="padding-top: 15px;padding-left: 40px">
		<div class="form-group">
		<input class="form-control"name="contact" placeholder="Contact" type="text">
		</div>
		</div>
						
		<div class="col-md-6">
		<div class="form-group" style="padding-left: -15px;padding-top: 15px;">
		<input class="form-control" name="passwd" placeholder="Password" type="password">
		</div>
		</div>

		<div class="col-md-6" style="padding-top: 15px;padding-left: 40px">
		<div class="form-group">
		<input class="form-control" name="cnfpasswd" placeholder="Confirm Password" type="password">
		</div>
		</div>

		<div class="col-md-12">
		<div style="padding-left: 30px;padding-top: 20px;" class="form-group">
		<div class="col-md-12 text-center animate-box">
		<p style="padding-bottom: 15px;"><button type="submit" name="submit"  class="btn btn-primary with-arrow">Submit<i class="icon-arrow-right"></i></a></p>
		</div>
		</div>
		</div>
					
		</form>	
		</div>
		</div>
		</div>
		</div>
		</div>
		
    

















	

		
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

