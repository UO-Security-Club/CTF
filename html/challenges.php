
<!DOCTYPE html>
<html>
<head>
<?php
	include_once("user_includes/accountInfo.php");
?>
<link href="css/modal.css" rel = "stylesheet">
<h1>Challenges:</h1>
<body>
<br>
<h2>Native: (Whitebox Intro)</h2>
<div>

	<u><b>Challenge 1 (Buffer Overflow Vuln) : 10pts</b></u>
	<p><u>Description:</u> This program is vulnerable to a simple buffer overflow. The goal here is to overwrite the <b>i</b> variable to a non-zero value</p>
	<p>Connect to the program remotely with: nc 35.167.126.129 4445</p>
	<a href="images/exploit1_src_code.png">Source Code</a>
	<form action="checkFlag.php" method="post" name="chal1">
		<label for="chal1_flag">Enter Flag:</label>
		<input id="chal1_flag" class="chals" type="text" name="flag" required />
	
		<input type="submit" name="chal_flag" value="exploit1" />
	</form>

</div>
<br><br>
<div>
	<u><b>Challenge 2 (Integer Overflow Vuln) : 10pts</b></u>
	<p><u>Description:</u> This program is vulnerable to a trivial integer overflow. By assigning an int variable to an unsigned short, the int value is truncated.<br>
	The goal here is to show how a non-zero int value can result in an unsigned short equal to zero. Here's a good article on integer overflows <a href="http://phrack.org/issues/60/10.html">Basic Integer Overflows</a></p>
	<p>Connect to the program remotely with: nc 35.167.126.129 4455</p>

	<a href="images/exploit2_src_code.png">Source Code</a>
	<form action="checkFlag.php" method="post" name="chal2">
                <label for="chal2_flag">Enter Flag:</label>
                <input id="chal2_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="exploit2" />
        </form>

</div>
<br><br>
<div>
        <u><b>Challenge 3 (Format String Vuln) : 10pts</b></u>
	<p><u>Description:</u> This program has a classic format string vulnerability. In short, this allows input data to be evaluated as format string parameters. <br>
	The goal here is trick printf into reading the global string variable that holds the flag.</p>
        <p>Connect to the program remotely with: nc 35.167.126.129 4466</p>

        <a href="images/exploit3_src_code.png">Source Code</a>
        <form action="checkFlag.php" method="post" name="chal2">
                <label for="chal3_flag">Enter Flag:</label>
                <input id="chal3_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="exploit3" />
        </form>

</div>
<br><br>
<h2>Native: (Reverse Engineering Intro)</h2>
<div>
        <u><b>Challenge 1 (Reverse ELF-32bit / Hidden Functionality) : 15pts</b></u>
        <p><u>Description:</u> Use your disassembler of choice to reverse engineer the binary file. Try to find the hidden functionality that prints the flag. <br>
	You can download the binary file at the link below. Once you've found the hidden functionality, run it on netcat (nc) as specified below.</p>	
        <p>Connect to the program remotely with: nc 35.167.126.129 4477</p>

        <a href="https://drive.google.com/open?id=0BwRJUP-ZgBwsQ2xNVWMxdVN0QlU">Binary File</a>
        <form action="checkFlag.php" method="post" name="chal1">
                <label for="re1_flag">Enter Flag:</label>
                <input id="re1_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="reverse1" />
        </form>

</div>
<br><br>
<h2>Web App: (Intro)</h2>
<div>
        <u><b>Challenge 1 (Basic Burp Suite / Poor Data Validation) : 10pts</b></u>
        <p><u>Description:</u> At the webiste linked below is a simple js game that tracks high scores. When the game is done, your score is submitted as a POST request <br>
	and compared against the backend database. The goal here is to intercept the POST request and modify your score to beat LaunchPad-Johnson.</p>

        <a href="http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com:5001/">Go to website</a>
        <form action="checkFlag.php" method="post" name="chal2">
                <label for="web1_flag">Enter Flag:</label>
                <input id="web1_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="web1" />
        </form>

</div>
<br><br>
<div>
        <u><b>Challenge 2 (Reflected XSS) : 10pts</b></u>
	<p><u>Description:</u> At the website linked below is a QA testing interface for a databse search algorithm. The search parameter is then reflected back to the <br>
	user in the response without any input sanitation. The goal here is to inject JavaScript's <b>alert()</b> function to create a pop-up window.</p>

        <a href="http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com:5011/">Go to website</a>
        <form action="checkFlag.php" method="post" name="chal2">
                <label for="web2_flag">Enter Flag:</label>
                <input id="web2_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="web2" />
        </form>

</div>
	<br><br>
<div>
        <u><b>Challenge 3 (Reflected XSS / Cookie Stealer) : 15pts</b></u>
        <p><u>Description:</u> During the previous exercise you were introduced to reflected XSS, in this challenge, you injected a script that was executed by the browser to generate a popup with the flag.  How can we leverage this? Notice, the last challenge uses a GET request, which means the request is displayed in the URL. One way to leverage a XSS exploit is by crafting a malicious link with our script embedded in the URL. In this challenge we will assume we have crafted and sent a malicious link to an unsuspecting admin. In return we have received the admin’s cookie, which we can use to send a request with his/her identity to access flag.php</p>

	<br><p>Here's the admin's cookie, we stole it for you: PHPSESSID=91u0v2dg3050iqfb5e9lcrjfm5</p>
        <a href="http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com:5021/">Go to website</a>
        <form action="checkFlag.php" method="post" name="chal2">
                <label for="web3_flag">Enter Flag:</label>
                <input id="web3_flag" class="chals" type="text" name="flag" required />

                <input type="submit" name="chal_flag" value="web3" />
        </form>

</div>

<br>
<script src="js/modalScript.js"></script>
</body>
</html>
