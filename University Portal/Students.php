
<!DOCTYPE html>  
<html>
<head>
</head>
<body>  
<?php

if(isset($_POST['submit']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("Students.xml");
	
	
	$studentsTag = $xml->getElementsByTagName("students")->item(0);
	
	
	$studentTag = $xml->createElement("student");
	
	$name = $_POST['n_name'];
	$id = $_POST['n_id'];
	$schedule = $_POST['n_schedule'];
	$pass = $_POST['n_pass'];
	
	$enrolledcourses = $_POST['n_enrolledcourses'];
	$contactus = $_POST['n_contactus'];
	
		
		
		$nameTag = $xml->createElement("name",$name);
		$idTag = $xml->createElement("id",$id);
		
		$passTag = $xml->createElement("pass",$pass);
		$scheduleTag = $xml->createElement("schedule",$schedule);
		$enrolledcoursesTag = $xml->createElement("enrolledcourses",$enrolledcourses);
		$contactusTag = $xml->createElement("contactus",$contactus);
									
		
		
		$studentTag->appendChild($idTag);
		
		$studentTag->appendChild($scheduleTag);
		
		
		$studentTag->appendChild($passTag);
		
		$studentTag->appendChild($enrolledcoursesTag);
		
		$studentTag->appendChild($contactusTag);
		
	
		
		
		$studentTag->appendChild($nameTag);
		
		$studentsTag->appendChild($studentTag);
		
		$xml->save("Students.xml");	
		
}
if(isset($_POST['delete']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("Students.xml");
	$name = $_POST['n_name'];
	$xpath = DOMXPATH($xml);
	foreach($xpath->query("/students/student[name = $name]")as  $node)
	{
		$node->parentNode->removeChild($node);
	}
	$xml->formatoutput =true; 
	$xml->save('Students.xml')
	
}

?>

<h2>Apply Online </h2>
<form method="POST" action = "ApplyOnline.php">  
  Name: <input type="text" name="n_name"/>
  <br><br>
  ID: <input type="text" name="n_id"/>
  <br><br>
  Schedule: <input type="text" name="n_schedule"/>
  <br><br>
   EnrolledCourses: <input type="text" name="n_enrolledcourses"/>
  <br><br>
   ContactUs: <input type="text" name="n_contactus"/>
  <br><br>
  Pass: <textarea name="n_pass" input type "text"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit"/> 
  <br><br>
  <input type="submit" name="delete" value="Delete"/> 
  
</form>  
</body>
</html>

