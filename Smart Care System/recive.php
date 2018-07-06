<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=smartcare';  


$px=$_POST['PX'];
$py=$_POST['PY'];
$hr=$_POST['HR'];
$f=$_POST['F'];
$t=$_POST['T'];
$s=$_POST['S'];

$conn = new PDO($db_name, $username, $password);

if(!$conn)
{
	die("fail");
}
else
{
	

        $stmt = $conn->prepare("INSERT INTO `data`(`X-Patient`, `Y-Patient`, `HeartRate`, `FallFlag`, `GeoFencing`, `Status`, `Speed`) VALUES ($px,$py,$hr,$f,$g,$t,$s)");
  $stmt->execute();
    
    
}
?>