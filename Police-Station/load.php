<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=id4969414_station'; // Database name 
$tbl_name="officers"; // Table name 
// Connect to server and select databse.

try {
    $dbh = new PDO($db_name, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

global $dbh;
 $alarm = 0;
 
$mute =  $dbh->query("SELECT ID,alarm  FROM test", PDO::FETCH_ASSOC);
$alarmr = $mute ->fetch();
$ftime = $alarmr['alarm'];
$result = $dbh->query("SELECT ID, Name, Rank, Temperture, HeartRate, Shout, Panic, Hostile, HostileWord, Status, X, Y , HRFlag , TempFlag , ShoutFlag , AlarmFlag , ConnectionFlag , Battery , BatteryFlag , Timeout  FROM officers", PDO::FETCH_ASSOC);
$response = array();
$posts = array();
        while( $row = $result->fetch()) :
        if ($row['X'] == "----------" || $row['X'] == "XXXXXXXXXX" || ($row['X'] == 0 && $row['Y'] == 0)  )
        {
            $dx = $row['X'];
            $dy = $row['Y']; 
        }

         else
            {  
             $dx = $row['X'];
             $dy = $row['Y'];
            $ax = 0;$ay = 0 ;
            $bx = 0.0;$by = 0.0;
            $ax = $dx / 100; 
             $ax = (int)$ax;
            $bx = $dx - ($ax * 100);
            $bx = $bx / 60;
            $dx = $ax +$bx; 
            
            if($dy> 9999) {
            $ay = $dy /1000;
                $ay = (int)$ay;
            $by = $dx - ($ay * 1000); }
            else {
            $ay = $dy /100;
            $ay = (int)$ay;
            $by = $dy - ($ay * 100); }
            $by = $by / 60; 
            $dy = $ay + $by;
            
             }
            
if($row['AlarmFlag'] == 1)
   {
    $alarm = 1 ;
    echo '<tr style="color:red">';
       
   }
else echo "<tr>";
             echo "<td>".$row['ID']."</td>"; 
             echo "<td>".$row['Name']."</td>"; 
             echo "<td>".$row['Rank']."</td>"; 
            if ($row['HRFlag'] == 1 ) { echo '<td style="color:red;">'.$row['HeartRate']."</td>" ;} else {echo '<td style="color:green;">'.$row['HeartRate']."</td>" ;}
            if ($row['TempFlag'] == 1 ) { echo '<td style="color:red;">'.$row['Temperture']."</td>" ;} else {echo '<td style="color:green;">'.$row['Temperture']."</td>" ;}
             if ($row['ShoutFlag'] == 1 ) { echo '<td style="color:red;">'.$row['Shout']."</td>" ;} else {echo '<td style="color:green;">'.$row['Shout']."</td>" ;}
             if ($row['Panic'] == 1 ) { echo "<td>"."Pressed"."</td>" ;} else { echo "<td>"."Normal"."</td>";} 
             if ($row['Hostile'] == 1 ) { echo "<td>"."Hostile"."</td>" ;echo "<td>".$row['HostileWord']."</td>" ; } else { echo "<td>"."Normal"."</td>"; echo "<td>".$row['HostileWord']."</td>" ;} 
            if ($row['BatteryFlag'] == 1 ) { echo '<td style="color:Red;">'.$row['Battery']."</td>" ;} else { echo '<td style="color:Green;">'.$row['Battery']."</td>";} 
             if ($row['Status'] == 1 ) { echo '<td style="color:Green;">'."Connected"."</td>" ;} else { echo '<td style="color:red;">'."Disconnected"."</td>";} 
           echo "<td id = ".'"x'.$row['ID'].'">'.$dx."</td>"; 
           echo "<td id = ".'"y'.$row['ID'].'">'.$dy."</td>"; 
           echo "<td ><img class=".'"click"'."onclick=".'"initMap(' . $dx .",". $dy.');Location('.$row['ID'].');"'. "style=".'"width: 40px;"'." src=".'"img/location.png"'." ></td>";
           echo   '<td><img class="click" onclick="Video()" style="width: 40px;" src="img/Video.png" ></td>' ; 
           echo  "</tr>";
$id = $row['ID'];
   

if ($row['ConnectionFlag'] == 0)
{
    if ($row['Timeout'] < 60)
    {
        $timeOut = $dbh->prepare("UPDATE officers SET Timeout = Timeout + 1 WHERE ID=$id");
          $timeOut->execute();
        $connection = $dbh->prepare("UPDATE officers
SET Status='1' WHERE ID=$id;");
    }
    else if ($row['Timeout'] >= 60)
    {
       $connection = $dbh->prepare("UPDATE officers
SET Status='0' WHERE ID=$id;");
    echo "";
    }
  
    $connection->execute();
}

$stmt = $dbh->prepare("UPDATE officers
SET ConnectionFlag='0' WHERE ID=$id;");
    $stmt->execute();
         endwhile;
if ($alarm == 1 && $ftime ==1)
{
echo '  <div id = "alert" class = "notification" ><img src="img/log-close.png" class ="close" onclick="notification()"><audio id="audio" autoplay loop>
  <source src="audio/alert.mp3" type="audio/mpeg" >
</audio> <span id = "atext">Please check red taged officers</span> </div>'; 
    
    
}

?>