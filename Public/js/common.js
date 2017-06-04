$(function{
	
});

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);

	if (r != null) 
	return decodeURI(r[2]); 

	return null;
} 

function addCookie(e, t, a) {
    var n = e + "=" + escape(t) + "; path=/";
    if (a > 0) {
        var r = new Date;
        r.setTime(r.getTime() + a * 3600 * 1e3);
        n = n + ";expires=" + r.toGMTString()
    }
    document.cookie = n
}
function getCookie(e) {
    var t = document.cookie;
    var a = t.split("; ");
    for (var n = 0; n < a.length; n++) {
        var r = a[n].split("=");
        if (r[0] == e) return unescape(r[1])
    }
    return null
}


