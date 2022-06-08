<html>
 <head>
  <title>Cookies Test (View)</title>
 </head>
 <body>
  <h1>These cookies are set</h1>
<?php
if (!empty($_COOKIE)) {
    echo '<pre>';
    print_r($_COOKIE);
    echo '</pre>';
} else {
    echo '<p>No cookies are set.</p>';
}
?>
  <p><a href="cookies_test.php">Back to main test page</a></p>
 </body>
</html>