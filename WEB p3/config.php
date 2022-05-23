<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "esqui"; /* Database name */

$link = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
?>