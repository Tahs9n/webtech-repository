//couldnt finish, but tried. need to work on myself 

<!DOCTYPE html>
<head>
<body>

<?php
$name = $email = $DOB = $gender = $degree = $bloodGroup = "";
$nameError = $emailError = $DOBError = $genderError = $degreeError = $BloodGroupError = "";

if ($_SERVER["REQUEST_METHOD"] == "post")
{
	if (empty($_post["name"]))
	{
		$nameError = "Name Required";
	}
	else
	{
		$name = ($_post["name"]);
		if (!preg_match("/^[a-zA-Z-'  .-]*$/",$name)) 
		{
			$nameError = "Only letters, '.', '-' are allowed";
		}
	}
	
	
	
	if (empty($_post["email"]))
	{
		$nameError = "Email Required";
	}
	else
	{
		$name = ($_post["email"]);
	}
	
	
	
	if (empty($_post["DOB"]))
	{
		$nameError = "Date of birth Required";
	}
	else
	{
		$name = ($_post["DOB"]);
	}
	
	
	
	if (empty($_post["gender"]))
	{
		$nameError = "Gender Required";
	}
	else
	{
		$name = ($_post["gender"]);
	}
	
	
	
	if (empty($_post["degree"]))
	{
		$nameError = "Degree Required";
	}
	else
	{
		$name = ($_post["degree"]);
		
	}
	
	
	
	if (empty($_post["bloodGroup"]))
	{
		$nameError = "Blood group Required";
	}
	else
	{
		$name = ($_post["bloodGroup"]);
	}
	
	
	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
NAME: <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameError;?></span><br>
 
 
EMAIL: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailError;?></span><br>
	
	
DATE OF BIRTH: <input type="date" name="DOB" value="<?php echo $DOB;?>">
<span class="error">* <?php echo $DOBError;?></span><br>


GENDER: <input type="radio" name="gender" 
<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
<span class="error">* <?php echo $genderError;?></span><br>


DEGREE: <input type="checkbox" name="degree" value="<?php echo $degree;?>">
<span class="error">* <?php echo $degreeError;?></span><br>
	
	
}

?>
</form>


</body>
</head>
