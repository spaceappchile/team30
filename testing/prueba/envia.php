<html>
<head>
<title>Send signal</title>
<script type="text/javascript" src="flashobject.js"></script>
<script type="text/javascript">

function getParameter(string, parm, delim) {

     if (string.length == 0) {
     	return '';
     }

	 var sPos = string.indexOf(parm + "=");

     if (sPos == -1) {return '';}

     sPos = sPos + parm.length + 1;
     var ePos = string.indexOf(delim, sPos);

     if (ePos == -1) {
     	ePos = string.length;
     }

     return unescape(string.substring(sPos, ePos));
}

function getPageParameter(parameterName, defaultValue) {

	var s = self.location.search;

	if ((s == null) || (s.length < 1)) {
		return defaultValue;
	}

	s = getParameter(s, parameterName, '&');

	if ((s == null) || (s.length < 1)) {
		s = defaultValue;
	}

	return s;
}

function killFlash() {


	try {
			window.opener.offThePhone();
	}
	catch (e) {}
}


function  setupFlash() {

	var me = getPageParameter('me', '');
	var you = getPageParameter('you', '');
	var bw = getPageParameter('bw', '64000');
	var pq = getPageParameter('pq', '0');
	var fps = getPageParameter('fps', '15');
	var msr = getPageParameter('msr', '15');
	var url = getPageParameter('url', 'rtmp://ec2-50-17-50-100.compute-1.amazonaws.com:80/videochat');

	var fo = new FlashObject("send.swf", "lzapp", "260", "195", "6");

	fo.addParam("swLiveConnect", "true");
	fo.addParam("name", "lzapp");
	fo.addParam("quality", "high");
	fo.addParam("scale", "noscale");
	fo.addParam("salign", "LT");
	fo.addParam("menu", "false");

	fo.addVariable("ns0Name", you);
	fo.addVariable("stream", me);
	fo.addVariable("url", url);

	fo.addVariable("bandwidth", bw);
	fo.addVariable("picQuality", pq);
	fo.addVariable("framesPerSec", fps);
	fo.addVariable("micSetRate", msr);

	fo.write("red5content");

}

</script>
</head>

<body bgcolor="#000000" topmargin="0" leftmargin="0" bottommargin="0" rightmargin="100" onload="setupFlash()" onunload="killFlash()">
<div id="red5content" bgcolor="#000000" width="350" height="100" ></div>
</body>
</html>