<?php

session_start();

if (!isset($_SESSION['username'])) {
  header("location:index.php");
  exit;  
}

if (isset($_POST['submit'])) {
    echo
	$item_borrow = $_POST['item_borrow'];
	$room = $_POST['roomNo'];
	$date = $_POST['date'];
	$username = $_SESSION['username'];
	$role = $_SESSION['role'];
	$date = $_POST['date'];
	$submit = $_POST['submit'];

	$connect = mysqli_connect("localhost","root","","lab_cs");
	$query = "INSERT INTO borrow (borrower_name,type,datetime,item_borrow,room)
	VALUES('$username','$role','$date','$item_borrow','$room')";
	$query_result = mysqli_query($connect,$query);
	if ($query_result == 1) {
	 	echo "Registration succesfull submitted ";
	 	echo "<br>";
       // header("location:index.php");
       header('location: manageinventory.php');
      
	 }
	else{
		echo "Some thing worng";
	}
	 

}


$connect = mysqli_connect("localhost","root","","lab_cs");
$query = "SELECT * FROM borrow";
$query_result = mysqli_query($connect,$query);
$data = mysqli_fetch_all($query_result,MYSQLI_ASSOC);

//logout 
if(isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>

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

form {
  display: grid; /* to use css-grid */
  grid-template-columns: 1fr 1fr; /* creates 2 columns */
  gap: 20px; /* creates a gap between the columns and rows */
}

form h3,
form h4,
form p,
form button {
  grid-column: span 2; /* lets those elements span both columns */
}

.form-group {
  display: flex;
  flex-direction: column;
  /* flexbox is sued to palce the label and input below each other and allows the input to fill out the entrie width */
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
<body >
<div class="header">
  <a href="#default" class="logo">Admin Dashboard</a>
  <div class="header-right">
  <a type="button"><?php echo  $_SESSION['username']; ?></a>
    <a href="reservationlist.php">All Reservation</a>
    <a href="borrowItem.php"class="active">Borrower Item</a>
    <a href="roommanage.php" >Room Management</a>
    <a href="manageinventory.php">Manage Inventory</a>
    <a href="admindashboard.php">All Users</a>
    <a href="index.php">Logout</a>
  </div>
</div>
  
<div style="padding-left:20px">

<div id="h3">
<h3>All Borrowed Items</h3>
</div>
 <table id="users">
      
      <tr id="trfirst">
          <td>id</td>
          <td>Borrower Name</td>
          <td>Type</td>
          <td>Datetime</td>
          <td>Item orrow</td>
          <td>Room </td>	
      </tr>
      <?php 

      foreach ($data as $row):

      ?>
      <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['borrower_name'];?></td>
          <td><?php echo $row['type'];?></td>
          <td><?php echo $row['datetime'];?></td>
          <td><?php echo $row['item_borrow'];?></td>
          <td><?php echo $row['room'];?></td>
      </tr>
      <?php 
        endforeach;
      ?>
  </table>

  <form action="" method="post">  
  <h3>Add Borrow item</h3>  
  <div class="form-group">
    <label>Room</label>
    <input type="text" className="form-control" id="roomNo" name= "roomNo" placeholder="Room No" required />
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" className="form-control" id="date" name= "date"  required />
  </div>
  <div class="form-group">
    <label>Item</label>
    <select name="item_borrow" id="item_borrow" required>
                     <option value="mouse">monitor </option>
                     <option value="mouse">mouse </option>
                     <option value="cpu">cpu</option>
                     <option value="keyboard">keyboard </option>
                     <option value="printer"> printer</option>
                     <option value="scanner">scanner </option>
                     <option value="projecter">projecter </option>
                     <option value="headphone">headphone</option>
               </select> 
  </div>
  <button type="submit" name="submit" value="Submit">Create Borrowed Item</button>
  </form>
</div>
</body>
</html>