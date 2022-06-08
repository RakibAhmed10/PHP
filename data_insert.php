<?php
// connect to MySQL
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysql_select_db('doctors', $db) or die(mysql_error($db));

// insert data into the movie table
$query = 'INSERT INTO Doctors_info
        (dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day)
    VALUES
        (1, "Dr. Wahida Hasin", "Gyney" , "MBBS, MPH", "Ad-Din Medical College, Dhaka", "01674087223", "08.00 AM to 02.00 PM", "Every Day" )';
mysql_query($query, $db) or die(mysql_error($db));

echo 'Data inserted successfully!';
?>