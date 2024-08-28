<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body style="background-color: rgb(201 81 197 / 46%);">
    <?php
    session_start();
   if (isset($_POST['submit'])) {
      
       $email = $_POST['email'];
       $password = $_POST['password'];
       $mysqli = new mysqli("localhost","root","","lab_cs");
       $query = "Select * from users where email='".$email."' and password='".$password."'";
       $result = $mysqli -> query($query);
       $row = mysqli_fetch_assoc($result);
       if ($row["user_name"]!='') {
            echo "Login Success ";
            echo "<br>";
           
            if($row["role"] =='admin'){
               
                $_SESSION['id']=$row["id"];
                $_SESSION['username']=$row["user_name"];
                $_SESSION['role']=$row["role"];
                $_SESSION['gender']=$row["gender"];
                header("location:admindashboard.php");
            }
            else if($row["role"] =='student'){
               
                $_SESSION['id']=$row["id"];
                $_SESSION['username']=$row["user_name"];
                $_SESSION['role']=$row["role"];
                $_SESSION['gender']=$row["gender"];
                header("location:studenthome.php");
            }else if($row["role"] =='teacher'){
                $_SESSION['id']=$row["id"];
                $_SESSION['username']=$row["user_name"];
                $_SESSION['role']=$row["role"];
                $_SESSION['gender']=$row["gender"];
                header("location:teacherhome.php");
                
            }
        }
       else{
           echo "Some thing worng";
       }
        
   
   }else{
    
    session_destroy();
   }
   
    ?>
    <form action="" method="post">
        <div style="margin-left: 30%;margin-top: 10%;">
        <h3 style="color: #ffff;">Welcome to Login</h3>
            <fieldset style="width:400px;background-color:#bcd8e3;align-items: center;text-align: center;position: relative;font-size: 20px;">
                <label for="User Name">Email</label>
                <input type="email" name="email" placeholder="Enter User Name"style="/* margin-left: 42%; */width: 90%;font-size: 18px;" require><br/>
                <br/>
                <label for="User Password">Password</label>
                <input type="password" name="password" placeholder="Enter password.." style="/* margin-left: 42%; */width: 90%;font-size: 18px;" require><br/><br/>
                <input type="submit" name="submit" value="Login" style="margin-left: 78%; font-size: 18px;"/>
                <a href="register.php" style="font-size: 16px; color:green;">Register New User</a>
            </fieldset>
        </div>
    </form>
</body>
</html>