
<?php
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

$action = 'Add';

$doctor = array('dr_id' => '',
                   'dr_name' => '',
                   'category' => '',
                   'degree' => '',
				   'chamber' => '',
                   'contact_no' => '',
                   'visit_time' => '',
                   'week_day' => '');
$Doctor_powers = array();
$rivalries = array();

// validate incoming Doctor id value
	$doctor_id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? 
    $_GET['id'] : 0;

// retrieve information about the requested Doctor
if ($doctor_id != 0) {
    $query = 'SELECT
            dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day
        FROM
            doctors_info
        WHERE
            dr_id = ' . $_GET['id'];
    $result = mysql_query($query, $db) or die (mysql_error($db));
    
    if (mysql_num_rows($result) > 0) {
        $action = 'Edit';
        $doctor = mysql_fetch_assoc($result);
    }
    mysql_free_result($result);
}
   
?>

<html>
 <head>
 <div style="text-align: center;">
<img src="images/hgh-doctors-group.jpg" alt="hgh-doctors-group"/>
 
  <title><?php echo $action; ?> Doctors Profile</title>
  <style type="text/css">
td { vertical-align: top; }
  </style>
 </head>
 <body>
  <h1>Doctors Profile</h1>
  <h2><?php echo $action; ?> Doctor</h2>
  <hr style="clear: both;"/>
  <form action="transaction.php" method="post">
   <table>
    <tr>
     <td>Doctor Id:</td>
     <td><input type="text" name="dr_id" size="40" maxlength="40"
       value="<?php echo $doctor['dr_id'];?>"></td>
    </tr><tr>
     <td>Name of Doctor:</td>
     <td><input type="text" name="dr_name" size="40" maxlength="80"
       value="<?php echo $doctor['dr_name'];?>"></td>
    </tr><tr>
	<td>Category:</td>
     <td><input type="text" name="category" size="40" maxlength="80"
       value="<?php echo $doctor['category'];?>"></td>
    </tr><tr>
	<td>Qualification:</td>
     <td><input type="text" name="degree" size="40" maxlength="80"
       value="<?php echo $doctor['degree'];?>"></td>
    </tr><tr>
	<td>Chamber Location:</td>
     <td><input type="text" name="chamber" size="40" maxlength="80"
       value="<?php echo $doctor['chamber'];?>"></td>
    </tr><tr>
	<td>Contact No.:</td>
     <td><input type="text" name="contact_no" size="40" maxlength="80"
       value="<?php echo $doctor['contact_no'];?>"></td>
    </tr><tr>
	<td>Visit Time:</td>
     <td><input type="text" name="visit_time" size="40" maxlength="80"
       value="<?php echo $doctor['visit_time'];?>"></td>
    </tr><tr>
	<td>Visit Day:</td>
     <td><input type="text" name="week_day" size="40" maxlength="80"
       value="<?php echo $doctor['week_day'];?>"></td>
    </tr><tr>

<?php
// retrieve and present the list of existing Doctors (excluding the Doctor
// being edited)
$query = 'SELECT
        dr_id
    FROM
        doctors_info
    WHERE  
        dr_id != ' . $doctor_id . '
    ORDER BY
        dr_id ASC';
$result = mysql_query($query, $db) or die (mysql_error($db));

?>
     </td>
    </tr><tr>
     <td colspan="2">
      <input type="submit" name="action"
       value="<?php echo $action; ?> Doctor" />
      <input type="reset" value="Reset">
<?php
if ($action == "Edit") {
    echo '<input type="submit" name="action" value="Delete Doctor" />';
    echo '<input type="hidden" name="doctor_id" value="' . 
        $doctor_id . '" />';
}
?>
   </table>
  </form>
  <p><a href="doctor_list.php">Return to Home Page</a></p>
 </body>
</html>