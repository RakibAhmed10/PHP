<?php
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Doctors', $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Doctors Information!</title>
  <div style="text-align: center;">
  <img src="images/main_banner.jpg" HEIGHT=600 WIDTH=1000 alt="Doctors Logo copy"/>
  <h1>Welcome to Doctors info of Khulna City</h1>
  
  <style type="text/css">
   th { background-color: #999; }
   td { vertical-align: top; }
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
  
 </head>
 <body>
 
<?php

// determine sorting order of table
$order = array(1 => 'dr_id ASC',
               2 => 'dr_name ASC',
               3 => 'category ASC, dr_id ASC');

$o = (isset($_GET['o']) && ctype_digit($_GET['o'])) ? $_GET['o'] : 1;
if (!in_array($o, array_keys($order))) {
    $o = 1;
}

$query = 'SELECT * FROM Doctors_info ORDER BY ' . $order[$o];

$result = mysql_query($query, $db) or die (mysql_error($db));

if (mysql_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr><th><a href="' . $_SERVER['PHP_SELF'] . '?o=1">Sl No</a></th>';
    echo '<th><a href="' . $_SERVER['PHP_SELF'] . '?o=2">Name of Doctor</a></th>';
    echo '<th><a href="' . $_SERVER['PHP_SELF'] . '?o=3">Category</a></th>';
    echo '<th>Qualification</th>';
    echo '<th>Chamber</th></tr>';
	

$odd = true;
while ($row = mysql_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:5%;">'; 
    echo $row['dr_id']; 
	echo '<td style="width:30%;">';
	echo $row['dr_name'];
	echo '<td style="width:15%;">';
	echo $row['category'];
	echo '<td style="width:20%;">';
	echo $row['degree'];
	echo '<td style="width:20%;">';
	echo $row['chamber'];
    echo '</td><td>';
	echo ' <a href="doctor.php?action=edit&id=' . $row['dr_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=doctor&id=' . $row['dr_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
}
?>
 
  </table>
  <table style="width:100%;">
  <tr>
   <th colspan="1"> Doctors List <a href="doctor.php?action=add">[ADD]</a></th>
  </tr>
 </body>
</html>