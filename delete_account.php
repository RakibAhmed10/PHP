<?php
include 'auth.inc.php';
include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

if (isset($_POST['submit']) && $_POST['submit'] == 'Yes') {
    $query = 'DELETE i FROM
            site_user u JOIN site_user_info i ON u.user_id = i.user_id
        WHERE u.username="' .
        mysql_real_escape_string($_SESSION['username'], $db) . '"';
    mysql_query($query, $db) or die(mysql_error($db));

    $query = 'DELETE FROM site_user WHERE username="' .
        mysql_real_escape_string($_SESSION['username'], $db) . '"';
    mysql_query($query, $db) or die(mysql_error($db));

    $_SESSION['logged'] = null;
    $_SESSION['username'] = null;
?>
<html>
 <head>
  <title>Delete Account</title>
 </head>
 <body>
  <p><strong>Your account has been deleted.</strong></p>
  <p><a href="main.php">Click here</a> to return to the homepage.</a></p>
 </body>
</html>
<?php
    mysql_close($db);
    die();
} else {
?>
<html>
 <head>
  <title>Delete Account</title>
  <script type="text/javascript">
   window.onload = function() {
       document.getElementById('cancel').onclick = goBack;
   }
   function goBack() {
       history.go(-1);
   }
  </script>
 </head>
 <body>
  <p>Are you sure you want to delete your account?</p>
  <p><strong>There is no way to retrieve your account once you 
confirm!</strong></p>
  <form action="delete_account.php" method="post">
   <div>
    <input type="submit" name="submit" value="Yes"/>
    <input type="button" id="cancel" value=" No " onclick="history.go(-1);"/>
   </div>
  </form>
 </body>
</html>
<?php
}
?>