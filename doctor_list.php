<html>
 <head>
 <title>Doctors Information!</title>
  <div style="text-align: center;">
  <img src="images/hgh-doctors-group.jpg" HEIGHT=600 WIDTH=1000 alt="hgh-doctors-group"/>
  <h1>Welcome to Doctors info of Khulna City</h1>
  
  <style type="text/css">
   th { background-color: #999; }
   td { vertical-align: top; }
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 
  <hr style="clear: both;"/>
<?php
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

// determine sorting order of table
$order = array(1 => 'dr_id ASC',
               2 => 'dr_name ASC',
               3 => 'category ASC, dr_id ASC');

$o = (isset($_GET['o']) && ctype_digit($_GET['o'])) ? $_GET['o'] : 1;
if (!in_array($o, array_keys($order))) {
    $o = 1;
}

// select list of characters for table
$query = 'SELECT
        dr_id, dr_name, category, degree, chamber
    FROM 
        doctors_info
    ORDER BY ' . $order[$o];
$result = mysql_query($query, $db) or die (mysql_error($db));

if (mysql_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr><th><a href="' . $_SERVER['PHP_SELF'] . '?o=1">Sl No</a></th>';
	echo '<th>Doctors Photo</th>';
    echo '<th><a href="' . $_SERVER['PHP_SELF'] . '?o=2">Name of Doctors</a></th>';
    echo '<th><a href="' . $_SERVER['PHP_SELF'] . '?o=3">category</a></th>';
    echo '<th>Qualification</th>';
    echo '<th>Chamber</th></tr>';

    $odd = true;    // alternate odd/even row styling
    while ($row = mysql_fetch_array($result)) {
        echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
        $odd = !$odd; 
        echo '<td style="width:5%;"> <a href="edit.php?id=' . $row['dr_id'] .
            '">' . $row['dr_id'] . '</a></td>';
		echo '<td style="text-align: center; width:100px;"><a href="' .
        'edit.php?id=' . $row['dr_id'] .
        '"><img src="images/' . $row['dr_id'] .'.jpg" alt="' . $row['dr_id'] .
        '"/></a></td>';	
        echo '<td style="width:30%;">' . $row['dr_name'] . '</td>';
        echo '<td style="width:15%;">' . $row['category'] . '</td>';
		echo '<td style="width:30%;">' . $row['degree'] . '</td>';
		echo '<td style="width:30%;">' . $row['chamber'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

} else {
    echo '<p><strong>No Doctor entered...</strong></p>';
}
?>
  <p><a href="edit.php">Add New Doctor</a></p>
 </body>
</html>