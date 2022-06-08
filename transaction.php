<?php
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

switch ($_POST['action']) {

case 'Add Doctor':

    // escape incoming values to protect database
    $doctor_id = mysql_real_escape_string($_POST['dr_id'], $db);
    $dr_name = mysql_real_escape_string($_POST['dr_name'], $db);
    $category = mysql_real_escape_string($_POST['category'], $db);
    $degree = mysql_real_escape_string($_POST['degree'], $db);
    $chamber = mysql_real_escape_string($_POST['chamber'], $db);
    $contact_no = mysql_real_escape_string($_POST['contact_no'], $db);
    $visit_time = mysql_real_escape_string($_POST['visit_time'], $db);
	$week_day = mysql_real_escape_string($_POST['week_day'], $db);

    // add Doctor information into database tables
   // add Doctor information into database tables
    $query = 'INSERT IGNORE INTO doctors_info
            (dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day)
        VALUES
            ("' . $doctor_id . '", "' . $dr_name . '", "' . $category . '", "' . $degree . '", "' . $chamber . '", "' . $contact_no . '", "' . $visit_time . '", "' . $week_day . '")';
    mysql_query($query, $db) or die (mysql_error($db));

    $redirect = 'doctor_list.php';
    break;

case 'Delete Doctor':

    // make sure doctor_id is a number just to be safe
    $doctor_id = (int)$_POST['doctor_id'];

    // delete Doctor information from tables
  
    $query = 'DELETE FROM doctors_info
        WHERE
            dr_id = ' .  $doctor_id;
    mysql_query($query, $db) or die (mysql_error($db));

    $redirect = 'doctor_list.php';
    break;

case 'Edit Doctor':

    // escape incoming values to protect database
    $doctor_id = mysql_real_escape_string($_POST['dr_id'], $db);
    $dr_name = mysql_real_escape_string($_POST['dr_name'], $db);
    $category = mysql_real_escape_string($_POST['category'], $db);
    $degree = mysql_real_escape_string($_POST['degree'], $db);
    $chamber = mysql_real_escape_string($_POST['chamber'], $db);
    $contact_no = mysql_real_escape_string($_POST['contact_no'], $db);
    $visit_time = mysql_real_escape_string($_POST['visit_time'], $db);
	$week_day = mysql_real_escape_string($_POST['week_day'], $db);

    // update existing Doctor information in tables
   
    $query = 'UPDATE doctors_info
            SET   
                dr_id = ' . $doctor_id . ', 
                dr_name = "' . $dr_name . '", 
                category = "' . $category . '", 
                degree = "' . $degree . '",
				chamber = "' . $chamber . '", 	
                contact_no = "' . $contact_no . '" ,
				visit_time = "' . $visit_time . '" ,
				week_day = "' . $week_day . '" 
        WHERE
            dr_id = ' .  $doctor_id;
    mysql_query($query, $db) or die (mysql_error($db));

    $redirect = 'doctor_list.php';
    break;

default:
    $redirect = 'doctor_list.php';
}

header('Location: ' . $redirect);
?>