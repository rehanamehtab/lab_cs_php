<?php

session_start();

if (!isset($_SESSION['username'])) {
  header("location:index.php");
  exit;  
}
if (isset($_POST['save'])) {
       $studentn = $_POST['studentname'];
      $studentid = $_POST['studentID'];
      $category = $_POST['category'];
      $modal = $_POST['modal'];
      $brand = $_POST['brand'];
      $quantity = $_POST['quantity'];
      $status = $_POST['status'];
      $duration = $_POST['duration'];
      $connect = mysqli_connect("localhost","root","","lab_cs");
      $query = "INSERT INTO labsystem (studentname,studentID,category,modal,brand,quantity,status,duration)
        VALUES('$studentn','$studentid','$category','$modal','$brand','$quantity','$status','$duration')";
      $query_result = mysqli_query($connect,$query);
      if ($query_result == 1) {

            echo "Your Request Submitted Successfuly..";
            echo "<br>";
       }
      else{
            echo "Some Thing Wrong";
      }
}
?>
<!DOCTYPE html>
<html>
<head>

	<style>
	*{padding: 0px;
	  margin: 0px;}	

	#header{
	        text-align: center;
	        color: rgb(0, 0, 0, 0.5);
	        font-size: 30px;}

	 #li li{display: inline-block;
	        margin-bottom: 20px;
            padding-left: 10px;
            padding-right: 10px;
	        background-color: rgb(0, 0, 0, 0.2);
	        color: white;}
     #ul-div{
            margin-top: 20px;}
    #main-div{margin-bottom: 30px;}
    #monitor{width: 200px;
             height: 200px;
             margin-top: px;
             margin-left: 100px;}
    #mouse{width: 200px;
             height: 200px;
             margin-top: px;

             margin-left: 50px;}

             
    #cpu{width: 200px;
             height: 200px;
             margin-top: px;

             margin-left: 50px;}

    #key{width: 200px;
             height: 200px;
             margin-top: px;

             margin-left: 50px;}
             #form{margin-left: 100px;
          padding_left: 50px;}
    #inputone{margin-left:20px; }
    #inputtwo{margin-left: 15px;}
    #inputthree{margin-left: 20px;}
    #input{margin-left: 22px;}
    #inputlast{margin-left: 25px;}
    #inputtwolast{margin-left: 20px;}
    #inp{margin-left: 8px;}
    #inpm{margin-left: 20px;}
    #fom{
         background-color: rgb(0, 0, 0, 0.1);
         box-shadow: 4px 8px 8px rgb(0, 0, 0, 0.5);
          margin-top: 50px;
          margin-bottom: 30px;
         width: 600px;
          padding-left: 50px;
         padding-top: 20px;
         padding-bottom: 20px;
         border-radius: 50px;
         margin-left: 280px;}
    #category{width: 187px;
              padding: 10px;
              margin-left: 8px;
              margin-bottom: 20px;}
    #modal{width: 188px;
           margin-left: 15px;
           padding: 10px;
           margin-bottom: 20px;}
    #brand{width: 187px;
           margin-left: 25px;
           padding: 10px;
            margin-bottom: 20px;}
    #quantity{width: 188px;
           margin-left: 4px;
           padding: 10px;
           margin-bottom: 20px;}
    #status{width: 188px;
           margin-left: 22px;
           padding: 10px;}
     #button{padding: 10px;} 
     #name{margin: 0px;
           margin-bottom: 20px;}
     #id{margin: 0px;
         margin-left: 20px;
         margin-bottom: 20px;}

  #sub{padding-top: 20px;
       padding-bottom: 20px;
           padding-left: 55px;
           padding-right: 55px;
             margin-left: 210px;
             border-radius: 10px;
             border-inline: none;
             background-color: transparent;}
    
   #name{margin: 10px;
         padding: 10px;
         margin-left: px;}
    #id{margin-left: 15px;
        padding: 10px;
        }

    #ultwo li{display: inline-block;
            margin-bottom: 20px;
             padding-left: 10px;
            padding-right: 10px;
            background-color: rgb(0, 0, 0, 0.2);
            color: white;}
    #time{padding: 10px;
          margin-left:20px; }
    #cat{margin-left: px;}
    #mod{margin-left: 10px;}
    #quan{margin-left: 10px;}
    #stud{margin-left: 6px;}
    #Time{margin-left: 20px;}
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
  line-height: 25px;
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
	</style> 

