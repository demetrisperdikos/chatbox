

<?php
include 'db.php';
session_start();

             $first = $_SESSION['name'];

?>





<!DOCTYPE html>
<html>
<head>




<script>
function chat_ajax()
{

    var req = new XMLHttpRequest();

    req.onreadystatechange = function()
    {
        if(req.readyState == 4 && req.status == 200)
        {
            document.getElementById('chat_box').innerHTML = req.responseText;              
        }
    }
    req.open('GET', 'chatbox.php', true);
    req.send();
}

setInterval(function(){chat_ajax()}, 500)

</script>



<title>Simple Chat Application</title>
<link rel="stylesheet" href="style.css" media="all" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="styles.css">


</head>



</head>
<body>
  
<div id="container">
  <div id="chat_box">



        </div>
        <form method="post" action="index.php">
           
   <textarea name="enter message" placeholder="Enter Message"></textarea>
   <input type="submit" name="submit" value="Send" />


        </form>
       

        <?php
        if(isset($_POST['submit']))
        {
             $first = $_SESSION['name'];
             $msg = $_POST['enter_message'];
         
            $sql = "INSERT INTO `chatbox`(`Name`, `msg`) VALUES ('$first','$msg')";
            mysqli_query($conn,$sql); 

         
        }
       
       
        ?>

</div>

</body>
</html>