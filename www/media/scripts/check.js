function getXmlHttp()	{	//function for cross browsers  to make XMLHttpRequest	
	  var xmlhttp;
	  try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (e) {
		try {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
		  xmlhttp = false;
		}
	  }
	  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	  }
	  return xmlhttp;
	}
	
	function check() {		
		var check = getXmlHttp()  // make object to make request for server		   	
		var statusElem = document.getElementById('checklog_status')  //initial field		
		check.onreadystatechange = function() {  // onreadystatechange activate when get answer from server
			if (check.readyState == 4) { // in case finish execution of request
				//statusElem.innerHTML = check.statusText // //show status (Not Found, ОК..)
				if(check.status == 200) {  // if status is 200 (ОК) - give  answer user
					statusElem.innerHTML=check.responseText;
				}				
			}
		}		   
				// set connection address
		   logname = document.getElementById('login');		
		if ((logname.value).length >= 3)	{
		//check.open('GET', 'logic/checklog.php?login='+logname.value, true);  		
		//check.send(null);  // send request	  			
		
		check.open('POST','logic/checklog.php',true);
		check.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		var str='login='+logname.value;
		check.send(str);
		
		statusElem.innerHTML = 'Wait response from server...' 
		}	else	{
			statusElem.innerHTML = 'Login is too short!' 
			}
	}