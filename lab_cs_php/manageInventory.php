<?php

session_start();

if (!isset($_SESSION['username'])) {
  header("location:index.php");
  exit;  
}

if (isset($_POST['submit'])) {
    echo
	$deviceNo = $_POST['deviceNo'];
	$deviceModal = $_POST['deviceModal'];
	$category = $_POST['category'];
	$brand = $_POST['brand'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$type = $_POST['type'];
	$status = $_POST['status'];
	$submit = $_POST['submit'];

	$connect = mysqli_connect("localhost","root","","lab_cs");
	$query = "INSERT INTO inventory (deviceNo,deviceModal,category,brand,description,quantity,type,status)
	VALUES('$deviceNo','$deviceModal','$category','$brand','$description','$quantity','$type','$status')";
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
$query = "SELECT * FROM inventory";
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
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
    <a href="borrowItem.php">Borrower Item</a>
    <a href="roommanage.php" >Room Management</a>
    <a href="manageinventory.php" class="active">Manage Inventory</a>
    <a href="admindashboard.php">All Users</a>
    <a href="index.php">Logout</a>
  </div>
</div>
   <button id="myBtn">Add Item</button>
   <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div>
  <form action="" method="post">  
  <h3>Add Item</h3>  
  <div class="form-group">
    <label>Device No</label>
    <input type="text" className="form-control" id="deviceNo" name= "deviceNo" placeholder="Device No" required />
  </div>
  <div class="form-group">
    <label>Modal</label>
    <input type="text" className="form-control" id="deviceModal" name= "deviceModal" placeholder="Modal" required />
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" id="category" required>
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
  <div class="form-group">
    <label>Brand</label>
    <input type="text" className="form-control" id="brand" name= "brand" placeholder="Brand" required/>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea id="w3review" className="form-control" id="description" name= "description" rows="4" cols="50" required></textarea>
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" className="form-control" id="quantity" name= "quantity" placeholder="Quantity" required />
  </div>
  <div class="form-group">
    <label>Type</label>
    <select name="type" id="type" required>
                     <option value="Consumeable">Consumeable </option>
                     <option value="non-consumeable">non-consumeable </option>
               </select> 
  </div>
  <div class="form-group">
    <label>Status</label>
    <select name="status" id="status" required>
                     <option value="new">new </option>
                     <option value="new">new </option>
               </select> 
  </div>
 
  <button type="submit" name="submit" value="Submit">Create Item</button>
  </form>

 
</div>
  </div>

</div>
<div style="padding-left:20px">

<div id="h3">
<h3>All Inventory</h3>
</div>
 <table id="users">
      
      <tr id="trfirst">
          <td>id</td>
          <td>deviceNo</td>
          <td>deviceModal</td>
          <td>category</td>
          <td>brand</td>
          <td>description</td>
          <td>quantity</td>          	
          <td>type</td>          	
          <td>status</td>          	
      </tr>
      <?php 

      foreach ($data as $row):

      ?>
      <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['deviceNo'];?></td>
          <td><?php echo $row['deviceModal'];?></td>
          <td><?php echo $row['category'];?></td>
          <td><?php echo $row['brand'];?></td>
          <td><?php echo $row['description'];?></td>      
          <td><?php echo $row['quantity'];?></td>      
          <td><?php echo $row['type'];?></td>      
          <td><?php echo $row['status'];?></td>      
      </tr>
      <?php 
        endforeach;
      ?>
  </table>


</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>