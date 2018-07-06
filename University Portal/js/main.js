var i = 0 ;
var isLoggedin =localStorage.getItem("isLoggedin");
var logmenu=localStorage.getItem("logmenu");;
var images = [];
    images[0] = "img\\img0.jpg";
    images[1] = "img\\img1.jpg";
    images[2] = "img\\img2.jpg"; 
    var text= [];
	text[0] =  " MSA Faculty of Managment Employment fair 2015 was one of the most successful fairs in egypt"  ;
	text[1] =  "2"  ;
	text[2] =  "3"  ;

var username= localStorage.getItem("username") ;
var reload = localStorage.getItem("reload") ;
//var profilepicture localStorage.getItem("pb");


function imagepanel()
{

    var image = document.getElementById('imagepanel1');
           image.src = images[i];
           document.getElementById("changetxt").innerHTML = text[i];
            i++;
            if(i>2)
            i=0;
    
}
function imagepanell()
{
    if(i<0)
        i=2;
    var image = document.getElementById('imagepanel1');
           image.src = "img\\img"+i+".jpg";
      document.getElementById("changetxt").innerHTML = text[i];
            i--;        
    
}
function down()
{
    document.getElementById( 'bottom' ).scrollIntoView();
}
function loginform()
{
	document.getElementById("log").classList.toggle('show');
}
function loginsubmit()
{
	
	var domain , id="" , password="";
	var names;
	domain = document.getElementById("domain").options[document.getElementById("domain").selectedIndex].value;
	id = document.getElementById("userid").value;
	password = document.getElementById("password").value;
	var ids , paswords ;
	if(!(id=="" && password =="" ))
		{
	if(domain=="staff")
		{
			localStorage.setItem("reload",0);
			var flag , index;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
        	paswords =xhttp.responseXML.getElementsByTagName("pass");
			ids=xhttp.responseXML.getElementsByTagName("id");
			names = xhttp.responseXML.getElementsByTagName("username");
			for(var o = 0 ; o<ids.length ; o++)
				{
					if((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue == password) )
						{flag = 0;
						index = o;
						 break;
						}
					else if ((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue != password))
						{	flag = 1 }
					else if ((ids[o].childNodes[0].nodeValue != id) && (paswords[o].childNodes[0].nodeValue != password)) {
						flag = 1;}
				}
		if (flag == 0)
			{
				
			localStorage.setItem("username",names[index].childNodes[0].nodeValue);
			document.getElementById("log").classList.toggle('show');
			isLoggedin = 1;
			localStorage.setItem("isLoggedin", isLoggedin);
			logmenu = "<a href="+'"staffcourses.html"'+">Courses</a><a href="+'"Schedule.html"'+">Schedule</a><a href="+'"editprofile.html"'+">Edit Profile</a><a href="+'"examsschedule.html"'+">Exams Schedule</a><a onclick="+'"logout()"'+" href="+'""'+">Logout</a>";
			localStorage.setItem("logmenu", logmenu);
			username= localStorage.getItem("username") ;
			reload = localStorage.getItem("reload") ;
			loggedin();}
		else if (flag==1)
			{alert ("Check password or username")}
    }
};
xhttp.open("GET", "Staff.xml", true);
xhttp.send();
		
		}
	else if(domain=="student")
		{
			localStorage.setItem("reload",0);
			var flag , index;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
        	paswords =xhttp.responseXML.getElementsByTagName("pass");
			ids=xhttp.responseXML.getElementsByTagName("id");
		    names = xhttp.responseXML.getElementsByTagName("name");
			for(var o = 0 ; o<ids.length ; o++)
				{
					if((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue == password) )
						{flag = 0;
						index = o;
						 break;
						}
					else if ((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue != password))
						{	flag = 1;}
					else if ((ids[o].childNodes[0].nodeValue != id) && (paswords[o].childNodes[0].nodeValue != password)) {
						flag = 2;}
				}
		if (flag == 0)
			{
				
			localStorage.setItem("username", names[index].childNodes[0].nodeValue);
			document.getElementById("log").classList.toggle('show');
			isLoggedin = 1;
			localStorage.setItem("isLoggedin", isLoggedin);
			logmenu = "<a href="+'"studentscourses.html"'+">Courses</a><a href="+'"Schedule.html"'+">Schedule</a><a href="+'"editprofile.html"'+">Edit Profile</a><a href="+'"examsschedule.html"'+">Exam Schedule</a><a onclick="+'"examsgrades.html"'+">Exam Grades</a><a onclick="+'"logout()"'+" href="+'""'+">Logout</a>";
			localStorage.setItem("logmenu", logmenu);
			username= localStorage.getItem("username") ;
			reload = localStorage.getItem("reload") ;
			loggedin();}
		else if (flag==1)
			{alert ("invaild password")}
		else if (flag==2)
			{alert ("invaild user")}
    }
};
xhttp.open("GET", "Students.xml", true);
xhttp.send();
		}
	else if(domain=="admin")
		{
			localStorage.setItem("reload",0);
			var flag , index;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
        	paswords =xhttp.responseXML.getElementsByTagName("pass");
			ids=xhttp.responseXML.getElementsByTagName("id");
			names = xhttp.responseXML.getElementsByTagName("username");
			for(var o = 0 ; o<ids.length ; o++)
				{
					if((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue == password) )
						{flag = 0;
						index = o;
						 break;
						}
					else if ((ids[o].childNodes[0].nodeValue == id) && (paswords[o].childNodes[0].nodeValue != password))
						{	flag = 1;}
					else if ((ids[o].childNodes[0].nodeValue != id) && (paswords[o].childNodes[0].nodeValue != password)) {
						flag = 2;}
				}
		if (flag == 0)
			{
				
			localStorage.setItem("username",names[index].childNodes[0].nodeValue);
			document.getElementById("log").classList.toggle('show');
			isLoggedin = 1;
			localStorage.setItem("isLoggedin", isLoggedin);
			logmenu = "<a href="+'"addcourse.html"'+">Add Course</a><a href="+'"addexamsschedule.html"'+">Add Exam Schedule</a><a href ="+'"manageusers.html"'+">Manage Users</a><a href="+'"addgrades.html"'+">Add Grades</a><a onclick="+'"logout()"'+" href="+'""'+">Logout</a>";
			localStorage.setItem("logmenu", logmenu);
			username= localStorage.getItem("username") ;
			reload = localStorage.getItem("reload") ;
			loggedin();}
		else if (flag==1)
			{alert ("invaild password")}
		else if (flag==2)
			{alert ("invaild user")}
    }
};
xhttp.open("GET", "Admin.xml", true);
xhttp.send();
		}
		}
	else 
		{
			alert("empty")
			isLoggedin = 0;
			localStorage.setItem("isLoggedin", isLoggedin);
	    }
}
function logout()
{
	localStorage.clear();
}
function loggedin()
{
	if(isLoggedin==1)
		{
			document.getElementById("user").innerHTML = username ;
			document.getElementById("user-content").innerHTML = logmenu ;
			document.getElementById("logformbtn").classList.toggle('hide');
			
			document.getElementById("ddu").classList.toggle('dpushow');
			if(reload == 0)
			{
			window.location.reload(true);
			localStorage.setItem("reload",1);
			}
			document.getElementById("Pb").src = "img//pb.jpg";//not working :$
		}
}
