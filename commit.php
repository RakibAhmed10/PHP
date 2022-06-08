<?php
$db = mysql_connect('localhost', 'root', 'fiufiu') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('doctors', $db) or die(mysql_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'doctor':
        $query = 'INSERT INTO
            Doctors_Info
                (dr_id, dr_name, category, degree, chamber, contact_no, visit_time, week_day)
            VALUES
                ("' . $_POST['dr_id'] . '",
				"' . $_POST['dr_name'] . '",
				"' . $_POST['category'] . '",
				"' . $_POST['degree'] . '",
				"' . $_POST['chamber'] . '",
				"' . $_POST['contact_no'] . '",
				"' . $_POST['visit_time'] . '",
				"' . $_POST['week_day'] . '")';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'doctor':
        $query = 'UPDATE Doctors_Info SET
                dr_id = "' . $_POST['dr_id'] . '",
                dr_name = "' . $_POST['dr_name'] . '",
                category = "' . $_POST['category'] . '",
				degree = "' . $_POST['degree'] . '",
				chamber = "' . $_POST['chamber'] . '",
				contact_no = "' . $_POST['contact_no'] . '",
				visit_time = "' . $_POST['visit_time'] . '",
				week_day = "' . $_POST['week_day'] . '"
            WHERE
                dr_id = ' . $_POST['dr_id'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysql_query($query, $db) or die(mysql_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>