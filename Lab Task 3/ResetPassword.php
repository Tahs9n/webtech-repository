<!DOCTYPE html>
<head>
<style>
.error {color: #FF0000;}
</style>
<body>

<?php
$pass = $newPass = $retypedPass = "";
$passErr = $newPassErr = $retypedPassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if ($pass == $newPass){
		$newPassErr = "New Password Should not be same as Current Password";
	}
	elseif ($newPass != $retypedPass) {
		$retypedPassErr = "New password must match with the retyped password";
	}
}

?>

<h2>CHANGE PASSWORD</h2>
<p><span class="error">* required field</span></p>
Current Password: 
<input type = "password" name = "pass" value = "<?php echo $pass?>">
<span class="error">* <?php echo $passErr;?></span>
<br>
New Password:
<input type = "password" name = "pass" value = "<?php echo $newPass?>">
<span class="error">* <?php echo $newPassErr;?></span>
<br>
Retype New Password:
<input type = "password" name = "pass" value = "<?php echo $retypedPass?>">
<span class="error">* <?php echo $retypedPassErr;?></span>
<br>
<input type="submit" userName="submit" value="Submit"> 

</body>
</head>