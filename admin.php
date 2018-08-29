



<?php include("server.php");?>
<?php session_start(); ?>
<?php
if(empty($_SESSION["logged"])){
  
   header("Location: index.php");
}
include('logout.php');

?>





<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "tech_support";
$conn = mysqli_connect($server,$username,$password,$dbname);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>



  
  <link rel="stylesheet" type="text/css" href="css/public.css">


<header>
<div class="main">
  <div class="topnav">
    <div class="nametxt">
      <h1>Redoran Tech Support</h1>
    </div>
        <div class="navbar">
            <ul class="ul"> 
            <li class="active"><a href="#">EDIT</a></li>
            <li><a href="technecians.php">TECHNECIANS</a></li>
            <li><a href="users.php">USERS</a></li>
            <li><a href="complains.php">COMPLAINS</a></li>
      </ul>
  </div>
</div>
</div>
</header>


		
		
		
				
                    

				<center><form action="admin.php" method="post">
                    <fieldset class="fieldset-auto-width" >
                        <legend>
                    
                    
                    Enter Name to delete or add:
                        </legend> 
					<input type="text" name="name">
                </fieldset><br><br>

                    <button type="submit" name="delete">Delete technician</button><br><br>

                    <fieldset class="fieldset-auto-width" >
                        <legend>


					Enter field to add:</legend> 
					<input type="text" name="field"></fieldset><br><br>
                    
                    <fieldset class="fieldset-auto-width" >
                        <legend>
                    Enter address to add:</legend> 
                    <input type="text" name="address"></fieldset><br><br>
                    <fieldset class="fieldset-auto-width" >
                        <legend>
                    Enter phone to add: </legend>
                    <input type="text" name="phone"></fieldset><br><br>

                    <fieldset class="fieldset-auto-width" >
                        <legend>
                    Enter district to add: </legend>
                    <input type="text" name="district"></fieldset><br><br>
                    
					
					<button type="submit" name="add">Add new technician</button>
               
            
				</form>

                <form action ="index.php" method="post">
                <button type="submit" name="logout"><a href="home.php?logout='1'">LOGOUT</a></button>
                
                </form>
                </fieldset>
            </center>
                
				</div>

			</div>
		</div>

		


<?php
	if (null !==(filter_input(INPUT_POST, 'delete'))){
        $name=$_POST['name'];
        $sql1 = "DELETE FROM technecians WHERE name='$name';";
        $result2 = mysqli_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully deleted!\");</script>";
        }
    }
    if (null !==(filter_input(INPUT_POST, 'add'))){
        $name=$_POST['name'];
        $field=$_POST['field'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $district=$_POST['district'];






        $sql1 = "INSERT INTO technecians(name,field,address,phone,district)  VALUES ('$name','$field','$address','$phone','$district');";
        $result2 = mysqli_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully added!\");</script>";
        }
    }
	$mysqli_close = mysqli_close($conn);
?>