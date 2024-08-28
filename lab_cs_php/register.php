<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
		#head{
		      width: 300px;
		      text-align: center;
		      margin: auto;

		      padding-bottom: 20px;}
		#form{box-shadow: 4px 4px 8px;
		      width: 300px;
		      margin-top: 100px;
		      margin-left: 430px;
		      padding-top: 80px;
		      padding-right: 100px;
		      padding-left: 100px;
		      background-color:grey;
		      padding-bottom: 80px;
		      }
		.field{margin-left: 40px;
		       padding: 10px;
		       }
		.field input{padding: 10px;}
		 #gen{margin-left: 50px;
		       margin-bottom: 10px;}
		 #rol{margin-left: 60px;}
		 #btn{padding-left: 100px;
		      padding-right: 0px;}
		 .btn{border: 1px solid;
    padding-top: 8px;
    padding-bottom: 8px;
    padding-left: 13px;
    padding-right: 13px;
    border-radius: 5px;
    color: whitesmoke;
    background-color: #6d7c90;
    text-decoration: none;
    font-size: 20px;}
	</style>
</head>
<body style="background-color: rgb(201 81 197 / 46%);">
<?php
if (isset($_POST['submit'])) {
	$name = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$role = $_POST['role'];
	$submit = $_POST['submit'];

	$connect = mysqli_connect("localhost","root","","lab_cs");
$query = "INSERT INTO users (user_name,email,password,gender,role)
VALUES('$name','$email','$password','$gender','$role')";
$query_result = mysqli_query($connect,$query);
	if ($query_result == 1) {

	 	echo "Registration succesfull submitted ";
	 	echo "<br>";
        
	 }
	else{
		echo "Some thing worng";
	}
}
?>
    <form action="" method="post">
        <div style="margin-left: 30%;margin-top: 10%;">
        <h3 style="color: #ffff;">User Registration form</h3>
            <fieldset style="width:400px;background-color:#bcd8e3;align-items: center;text-align: center;position: relative;font-size: 20px;">
            
<span style="color:whitesmoke;"><?php ?></span>
<div class="field">
    <input type="text" name="username" placeholder="Name" required>
</div>
<div class="field">
    <input type="text" name="email" placeholder="Email" required>
</div>
<div class="field">
    <input type="password" name="password" placeholder="Password" required>
</div>
<div id="gen">
    <label>Gender</label>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
</div>
<div id="rol">
<label>Role</label>
    <select name="role">
        <option value="admin">admin</option>
        <option value="teacher">teacher</option>
        <option value="student">student</option>
    </select>
</div>
    <div id="btn">
    <button name="submit" class="btn">Register</button>
    <a  href="index.php" class="btn">Go to login</a>
     </div>
            </fieldset>
        </div>
    </form>
</body>
</html>