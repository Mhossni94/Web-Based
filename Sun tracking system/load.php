<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=cluster'; // Database name 
// Connect to server and select databse.

try {
    $dbh = new PDO($db_name, $username, $password);
    } 
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

global $dbh;
$result = $dbh->query("SELECT `ID`, `ClusterID`, `SideID`, `Compass`, `Angle`, `Error`, `X-Coordinates`, `Y-Coordinates`, `Flag`, `ConnectionFlag`, `Timeout`, `Status`, `LDR1`, `LDR2`, `LDR3`, `Delta`, `Motor`, `Potentiometer` FROM `data` WHERE 1", PDO::FETCH_ASSOC); 
        while($row = $result->fetch()) : 

            $dx = $row['X-Coordinates'];
            $dy = $row['Y-Coordinates']; 
        
$CID = $row['ClusterID'];
if (($CID % 2) == 0 )
{
            echo '<tr style="background-color: #c9c9c9;">';
}
else 
{
            echo '<tr style="background-color: #ffffff;">';
}
             echo "<td>".$row['ClusterID']."</td>"; 
             echo "<td>".$row['SideID']."</td>"; 
             echo "<td>".$row['Compass']."</td>"; 
             echo "<td>".$row['Angle']."</td>"; 
             echo "<td>".$row['Delta']."</td>"; 
             echo "<td>".$row['LDR1']."</td>"; 
             echo "<td>".$row['LDR2']."</td>"; 
             echo "<td>".$row['LDR3']."</td>"; 
             echo "<td>".$row['Motor']."</td>"; 
             echo "<td>".$row['Potentiometer']."</td>";
             echo "<td>".$row['Error']."</td>";             
             
           echo "<td id = ".'"x'.$row['ClusterID'].'">'.$dx."</td>"; 
           echo "<td id = ".'"y'.$row['ClusterID'].'">'.$dy."</td>"; 
if ($row['Status'] == 1 ) { echo '<td style="color:Green;">'."Connected"."</td>" ;} else { echo '<td style="color:red;">'."Disconnected"."</td>";} 
           echo "<td ><img class=".'"click"'."onclick=".'"initMap(' . $dx .",". $dy.');Location('.$row['ClusterID'].');"'. "style=".'"width: 40px;"'." src=".'"img/location.png"'." ></td>";
 
           echo  "</tr>";
$id = $row['ID'];

if ($row['ConnectionFlag'] == 0)
{
    if ($row['Timeout'] < 60)
    {
        $timeOut = $dbh->prepare("UPDATE data SET Timeout = Timeout + 1 WHERE ID=$id");
          $timeOut->execute();
        $connection = $dbh->prepare("UPDATE data SET Status='1' WHERE ID=$id;");
    }
    else if ($row['Timeout'] >= 60)
    {
       $connection = $dbh->prepare("UPDATE data SET Status='0' WHERE ID=$id;");
           
    }
  
    $connection->execute();
}

$stmt = $dbh->prepare("UPDATE data
SET ConnectionFlag='0' WHERE ID=$id;");
    $stmt->execute();
         endwhile;

?>