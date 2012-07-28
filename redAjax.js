var xmlhttp;
function setHttpRequest () {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
}

function ajaxProcess (method,url,backProcess) {
	setHttpRequest();
	xmlhttp.open(method,url,true);
	xmlhttp.onreadystatechange = backProcess;
}