</head>
<body style="background-color: rgb(201 81 197 / 46%);">
<div class="header">
  <a href="#default" class="logo">Student / Teacher Dashboard</a>
  <div class="header-right">
  <a type="button"><?php echo  $_SESSION['username']; ?></a>
  <a href="fac_stuborrowItem.php">Borrower Item</a>
    <a type="button" class="active"> Reserve Student/Teacher Page</a>
    <a href="index.php">Logout</a>
  </div>
</div>

 <div id="ul-div">
     <ul id="li">
                   <li style="margin-left: 140px; font-size: 30px;">Monitor</li>
                   <li style="margin-left: 140px;  font-size: 30px;">Mouse</li>
                   <li style="margin-left: 160px;  font-size: 30px;">CPU</li>
                   <li style="margin-left: 160px;  font-size: 30px;">keybord</li>

                  

             </ul>
       </div>
      <div id="main-div">
              
             <img id="monitor" src="./assets/monitor.jpg">
            
            
            <img id="mouse" src="./assets/mouse.jpg">
            

            <img id="cpu" src="./assets/cpu.jpg">
      

            <img id="key" src="./assets/keyboard.jpg">
            </div>
            <div id="ultwo">
            <ul>
                <li style="margin-left: 140px; font-size: 30px;">printer</li>
                <li style="margin-left: 140px;  font-size: 30px;">scanner</li>
                <li style="margin-left: 160px;  font-size: 30px;">projecter</li>
                <li style="margin-left: 160px;  font-size: 30px;">headphone</li>
            </ul>
        </div>
            <div>
            <img id="monitor" src="./assets/printer.jpg">
            <img id="mouse" src="./assets/scanner.jpg">
            <img id="cpu" src="./assets/projector.jpg">
            <img id="key" src="./assets/headphones.jpg">
            </div>
      	<form action="" method="POST" id="fom">

            
              <label>StuName</label>
              <input id="name" type="text" name="studentname" placeholder="stu-name">
              
              
              <label id="stud">stuId </label>
              <input id="id" type="text" name="studentID" placeholder="stu-id">
                <br>
               <label id="cat">Category</label>
               <select name="category" id="category" required>
                     <option>monitor </option>
                     <option>mouse </option>
                     <option>cpu</option>
                     <option>keyboard </option>
                     <option> printer</option>
                     <option>scanner </option>
                     <option>projecter </option>
                     <option>headphone</option>
               </select> 
              
              <label id="mod">Modal</label>
              
             <select name="modal" id="modal" required>
                   <option>23</option>
                   <option>12</option>
                   <option>14</option>
                   <option>13</option>
                   
             </select>
      		 <br>
              
               <label>Brand</label>
            
               <select name="brand" id="brand" required>
                   <option>toshiba</option>
                   <option>hb</option>
                   <option>lenow</option>
                   <option>dell</option>
                   
             </select>

              
               <label id="quan">Quantity</label>
               <select name="quantity" id="quantity" required>
                   <option>29</option>
                   <option>27</option>
                   <option>28</option>
                   <option>12</option>
                   
             </select>
               
                <br>
               <label>Status</label>
               <select name="status" id="status" required>
                   <option>new</option>
                   <option>old</option>
                   <option>new</option>
                   <option>old</option>
                   
             </select>
             <label id="Time">Time</label>
             <input id="time" type="text" name="duration" placeholder="time">
             
              
               <div id="button">
               	<input id="sub" type="submit" name="save" value="save">
               </div>

      		</div>
      		
      	</form>
      </div>
	
	
</body>
</html>