function getUrlSetCookie(){
	var url = window.location.href;
	if(url){
		var params = getParam(url);
		if(params){
			setCook("JESONG_EXT_DATA",params,1000*60*60);
		}
	}
}

function getParam(url) {
	var queryStr;
	var reg=/[?&]([^=&#]+)=([^&#]*)/g;
	var querys=url.match(reg);
	if(querys){
		queryStr="#params:";
		for(var i in querys){
			var query=querys[i].split('=');
			var key=query[0].substr(1),
				value=query[1];
			if(key === "utm_source" || key === "utm_medium" || key === "utm_term" || key === "utm_content" || key === "utm_campaign" || key === "tid"){
				queryStr += decodeURI(key)+","+decodeURI(value)+",";
			}
		}
		if(queryStr.length > 8){
			queryStr = queryStr.substring(0,queryStr.length-1);
		}else{
			queryStr = undefined;	
		}
	}
	return queryStr;
}

function setCook(name,value,t)
{
	if(typeof t =='undefined' ||t==null) t =60*30*24*60*60*1000;  
	var exp  = new Date(); exp.setTime(exp.getTime() + t);
	document.cookie = name + "="+ escape (value)+ ";expires=" + exp.toGMTString();
}
getUrlSetCookie();