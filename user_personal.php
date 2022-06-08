<?php
include 'auth.inc.php';
include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Personal Info</title>
 </head>
 <body>
  <h1>Welcome to your personal information area.</h1>
  <p>Here you can update your personal information, or delete your account.</p>
  <p>Your information as you currently have it is shown below.</p>
  <p><a href="main.php">Click here</a> to return to the home page.</p>
<?php
$query = 'SELECT
        username, first_name, last_name, city, state, email, hobbies 
    FROM
        site_user u JOIN
        site_user_info i ON u.user_id = i.user_id
    WHERE
        username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
mysql_close($db);
?>
  <ul>
   <li>First Name: <?php echo $first_name; ?></li>
   <li>Last Name: <?php echo $last_name; ?></li>
   <li>City: <?php echo $city; ?></li>
   <li>State: <?php echo $state; ?></li>
   <li>Email: <?php echo $email; ?></li>
   <li>Hobbies/Interests: <?php echo $hobbies; ?></li>
  </ul>
  <p><a href="update_account.php">Update Account</a> | 
   <a href="delete_account.php">Delete Account</a></p>
 </body>
</html>