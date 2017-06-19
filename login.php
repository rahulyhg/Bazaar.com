<?php
                    error_reporting(0);
                    session_start();
                    $k="Member Type";
if($_GET['c'])
{
$k=$_GET['c'];
$_SESSION['sel']=$k;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>LogIn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

</head>
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/

body{
    background-color: #525252;
}

.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}
</style>
<body>

<div class="container">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form id='loginform' action='test.php' method='POST'>
				  <div class="dropdown">
					 <select class="form-control" id="category" onchange="fun()">
                                        
                                        <option value="0" selected><?php echo $k ?></option>
                                        <option value="Super Admin" >Super Admin</option>
                                        <option value="Admin" >Admin</option>
                                        <option value="User" >User</option>
                                        
                                        
                                    </select>
				  </div>
				  <br>
					<input type='text' name='user' placeholder='Username'>
          <input type='password' name='pass' placeholder='Password'>
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					</form>
					
				  <div class="login-help">
					<a href="signup.html">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
</div>

</body>
</html>

<script language="javascript">
var selectedvalue;
function fun()
{
    var sel=document.getElementById("category");
    selectedvalue=sel.options[sel.selectedIndex].value;
    //console.log(selectedvalue);
    window.location="http://localhost/login.php?c="+selectedvalue;
}

// function fun1()
// {
//     var sel1=document.getElementById("sub_category");
//     var selectedvalue1=sel1.options[sel1.selectedIndex].value;
//     //console.log(selectedvalue1);
//     window.location="http://localhost/search_result2.php?c1="+selectedvalue1;
// }
</script>


