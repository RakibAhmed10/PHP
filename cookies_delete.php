<?php
// Cookies expired sometime in the past
$expire = time() - 1000;

setcookie('username', null, $expire);
setcookie('remember_me', null, $expire);

header('Refresh: 5; URL=cookies_test.php');
?>
<html>
 <head>
  <title>Cookies Test (Delete)</title>
 </head>
 <body>
  <h1>Deleting Cookies</h1>
  <p>You will be redirected to the main test page in 5 seconds.</p>
  <p>If your browser doesn't redirect you automatically, 
   <a href="cookies_test.php">click here</a>.</p>
 </body>
</html>