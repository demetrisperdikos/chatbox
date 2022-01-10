<?php
// Start the session

session_start();

// Checks that form was submitted

if($_SERVER['REQUEST_METHOD']=='POST')
    {
	
	 
	$conn = mysqli_connect("sql1.njit.edu", "dnp56", "Newark123!", "dnp56");

    if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
	
	

    if(isset($_POST['Name'],$_POST['Password'] ))	
      {
        
		$name = mysqli_real_escape_string($conn,trim($_POST['Name']));
		$pass = mysqli_real_escape_string($conn,trim($_POST['Password'])); 


	    $sign = "SELECT * FROM chat WHERE password = '$pass' AND name = '$name' ";
		
        
	     $up = mysqli_query($conn, $sign);
	

	     $result= mysqli_num_rows($up);
         



		 if($result>=1) 
		   {
               $_SESSION["name"] = $name;
            echo "<script type='text/javascript'>alert('Sign in succesful');</script>";
            header("Location: index.php");            
        } 

else{
    echo "<script type='text/javascript'>alert('Sign in failed, please check data');</script>";
            

}

        }
	  
   }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styler.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
    <title>Assignment 5</title>
</head>

<body>


    <div class="container">
        <div class="header">
            <h2>Make a Client’s Appointment</h2>
        </div>
        
		<form  action="sign.php" method="POST">
	
	
            <div class="form-group">
                <label for="">Name : </label>
            	<input  type = "text" id = "Name" name = "Name" placeholder = "Example: John" value="<?php if(isset($_POST['Name']))echo $_POST['Name']; ?>"/>
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <span></span>
            </div>

            <div class="form-group">
                <label for="">Password : </label>
               	<input  type = "text" id = "Password" name = "Password" placeholder = "Example: John123" value="<?php if(isset($_POST['Password']))echo $_POST['Password']; ?>"/>
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <span></span>
            </div>



            <br />
              <br />
              <br />
              <br />
			
			
		

            <button id='submit'>Submit</button>



        </form>
        

    </div>
    

</body>

</html>