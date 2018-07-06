<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=smartcare'; // Database name 

try {
    $dbh = new PDO($db_name, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
global $dbh;
$count = $dbh->query("SELECT COUNT(*) FROM data", PDO::FETCH_ASSOC);
    $count = $count->fetch();
$count = $count["COUNT(*)"];
$result = $dbh->query("SELECT `Time`, `X-Patient`, `Y-Patient`, `HeartRate`, `FallFlag`, `GeoFencing`, `Status`, `Speed`, `Battery`  FROM data WHERE ID = $count ", PDO::FETCH_ASSOC); 
        
      While( $row = $result->fetch()):
        $battery = $row['Battery'];
     echo "<tr>";
             echo "<td >".$row['Time']."</td>"; 
             echo '<td  >'."30.123456"."</td>"; 
             echo '<td  >'."31.123456"."</td>"; 
             echo '<td id = "xp" >'.$row['X-Patient']."</td>"; 
             echo '<td id = "yp" >'.$row['Y-Patient']."</td>"; 
             echo "<td>".$row['HeartRate']."</td>"; 
            if ($row['FallFlag'] == 1 ) { echo '<td style="color:red;">'."Fall"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}
            if ($row['GeoFencing'] == 1 ) { echo '<td style=""color:red;">'."Out of Geo Fencing"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}
             if ($row['Status'] == 1 ) { echo '<td style="color:red;">'."Device Disarmed"."</td>" ;} else {echo '<td style="color:green;">'."Normal"."</td>" ;}  
             echo "<td >".$row['Speed']."</td>"; 
             if ($battery < 20 ) { echo '<td style="color:red;">'.$battery."</td>" ;} else {echo '<td style="color:green;">'.$battery."</td>" ;}
             
           echo  "</tr>";

endwhile ;

        
       
    
   

?>