<?php
include 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Doctors Profile</title>
 </head>
 <body>
 <div style="text-align: center;">
  <img src="images/Harvest-of-Tempe-Medical-Marijuana-Dispensary2.jpg" HEIGHT=600 WIDTH=1000 alt="Harvest-of-Tempe-Medical-Marijuana-Dispensary2"/>
  <h1>Doctors Profile.</h1>
 </div>
<?php
$query = 'SELECT
            dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day
        FROM
            doctors_info
        WHERE
            dr_id = ' . $_GET['id'];
    $result = mysql_query($query, $db) or die (mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
mysql_close($db);
?>
  <ul>
   <li>Doctor Id................: <?php echo $dr_id; ?></li>
   <li>Name of Doctor......: <?php echo $dr_name; ?></li>
   <li>Category.................: <?php echo $category; ?></li>
   <li>Qualification............: <?php echo $degree; ?></li>
   <li>Chamber Location.: <?php echo $chamber; ?></li>
   <li>Contact No...........: <?php echo $contact_no; ?></li>
   <li>Visit Time..............: <?php echo $visit_time; ?></li>
   <li>Visiting Day...........: <?php echo $week_day; ?></li>
  </ul>
   <p><a href="index.php">Click here</a> to return to the home page.</p>
 </body>
</html>