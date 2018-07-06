<?php
//PHPinfo();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name = 'mysql:host=localhost;dbname=id4969414_station'; // Database name 
$tbl_name="users"; // Table name 
// Connect to server and select databse.

try {
    $dbh = new PDO($db_name, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$encrypted_mypassword=md5($mypassword);
global $dbh;
$result = $dbh->query("SELECT * FROM users WHERE username= '$myusername' and password= '$encrypted_mypassword'", PDO::FETCH_ASSOC);

// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($result->fetchColumn() > 0){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    session_start();
$_SESSION['login']=1;

header("location:station.php");
}
else {
echo "alert(Wrong Username or Password);";
}

?>