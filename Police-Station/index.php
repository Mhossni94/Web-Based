<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Police Station Unit</title>
     <link rel="shortcut icon" type="image/x-icon" href="img\Egyptian_Police_Emblem.svg.png">
    <link rel="stylesheet" href="css/style1.css">
    <script src="js/main.js"></script>
    <style>

</style>
</head>
<body >
   <!--Start Of Login -->
    		<div class="blur" id="log">
				<div class="login">
					
					<img src="img/Egyptian_Police_Emblem.svg.png" style="width: 100px;height: 100px; margin:30px 200px 20px 140px;border-radius:20px;" >
					
     					<form name="form1" method="post" action="checklogin.php" class="profile__form"> 

					<input class="input" name="myusername" type="text" id="myusername" placeholder="User ID" >
					<input class = "input" name="mypassword"type="Password" id="mypassword" placeholder="Password" >
					<div class="submit"><div class="logerror" id="error"></div>
                    <input style="float:right; width:85px;height:36px; padding:0;" class="btn" type="submit" name="Submit" value="Login">
                   </div>
                    </form>
								
			
				</div>
			</div>
    <!-- End Of Login -->
    
</body>
</html>