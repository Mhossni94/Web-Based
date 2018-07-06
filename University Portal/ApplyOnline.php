
<!DOCTYPE html>  
<html>
<head >
    <meta charset="UTF-8">
    <title>MSA University</title>
    <link rel="shortcut icon" type="image/x-icon" href="img\msalogo.png">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,900' rel='stylesheet' type='text/css'>
</head>
<body onload="loggedin()" > 
<?php

if(isset($_POST['submit']))
{
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("ApplyOnline.xml");
	
	
	$rootTag = $xml->getElementsByTagName("applications")->item(0);
	
	
	$applicationTag = $xml->createElement("application");
	
	$name = $_POST['n_name'];
	$email = $_POST['n_email'];
	$address = $_POST['n_address'];
	$comment = $_POST['n_comment'];
	$gender = $_POST['n_gender'];
	$englishtestscore = $_POST['n_englishtestscore'];
	$schoolscore = $_POST['n_schoolscore'];
	$certficatetype = $_POST['n_certficatetype'];
		
		
		$nameTag = $xml->createElement("name",$name);
		$emailTag = $xml->createElement("email",$email);
		$genderTag = $xml->createElement("gender",$gender);
		$commentTag = $xml->createElement("comment",$comment);
		$addressTag = $xml->createElement("address",$address);
		$englishtestscoreTag = $xml->createElement("englishtestscore",$englishtestscore);
		$schoolscoreTag = $xml->createElement("schoolscore",$schoolscore);
		$certficatetypeTag = $xml->createElement("certficatetype",$certficatetype);								
		
		
		$applicationTag->appendChild($emailTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($addressTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($genderTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($commentTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($englishtestscoreTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($schoolscoreTag);
		$applicationTag->appendChild("/n");
		$applicationTag->appendChild($certficatetypeTag);
		$applicationTag->appendChild("/n");
		
		$applicationTag->appendChild($nameTag);
		$applicationTag->appendChild("/n");
		$rootTag->appendChild($applicationTag);
		$rootTag->appendChild("/n");
		$xml->save("ApplyOnline.xml");	
		
}

?>


<!-- Costum made pluggins--> 
<a id="js-top" class="totop" href="#">
    <img src="img\arrow.png" alt="Up">
</a>
<div class="soccont">
    <div style="margin : 8px 4px 0px 4px ;">
        <a href="http://www.facebook.com" target="_blank"><img  src="img\socfb.png" alt="FB" width="40" height="40" ></a>
        
    </div>
    <div style="margin : 2px 4px 0px 4px ;">
        <a href="http://www.twitter.com" target="_blank"><img src="img\soctw.png" alt="FB" width="40" height="40" ></a>
    </div>
    <div style="margin : 2px 4px 0px 4px ;">
        <a href="http://www.outlook.com" target="_blank"><img src="img\socml.png" alt="FB" width="40" height="40" ></a>
    </div>
    <div style="margin : 2px 4px 0px 4px ;">
        <a href="http://www.google.com" target="_blank"><img src="img\socgp.png" alt="FB" width="40" height="40" ></a>
    </div>
</div>
 <!-- end of the Pluggins-->
<!-- start Of the navigation bar -->   
   <div class="row" >
		   <div class="navbar">
			   <div class="container12">
				   <div class="column12">                                                                                                
			   <a href="index.html"> <div class="msalogo"><img src="img\msalogo.png" alt="MSA University"></div></a> 
				   	  <div class="mainnav" >
				   	  <div class="dropdown">
							<a href="#" >Admission</a> 	&nbsp;
							<div class="dropdown-content">  
							  <a href="Apply Online.html">Apply Online</a>
							  <a href="Tuition Fees.html">Tuition Fees</a>
							  <a href="Scholar Ship.html">Scholarship</a>
							  <a href="Apllication Polices.html">Apllication Polices</a>
							  <a href="Post Graduates.html">Post Graduates</a>
							</div>
							</div>
							<div class="dropdown">
							<a href="#" >Student Activities</a> 	&nbsp;
							<div class="dropdown-content">  
							  <a href="MUN.html">MUN</a>
							  <a href="CPC.html">CPC</a>
							  <a href="Heroes.html">MSA Heroes</a>
							  <a href="More.html">More</a> 
							</div>
							</div>
							<div class="dropdown">
							<a href="#" >Parteners Of Success</a> 	&nbsp;
							<div class="dropdown-content">  
							  <a href="http://www2.gre.ac.uk/" target="_blank">Greenwich University</a>
							  <a href="http://www.beds.ac.uk/" target="_blank">Bedfordshire University</a>
							  <a href="http://careergates.org/" target="_blank">Career Gates</a>
							  <a href="https://www.ebscohost.com/" target="_blank">Ebsco Host</a>
							</div>
							</div>
							<a   onclick="down()">Contact Us</a> &nbsp;
							<a  onclick="loginform()" id="logformbtn" Style="font-size: 18px;"><img  style="width:20px; padding-right:3px; " src="img/login.png" alt="">login</a>
		   	 		        
		   	 		        <div class="dropdownuser" id="ddu">
		   	 		        <img id="Pb" style="width:20px; padding-right:3px; " src=""  alt="">
			   	 		    <a   id="user" Style="font-size: 12px;"></a>
			   	 		    <div class="dropdownuser-content" id="user-content">  
							  
							</div>
							</div>
			   	 		    
			   	 		    		
				   	  </div>
			   		</div>
			   </div>
		   </div>  
	   </div>
<!-- End of the navigation Bar " -->
    <!--Start Of Login -->
	
    		<div class="blur" id="log">
				<div class="login" onsubmit="loginsubmit()">
					<img src="img/log-close.png" class ="close" onclick="loginform()">
					<img src="img/msalogo.png" style="margin:30px 200px 20px 140px;border-radius:20px;" alt="">
					<input type="text" id="userid" placeholder="User ID" >
					<input type="Password" id="password" placeholder="Password" >
					<select name="domain" id="domain">
					<option value="staff">Staff</option>
					<option value="student">Student</option>
					<option value="admin">Adminstrator</option>
					</select>
					<div class="submit"><div class="logerror" id="error"></div><button onclick="loginsubmit()" id="loginbtn">Login</button></div>
								
			
				</div>
			</div>
    <!-- End Of Login -->
    <!-- Main Content -->
    
<div class="container12">
<div class="row"><div class="column12">
<h3 style="float:left;margin-top:20px;margin-left:20px;background:rgba(0,0,0,0.2);border-radius:10px;">Apply Online </h3>
<br>
<br>
<form method="POST" action = "ApplyOnline.php">  
  <h5  style="float:left;margin-top:20px;margin-left:20px;">Name:</h5> <input type="text" name="n_name"/>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> E-mail:</h5> <input type="text" name="n_email"/>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> address: </h5> <input type="text" name="n_address"/>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> EnglishTestScore:</h5> <input type="text" name="n_englishtestscore"/>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> SchoolScore: </h5> <input type="text" name="n_schoolscore"/>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;">  Comment:</h5> <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> CertficateType: </h5>
  <input type="radio" name="n_certficatetype" value="ad"/>American Diploma
  <input type="radio" name="n_certficatetype" value="ig"/>IGSCE
  <input type="radio" name="n_certficatetype" value="ta"/>Thanawya AMMA
  <br><br>
	<h5  style="float:left;margin-top:20px;margin-left:20px;"> Gender: </h5>
  <input type="radio" name="n_gender" value="female"/>Female
  <input type="radio" name="n_gender" value="male"/>Male
  <br><br>
  <input type="submit" name="submit" value="Submit"/> 
</form>  
</div></div>
      <!--Contact Info-->      <div class="row" >
       <div class="column12">
       
        <div class="footer" id ="bottom">    
       
           
           		<div style="float:left;margin-left:50px;">
           		<table>
           			<tbody>
           				<tr>
           					<td>
           						<img src="img/phone.png" width="20" > 
           					</td>
           					<td>
           						Tel. : 3837-1517 <br>
								Tel. : 3837-1518 <br>
								Fax :  3837-1543 <br>
           					</td>
           				</tr>
           			</tbody>
           		</table>
           		</div>
         			
			<div style="float:left;margin-left:50px;">
           		<table>
           			<tbody>
           				<tr>
           					<td>
           						<img src="img/hotline.png" width="20" > 
           					</td>
           					<td>	
							Hotline : 16672
           					</td>
           				</tr>
           			</tbody>
           		</table>
           		</div>
         			
         			<div style="float:left;margin-left:50px;">
           		<table>
           			<tbody>
           				<tr>
           					<td>
           						<img src="img/mail.png" width="20" > 
           					</td>
           					<td>
           						<a href="mailto:info@msa.eun.eg">info@msa.eun.eg</a> <br>
								<a href="mailto:admission@msa.eun.eg">admission@msa.eun.eg</a> <br>
								
           					</td>
           				</tr>
           			</tbody>
           		</table>
           		</div>
         			
         			<div style="float:left;margin-left:50px;">
           		<table>
           			<tbody>
           				<tr>
           					<td>
           						<img src="img/address.png" width="20" > 
           					</td>
           					<td>
								26 July Mehwar Road intersection with Wahat Road,<br>
          						 6th October City. Egypt.
           					</td>
           				</tr>
           			</tbody>
           		</table>
			</div>
      
       </div></div>
   </div>
   </div>
</body>
</html>

