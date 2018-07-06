<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=cluster'; // Database name 
$cid=$_POST['CID'];
$sid=$_POST['SID'];
$comp=$_POST['COMP'];
$angle=$_POST['ANGLE'];
$delta=$_POST['DELTA'];
$x=$_POST['CX'];
$y=$_POST['CY'];
$LDR1=$_POST['LDR1'];
$LDR2=$_POST['LDR2'];
$LDR3=$_POST['LDR3'];
$motor=$_POST['MOTOR'];
$error=$_POST['ERROR'];
$pot=$_POST['POT'];

$id = (($CID - 1) * 3 ) + $SID
$conn = new PDO($db_name, $username, $password);

if(!$conn)
{
	die("fail");
}
else
{
	
    $stmt = $conn->prepare("UPDATE data
SET Compass = '$comp', Angle='$angle', Error='$error' , X-Coordinates='$x' , Y-Coordinates='$y' , LDR1='$LDR1' , LDR2='$LDR2' , LDR3='$LDR3' , Delta='$delta' , Motor='$motor' , Potentiometer='$pot', ConnectionFlag='1', Timeout='0' 
WHERE ID=$id;");
    $stmt->execute();
}
?>