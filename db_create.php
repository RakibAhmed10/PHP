<?php
//connect to MySQL
$db = mysql_connect('localhost', 'root', 'fiufiu') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS Doctors';
mysql_query($query, $db) or die(mysql_error($db));

//make sure our recently created database is the active one
mysql_select_db('Doctors', $db) or die(mysql_error($db));

//create the Master table
$query = 'CREATE TABLE Doctors_info (
        dr_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        dr_name      VARCHAR(255)      NOT NULL, 
        category     VARCHAR(255)      NOT NULL,
		degree       VARCHAR(255)      NOT NULL,
		chamber      VARCHAR(255)      NOT NULL,
		contact_no   VARCHAR(255)      NOT NULL,
		visit_time	 VARCHAR(255)      NOT NULL,
		week_day	 VARCHAR(255)      NOT NULL,
        PRIMARY KEY (dr_id) 
    ) 
    ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));

echo 'Master database successfully created!';
?>