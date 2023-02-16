<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $dobErr = $degreeErr = $bloodErr = "";
$name = $email = $gender = $comment = $website = $dob = $degree = $blood = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' .-]*$/",$name)) {
      $nameErr = "Only letters, period, dash and white space allowed";
    }
	if (count($name)<2){
		$nameErr = "use full name!";                     //mine 
	}
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }                              
}
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  
  
     if (empty($_POST["dob"])) {                                          //mine 
    $dobErr = "date is required";
  }



	
	

  if (empty($_POST["gender"])) {                               
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  } 


  if (empty($_POST["degree"])) {                                 //mine                
    $degreeErr = "Degree is required";
  } else {
    $degree = test_input($_POST["degree"]);
	if (count($degree)<2) {
		$degreeErr = "choose atleast two";
	}
   }    
  

  if (empty($_POST["$blood"]))  {                               //mine
	  $bloodErr = "Must be selected";
  }
  

  



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Date of Birth: <input type = "date" name "dob" value = "<?php echo $dob;?>">    <!-- mine --> 
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>                         
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:                                           <!-- mine -->
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="SSC") echo "checked";?> value="SSC">SSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="HSC") echo "checked";?> value="male">HSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="BSc") echo "checked";?> value="other">BSc
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="MSc") echo "checked";?> value="other">MSc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
  Blood Group:
   <label for="blood"></label>
  <select id="blood" name="blood">
    <option value="$blood">A+</option>
    <option value="$blood">A-</option>
    <option value="$blood">B+</option>
    <option value="$blood">B-</option>
	<option value="$blood">AB+</option>
	<option value="$blood">AB-</option>
	<option value="$blood">O+</option>
	<option value="$blood">O-</option>
  </select>
  <span class="error">* <?php echo $bloodErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $dob;                 //mine
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;             //mine
echo "<br>";
echo $blood;
echo "<br>";
?>

</body>
</html>
