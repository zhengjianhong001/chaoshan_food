
function show_btn_group(){
		document.getElementById('btn-group').style.display="block";
}
function hidden_btn_group() {
		document.getElementById('btn-group').style.display="none";
}
function show_img_group(){
		document.getElementById('btn-group1').style.display="block";
}
function hidden_img_group() {
		document.getElementById('btn-group1').style.display="none";
}

	
//菜谱喜欢
function update_like_num(food_id) {

	
		var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBacklike_num() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var like_num =	document.getElementById('like_num');
				var result = xmlObj.responseText;
				if(result==-1){
					alert('您已喜欢过了');
				}else
				{
					like_num.innerHTML=result;
				}
				
		}
	}
		xmlObj.onreadystatechange=callBacklike_num;
		xmlObj.open("GET","update_like_num_ajax.php?food_like_id="+food_id,true);
		xmlObj.send(null);
	}

		

//菜谱收藏
function update_collect_num(food_id) {
var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBacklike_num() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var collect_num =	document.getElementById('collect_num');
				var result = xmlObj.responseText;
				if(result==-1){
					alert('您已收藏过了');
				}else
				{
					collect_num.innerHTML=result;
				}
				
		}
	}
		xmlObj.onreadystatechange=callBacklike_num;
		xmlObj.open("GET","update_collect_num_ajax.php?food_like_id="+food_id,true);
		xmlObj.send(null);	
}
//话题喜欢

function update_topi_like_num(topic_id) {
var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBacklike_num() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var like_num =	document.getElementById('like_num');
				var result = xmlObj.responseText;
				if(result==-1){
					alert('您已喜欢过了');
				}else
				{
					like_num.innerHTML=result;
				}
				
		}
	}
		xmlObj.onreadystatechange=callBacklike_num;
		xmlObj.open("GET","update_topi_like_num_ajax.php?topic_like_id="+topic_id,true);
		xmlObj.send(null);	
}
//话题收藏
function update_topi_collect_num(topic_id) {
var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBacklike_num() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var collect_num =	document.getElementById('collect_num');
				var result = xmlObj.responseText;
				if(result==-1){
					alert('您已收藏过了');
				}else
				{
					collect_num.innerHTML=result;
				}
				
		}
	}
		xmlObj.onreadystatechange=callBacklike_num;
		xmlObj.open("GET","update_topi_collect_num_ajax.php?topic_like_id="+topic_id,true);
		xmlObj.send(null);	
}






function tab() {
    var tab = document.getElementById("tab");
    var h = tab.getElementsByTagName("h3");
    var div = tab.getElementsByTagName("div")[1];
    var ul = div.getElementsByTagName('ul');
    var index = 0;

    for (var i = 0; i < h.length; i++) {
        h[i].index = i;
        h[i].onclick = function () {
            h[index].className = "";
            ul[index].className = "";
            this.className = "select";
            ul[this.index].className = "active";
            index = this.index;
        }
    }
}

/*用户关注*/
function user_connect(followed_id,follower_id){
 		var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBack_connect() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var user_connect =	document.getElementById('user_connect');
				var result = xmlObj.responseText;
				if(result==1){
					user_connect.innerHTML="✔已关注";
				}
				
		}
	}
		xmlObj.onreadystatechange=callBack_connect;
		xmlObj.open("GET","user_connect_ajax.php?follower_id="+follower_id+"&followed_id="+followed_id,true);
		xmlObj.send(null);	
}
/*用户取消关注*/
function del_user_connect(followed_id,follower_id){
 		var xmlObj;
		if (window.ActiveXObject) {
			xmlObj=new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlObj=new XMLHttpRequest();
		}
			function callBack_delconnect() {
			if ((xmlObj.readyState==4)&&(xmlObj.status==200)) {
				var user_connect =	document.getElementById('user_connect');
				var fans_num=document.getElementById('fans_num');
				var result = xmlObj.responseText;
					user_connect.innerHTML="+关注";
					fans_num.innerHTML=""+result;
				
				
		}
	}
		xmlObj.onreadystatechange=callBack_delconnect;
		xmlObj.open("GET","deluser_connect_ajax.php?follower_id="+follower_id+"&followed_id="+followed_id,true);
		xmlObj.send(null);	
}

