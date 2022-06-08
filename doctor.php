<div style="text-align: center;">
<img src="hgh-doctors-group.jpg" alt="hgh-doctors-group"/>
 <h1>Doctors Profile</h1>
<?php
$db = mysql_connect('localhost', 'root', 'fiufiu') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('doctors', $db) or die(mysql_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day
        FROM
            doctors_info
        WHERE
            dr_id = ' . $_GET['id'];
    $result = mysql_query($query, $db) or die(mysql_error($db));
    extract(mysql_fetch_assoc($result));
} else {
    //set values to blank
    $dr_id = '';
    $dr_name = '';
	$category = '';
	$degree = '';
	$chamber = '';
	$contact_no = '';
	$visit_time = '';
	$week_day = '';
	
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> doctor</title>
 </head>
 <body>
 
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=doctor"
   method="post">
   <table>
     <tr>
    
	<td>Doctor Id</td> 
	 <td><input type="text" name="dr_id"
      value="<?php echo $dr_id; ?>"/></td>
    </tr>
	<tr>
     
	<td>Doctor Name</td
	<tr>
	<td><input type="text" size=40 name="dr_name"
      value="<?php echo $dr_name; ?>"/></td>
    </tr>
	
	<td>Category</td
	<tr>
	<td><input type="text" name="category"
      value="<?php echo $category; ?>"/></td>
    </tr>

	<td>Qualification</td
	<tr>
	<td><input type="text" size=40 name="degree"
      value="<?php echo $degree; ?>"/></td>
    </tr>

	<td>Chamber</td
	<tr>
	<td><input type="text" size=40 name="chamber"
      value="<?php echo $chamber; ?>"/></td>
    </tr>
	
	<td>Contact No</td
	<tr>
	<td><input type="text" name="contact_no"
      value="<?php echo $contact_no; ?>"/></td>
    </tr>
	
	<td>Visit Time</td
	<tr>
	<td><input type="text" name="visit_time"
      value="<?php echo $visit_time; ?>"/></td>
    </tr>

	<td>Visit Day</td
	<tr>
	<td><input type="text" name="week_day"
      value="<?php echo $week_day; ?>"/></td>
    </tr>

	<tr>
	 <td colspan="2" style="text-align: center;">
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>