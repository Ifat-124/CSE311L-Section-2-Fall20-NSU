<?php

$mysqli_connection = new MySQLi('localhost', 'root', '', 'cse311l_section_2_fall_20');

if ($mysqli_connection->connect_error) {
   echo "Not connected, error: " . $mysqli_connection->connect_error;
}
else {
   echo "Connected.";
}
?>