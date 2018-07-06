
<!DOCTYPE html>  
<html>
<head>
</head>
<body>  
<?php

if(isset($_POST['submit']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("admin.xml");
	
	
	$adminTag = $xml->getElementsByTagName("admin")->item(0);
	
	
	$adminstratorTag = $xml->createElement("adminstrator");
	
	$name = $_POST['n_name'];
	$id = $_POST['n_id'];
	
	$pass = $_POST['n_pass'];
	
	
	
		
		
		$nameTag = $xml->createElement("name",$name);
		$idTag = $xml->createElement("id",$id);
		
		$passTag = $xml->createElement("pass",$pass);
		
		
		$adminstratorTag->appendChild($idTag);
		
		
		
		$adminstratorTag->appendChild($passTag);
		
		
	
		
		
		$adminstratorTag->appendChild($nameTag);
		
		$adminTag->appendChild($adminstratorTag);
		
		$xml->save("Admin.xml");	
		
}
if(isset($_POST['delete']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("admin.xml");
	$name = $_POST['n_name'];
	$xpath = DOMXPATH($xml);
	foreach($xpath->query("/admin/adminstrator[name = $name]")as  $node)
	{
		$node->parentNode->removeChild($node);
	}
	$xml->formatoutput =true; 
	$xml->save('admin.xml')
	
}
if(isset($_POST['edit']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("admin.xml");
	$name = $_POST['n_name'];
	$id = $_POST['n_id'];
	$pass = $_POST['n_pass'];
	$xpath = DOMXPATH($xml);
	foreach($xpath->query("/admin/adminstrator[name = $name]")as  $node)
	{
		$node->parentNode->replaceChild($node);
	}
	$xml->formatoutput =true; 
	$xml->save('admin.xml')
}


?>

<h2>Apply Online </h2>
<form method="POST" action = "ApplyOnline.php">  
  Name: <input type="text" name="n_name"/>
  <br><br>
  ID: <input type="text" name="n_id"/>
  <br><br>
  Pass: <textarea name="n_pass" input type "text"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit"/> 
  <br><br>
  <input type="submit" name="delete" value="Delete"/> 
  <br><br>
  <input type="submit" name="edit" value="Edit"/> 
  
</form>  
</body>
</html>

