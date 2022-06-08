<?php
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

// create the user table
$query = 'CREATE TABLE IF NOT EXISTS site_user (
        user_id     INTEGER     NOT NULL AUTO_INCREMENT,
        username    VARCHAR(20) NOT NULL,
        password    CHAR(41)    NOT NULL,

        PRIMARY KEY (user_id)
    )
    ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));

// create the user information table
$query = 'CREATE TABLE IF NOT EXISTS site_user_info (
        user_id     INTEGER     NOT NULL,
        first_name  VARCHAR(20) NOT NULL,
        last_name   VARCHAR(20) NOT NULL,
        email       VARCHAR(50) NOT NULL,
        city        VARCHAR(20),
        state       CHAR(2),
        hobbies     VARCHAR(255),

        FOREIGN KEY (user_id) REFERENCES site_user(user_id)
    )
    ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));

// populate the user table
$query = 'INSERT IGNORE INTO site_user
        (user_id, username, password) 
    VALUES
        (1, "admin", PASSWORD("123456")),
        (2, "user", PASSWORD("password"))';
mysql_query($query, $db) or die (mysql_error($db));

// populate the user information table
$query = 'INSERT IGNORE INTO site_user_info
        (user_id, first_name, last_name, email, city, state, hobbies) 
    VALUES
        (1, "Admin", "Rakib", "rakib_ific@yahoo.com", NULL, NULL, NULL),
        (2, "User", "User", "user@yahoo.com", NULL, NULL, NULL)';
mysql_query($query, $db) or die (mysql_error($db));

echo 'Success!';
?>