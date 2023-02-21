<!DOCTYPE html>
<head>
<style>
.error {color: #FF0000;}
</style>
<body>

<?php
$userNameErr = $passErr = "";
$userName = $pass = $rememberMe = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_POST["userName"])) {
    $userNameErr = "User Name is required";
  } else {
    $userName = test_input($_POST["userName"]);
    if (!preg_match("/^[a-zA-Z-' .-0-9_]*$/",$userName)) {
      $userNameErr = " User Name can contain alpha numeric characters, period, dash or 
underscore only";
    }
  }
 if (empty($_POST["pass"]="")) {
	 $passErr = "pasword is needed";
 }  else {
	 $pass = test_input($_POST["pass"]);
	 if (!preg_match("/^[@#$%]*$/",$userName)) {
		 $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
	 }	if (count($pass<8)){
		 $passErr = "Password must not be less than eight (8) characters";
	 }
 }
 
 
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>LOG IN</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: 
  <input type="text" name="userName" value="<?php echo $userName;?>">
  <span class="error">* <?php echo $userNameErr;?></span>
  <br><br>
 Password:
  <input type = "password" name = "pass" value = "<?php echo $pass ;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  Remember Me
  <input type = "checkbox" name = "rememberMe" value = "<?php echo $rememberMe?>">
  <br><br>
  <input type ="submit" name="submit" value="Submit">  
  <a href = "ResetPassword.php"? >Forgot Password?</a>
</form>



</body>
</head>