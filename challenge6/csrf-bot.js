var page = require('webpage').create();
var system = require('system');
var args = system.args;
var host = "ctf.uosec.info:5051";
var url = "http://"+host+"/csrf_tmp/"+system.args[1]; //this arg directs the browser to the user's tmp file containing their comments
var timeout = 2000;

if (args.length === 1) {
	console.log('No args received');
} else {
	args.forEach(function(arg, i) {
		console.log(i + ':' + arg);
	});
}

//this is not the flag. This cookie doesn't even get added to the browser request. Seems like a bug with phantomjs
//The actual flag gets set in the user's tmp file via php's setcookie() found in html/source/comments.php
phantom.addCookie({
	'name': 'Flag',
	'value': 'CTF{44dc13922a2f0f7a59c5058703fae0b9}',
	'domain': host,
	'path': '/xss_tmp/om77mcedteb8848cq2d623pv93XSS-BOT.php',
	'httponly': false
});

page.onNavigationRequested = function(url, type, willNavigate, main) {
    console.log("[URL] URL="+url);  
};
 
page.settings.resourceTimeout = timeout;
page.onResourceTimeout = function(e) {
    setTimeout(function(){
        console.log("[INFO] Timeout")
        phantom.exit();
    }, 1);
};
 
page.open(url, function(status) {
    console.log("[INFO] rendered page");
    //page.render(url);
    setTimeout(function(){
        phantom.exit();
    }, 1);
});
