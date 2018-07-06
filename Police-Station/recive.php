<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=id4969414_station'; // Database name 
$tbl_name="test";
$id=$_POST['ID'];
$hr=$_POST['HR'];
$tp=$_POST['TP'];
$x=$_POST['CX'];
$y=$_POST['CY'];
$sh=$_POST['SH'];
$ho=$_POST['HO'];
$ba=$_POST['BA'];
$b=$_POST['B'];
$r=$_POST['R'];
$t=$_POST['T'];
$p=$_POST['P'];
$s=$_POST['S'];
$h=$_POST['H'];
$a=$_POST['A'];

$conn = new PDO($db_name, $username, $password);

if(!$conn)
{
	die("fail");
}
else
{
	if ($x == "----------" || x == "XXXXXXXXXX" )
    {
        $result = $dbh->query("SELECT X, Y FROM officers WHERE ID = $id;", PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $x = $row['X'];
        $y = $row['Y'];

        
    }
    if ($ho == "1")
        $ho = "اقتلوه" ;
    else if ($ho == "2")
        $ho = "اقتلوه" ;
    else if ($ho == "3")
        $ho = "اقتلوه" ;
    else if ($ho == "4")
        $ho = "اقتلوه" ;
    else if ($ho == "5")
        $ho = "اقتلوه" ;
    else if ($ho == "6")
        $ho = "اقتلوه" ;
    else if ($ho == "7")
        $ho = "اقتلوه" ;
    else if ($ho == "8")
        $ho = "اقتلوه" ;
    else if ($ho == "9")
        $ho = "اقتلوه" ;
    else if ($ho == "10")
        $ho = "اقتلوه" ;
    else if ($ho == "11")
        $ho = "اقتلوه" ;
    else if ($ho == "12")
        $ho = "اقتلوه" ;
    else if ($ho == "13")
        $ho = "اقتلوه" ;
    else if ($ho == "14")
        $ho = "اقتلوه" ;
    else if ($ho == "15")
        $ho = "اقتلوه" ;
  $stmt = $conn->prepare("UPDATE officers
SET Temperture = '$tp', HeartRate='$hr', Shout='$sh' , Panic='$p' , Hostile='$h' , HostileWord='$ho' , X='$x' , Y='$y' , HRFlag='$r' , TempFlag='$t' , ShoutFlag='$s' , AlarmFlag='$a' ,Battery='$ba' ,BatteryFlag='$b' , ConnectionFlag='1', Timeout='0' 
WHERE ID=$id;");
    
    $stmt->execute();
}
?>