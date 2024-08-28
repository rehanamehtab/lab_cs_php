<?php

session_start();

if (!isset($_SESSION['username'])) {
  header("location: index.php");
  exit;  
}


$connect = mysqli_connect("localhost","root","","lab_cs");
$query = "SELECT * FROM users";
$query_result = mysqli_query($connect,$query);
$data = mysqli_fetch_all($query_result,MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html>
<head>
	<style>
           *{margin: 0px;
             padding: 0px;}
          #spn a{text-decoration: none;
                  font-size: 30px;
                  display: none;}
        #header{border: 1px solid;
                }
        #header ul {
                   float: right;}
        #header ul a{padding-right: 20px;
                     font-size: 30px;
                     text-decoration: none;}
        #header h1{ padding-left: 10px;
                    width: 200px;
                    float: left;}
		#tab{background-color: ;
		      margin: auto;
                border-radius: 50px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 15px;
                padding-right: 15px;}
         #trfirst td{background-color: #3776ff;
                    padding: 10px;}

          #trtwo td{padding: 10px;
                    border-radius: 50px;
                    background-color: powderblue;}
          #h3{font-size: 20px;
              border: 1px solid;
              width: 600px;
               margin: auto;
               margin-top: 100px;
                text-align: center;
                background-color: lightblue;
                border-radius: 10px;}
	</style>
</head>
<body  style="background-color:rgb(242, 243, 247) ;">


         <div id="header">
        <h1>HOME</h1>
        <ul>
            <a id="had" onclick="out()"><?php echo  $_SESSION['username']; ?></a>
            <a href="studenthome.php">student</a>
             <span id="spn"><a  href="index.php">logout</a></span>
        </ul>
        <div style="clear:both;"></div>

       
    </div>
    <div id="h3">
    <h3>All-Student and Teachers</h3>
   </div>
     <table border="1" id="tab">
      	
          <tr id="trfirst">
          	<td>id</td>
          	<td>Name</td>
          	<td>Email</td>
          	<td>password</td>
          	<td>Gender</td>
          	<td>Role</td>
          	<td>created_at</td>
          	
          </tr>
          <?php 

          foreach ($data as $row):

          ?>

          <tr id="trtwo">
          	<td><?php echo $row['id'];?></td>
          	<td><?php echo $row['username'];?></td>
          	<td><?php echo $row['email'];?></td>
          	<td><?php echo $row['password'];?></td>
          	<td><?php echo $row['gender'];?></td>
          	<td><?php echo $row['role'];?></td>            
          	<td><?php echo $row['created_at'];?></td>
          </tr>
          <?php 
            endforeach;
          ?>
      </table>
      <script>
     function out(){
          document.getElementById('spn')
          document.getElementById('had')
        had.innerHTML = spn.innerHTML
     }
</script>
</body>
</html>