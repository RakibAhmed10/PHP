<div style="text-align: center;">
<img src="o-DOCTORS-facebook.jpg" HEIGHT=500 WIDTH=1000 alt="o-DOCTORS-facebook"/>
<h1>Doctor Delete</h1>
<?php
$db = mysql_connect('localhost', 'root', 'fiufiu') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Doctors', $db) or die(mysql_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'doctor':
        echo 'Are you sure you want to delete this doctor?<br/>';
        break;
    case 'people':
        echo 'Are you sure you want to delete this person?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="admin.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE movie SET
                movie_leadactor = 0 
            WHERE
                movie_leadactor = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));

        $query = 'DELETE FROM people 
            WHERE
                people_id = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));
?>
<p style="text-align: center;">Your person has been deleted.
<a href="movie_index.php">Return to Index</a></p>
<?php
        break;
    case 'doctor':
        $query = 'DELETE FROM doctors_info 
            WHERE
                dr_id = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));
?>
<p style="text-align: center;">Your doctor has been deleted.
<a href="Admin.php">Return to Index</a></p>
<?php
        break;
    }
}
?>