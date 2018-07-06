<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=insurance';
try {
    $dbh = new PDO($db_name, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
global $dbh;
$count = $dbh->query("SELECT COUNT(*) FROM driver", PDO::FETCH_ASSOC);
    $count = $count->fetch();
$count = $count["COUNT(*)"];
$result = $dbh->query("SELECT ID,Time,Lon,Lat,Alt,Speed,Credit,SosFlag,EFlag,MechFlag,ImpactFlag,Distance  FROM driver WHERE ID = $count ", PDO::FETCH_ASSOC);
        
      While( $row = $result->fetch()):
        
             echo "<tr>";
             echo "<td >".$row['Time']."</td>"; 
             echo '<td id = "x" >'.$row['Lat']."</td>"; 
             echo '<td id = "y" >'.$row['Lon']."</td>"; 
             echo "<td>".$row['Alt']."</td>"; 
             echo "<td>".$row['Speed']."</td>"; 
            if ($row['SosFlag'] == 1 ) { echo '<td style="color:red;">'."SOS Request"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}
            if ($row['EFlag'] == 1 ) { echo '<td style=""color:red;">'."Emergency Request"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}
             if ($row['MechFlag'] == 1 ) { echo '<td style="color:red;">'."Mechanic Request"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}  
             if ($row['ImpactFlag'] == 1 ) { echo '<td style="color:red;">'."Mechanic Request"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}
             echo "<td>".$row['Credit']."</td>"; 
           echo  "</tr>";
endwhile ;

        
       
    
   

?>