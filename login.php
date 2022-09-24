<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="sql_prevention";
// Connection
$conn = new mysqli($servername,
		$username, $password, $db_name);

// For checking if connection is
// successful or not
if ($conn->connect_error) {
die("Connection failed: "
	. $conn->connect_error);
}
//echo "Connected successfully";

 
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username=$_POST['name'];
  $passwd=$_POST['passwd'];
  

            //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $passwd = stripcslashes($passwd);  
        $username = mysqli_real_escape_string($conn, $username);  
        $passwd = mysqli_real_escape_string($conn, $passwd);  
      
        $sql = "select * from admin where username = '$username' and passwd = '$passwd'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            include('cart.html');
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";
            include('admin.html');  
        }   
      }


?>

 

