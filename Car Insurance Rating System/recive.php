<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=insurance';  
$x=$_POST['LATITUDE'];
$y=$_POST['LONGITUDE'];
$z=$_POST['ALTITUDE'];
$s=$_POST['SPEEDFLAG'];
$sp=$_POST['SPEED'];
$a=$_POST['ACCELERATION'];
$d=$_POST['DECELERATION'];
$o=$_POST['SOS'];
$e=$_POST['EMERGENCY'];
$m=$_POST['MECHANIC'];
$i=$_POST['IMPACT'];
$W=$_POST['WHY'];

$conn = new PDO($db_name, $username, $password);

if(!$conn)
{
	die("fail");
}
else
{
     $count = $dbh->query("SELECT COUNT(*) FROM driver", PDO::FETCH_ASSOC);
    $count = $count->fetch();
$count = $count["COUNT(*)"];
    
    $result = $dbh->query("SELECT Lon,Lat,Credit,Distance,SpeedCount,ACount,DCount,XCount FROM driver WHERE ID = $count ", PDO::FETCH_ASSOC);
    $row = $result->fetch()

     $credit = $row['Credit']; 
     $oldx = $row['Lat']; 
     $oldy = $row['Lon']; 
     $deltax = abs( $oldx - $x);
     $deltay = abs( $oldy - $y);
     $arc = Math.sqrt(Math.pow($deltax, 2) + Math.pow($deltay, 2));
     $olddistance = $row['Distance'];   
     $speedcount = $row['SpeedCount']; 
    $acount = $row['ACount']; 
    $dcount = $row['DCount'];
    $distance = $olddistance + ($arc * 100)
     if ($credit > 10 )   
        {
     if ($distance > (10 * $row[XCount] ))
     {
         $credit  = $credit - 0.1
         $xcount =  $row[XCount] + 1 ;                    
     }
     
     if ($a == 1&& $acount < 15)
     {
        $credit  = $credit - (0.1*$acount);
        $acount = $acount +1;
     }
     if ($d == 1 && $dcount < 15)
     {
        $credit  = $credit - (0.1*$dcount);
        $dcount = $dcount +1;
     }
     if ($s == 1 && $speedcount < 15)
     {
        $credit  = $credit - (0.1*$speedcount);
        $speedcount = $speedcount +1;
     }
     
        }
        
    
    $stmt = $conn->prepare("INSERT INTO `driver`(`Lon`, `Lat`, `Alt`, `Speed`,  `AccFlag`, `SosFlag`, `EFlag`, `MechFlag`, `ImpactFlag`,'DECFlag','Distance',SpeedCount,ACount,DCount,XCount) VALUES ($x,$y,$z,$sp,$a,$o,$e,$m,$i,$d,$distance,$speedcount,$acount,$dcount,$xcount");
    $stmt->execute();
   
    
    
}
?>