<?php

session_start();





if (!isset($_SESSION['username'])) {
  header("location:index.php");
  exit;  
}

$connect = mysqli_connect("localhost","root","","lab_cs");
$query = "SELECT * FROM labsystem";
$query = "SELECT id, studentname, studentID, category, modal, brand, quantity, status, duration FROM labsystem";

$query_result = mysqli_query($connect,$query);
$data = mysqli_fetch_all($query_result,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 10px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 15px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 15px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
 
}
#users {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>


<div class="header">
  <a href="#default" class="logo">Admin Dashboard</a>
  <div class="header-right">
  <a type="button"><?php echo  $_SESSION['username']; ?></a>
    <a href="reservationlist.php" class="active">All Reservation</a>
    <a href="borrowItem.php">Borrower Item</a>
    <a href="roommanage.php">Room Management</a>
    <a href="manageinventory.php">Manage Inventory</a>
    <a class="active">All Users</a>
    <a href="index.php">Logout</a>
  </div>
</div>
<div style="padding-left:20px">

    <div id="h3">
    <h3>Reservation List</h3>
   </div>
     <table id="users">
      	
          <tr id="trfirst">
          	<td>id</td>
          	<td>Name</td>
          	<td>Student ID</td>
          	<td>Category</td>
          	<td>Modal</td>
          	<td>Brand</td>          	
          	<td>Quantity</td>          	
          	<td>Status</td>          	
          	<td>Duration</td>          	
          </tr>
          <?php 

          foreach ($data as $row):

          ?>

          <tr>
          	<td><?php echo $row['id'];?></td>
          	<td><?php echo $row['studentname'];?></td>
          	<td><?php echo $row['studentID'];?></td>
          	<td><?php echo $row['category'];?></td>
          	<td><?php echo $row['modal'];?></td>
          	<td><?php echo $row['brand'];?></td>      
          	<td><?php echo $row['quantity'];?></td>      
          	<td><?php echo $row['status'];?></td>      
          	<td><?php echo $row['duration'];?></td>      
          </tr>
          <?php 
            endforeach;
          ?>
      </table>
    

</div>
<script>
     function out(){
          document.getElementById('spn')
          document.getElementById('had')
        //had.innerHTML = spn.innerHTML
     }
</script>
</body>
</html>
