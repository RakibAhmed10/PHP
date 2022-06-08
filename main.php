<?php
session_start();
?>
<html>
 <head>
  <title>Logged In</title>
  <div style="text-align: center;">
  <img src="images/Harvest-of-Tempe-Medical-Marijuana-Dispensary2.jpg" HEIGHT=600 WIDTH=1000 alt="Doctors Logo copy"/>
  <h1>Welcome to System Administration of Doctors info</h1>
 </head>
 <body>
  
<?php
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
?>
  <p>Thank you for logging into our system, <b><?php 
echo $_SESSION['username'];?>.</b></p> 
 <p><a href="doctor_list.php">Doctor Administration</a></p>
  <p><a href="user_personal.php">Personal information</a> </p>
<?php
    if ($_SESSION['admin_level'] > 0) {
        echo '<p><a href="admin_area.php">Administrator Tool</a></p>';
    }
} else {
?>
  <p>You are currently not logged in to our system. Once you log in,
you will have access to your personal area along with other user
information.</p>
  <p>If you have already registered, <a href="login.php">click
here</a> to log in. Or if you would like to create an account, 
<a href="register.php">click here</a> to register.</p>
<?php
}
?>