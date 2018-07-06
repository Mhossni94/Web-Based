<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=id4969414_station';

try {
    $dbh = new PDO($db_name, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

global $dbh;
$result = $dbh->query("SELECT alarm  FROM test", PDO::FETCH_ASSOC);
$row = $result->fetch();
    if ($row['alarm'] == 1)
    {
$stmt = $dbh->prepare("UPDATE test
SET alarm='0' WHERE ID=1"); 
    echo "Notifications OFF";}
else if ($row['alarm'] == 0)
    {
$stmt = $dbh->prepare("UPDATE test SET alarm='1' WHERE ID=1"); 
echo "Notifications ON";}
    $stmt->execute();

?>