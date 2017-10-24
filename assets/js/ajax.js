function veript(userName) {  //验证用户名是否已经存在
	if(userName==''){
		document.getElementById("inner").style.display="none";
	}else{
		var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBackName() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var result = xmlObj.responseText;
				if (result=='n') {
					document.getElementById("inner").style.display="none";
					alert('用户名已被他人使用！');
					 // document.getElementById("inner").innerHTML="<div style='float:left' > <p>用户名已被他人使用！</p> </div>";

				}else{
					document.getElementById("inner").style.display="block";
				// document.getElementById("inner").innerHTML=
				// " <img id='img' style='width:20px;height:20px;' src='../assets/img/ok.png'  />";
					// document.getElementById(inner).innerHTML=result;
					// alert('用户名可以使用！');
			}
		}
	}
		xmlObj.onreadystatechange=callBackName;
		xmlObj.open("GET","login_ajax.php?userName="+userName,true);
		xmlObj.send(null);	
}
}

function veript1(email) {   //验证电子邮箱是否已经存在
	
	if(email==''){
		alert('请输入电子邮箱');
		document.getElementById("inner_email").style.display="none";
	}else{
		var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBackName() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var result = xmlObj.responseText;
				if (result=='n') {
					alert('电子邮箱已被他人使用！');
					document.getElementById("inner_email").style.display="none";
					exit();
					

				}else{
				document.getElementById("inner_email").style.display="block";
					// document.getElementById(inner).innerHTML=result;
					// alert('用户名可以使用！');
			}
		}
	}
		xmlObj.onreadystatechange=callBackName;
		xmlObj.open("GET","login_ajax1.php?email="+email,true);
		xmlObj.send(null);
}
}


