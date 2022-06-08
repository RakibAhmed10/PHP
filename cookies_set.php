<?php
// Cookies may expire 30 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30);

setcookie('username', 'test_user', $expire);
setcookie('remember_me', 'yes', $expire);

header('Refresh: 5; URL=cookies_test.php');
?>
<html>
 <head>
  <title>Cookies Test (Set)</title>
 </head>
 <body>
  <h1>Setting Cookies</h1>
  <p>You will be redirected to the main test page in 5 seconds.</p>
  <p>If your browser doesn't redirect you automatically, 
   <a href="cookies_test.php">click here</a>.</p>
 </body>
</html>