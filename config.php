<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "yourwoofAdmin";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);


 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

?>