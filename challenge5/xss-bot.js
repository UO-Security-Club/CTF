var page = require('webpage').create();
var host = "ec2-35-167-126-129.us-west-2.compute.amazonaws.com:5041";
var url = "http://"+host+"/xss_tmp/cm9me8bo83d47ve6tc2d237p8qXSS-BOT.php";
var timeout = 2000;
var system = require('system');
var args = system.args;

if (args.length === 1) {
	console.log('No args received');
} else {
	args.forEach(function(arg, i) {
		console.log(i + ':' + arg);
	});
	seshID = system.args[1];
}

//phantom.clearCookies();
phantom.addCookie({
    'name': 'Flag',
    'value': 'UOSEC_FLAG',
    'domain': host,  
    'path': '/',
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
    //console.log(document.cookie);
    //console.log("Status: " + status);
    //if(status === "success") {
    //	page.render('example.png');
    //}
    setTimeout(function(){
        phantom.exit();
    }, 1);
});
