<?php
	include_once('source/check_session.php');
	include("source/comment.php");
	echo "<b>INFO: The owner of this blog checks your comments the moment you submit them. You can clear your comments with the button at the bottom of the page.<br>
		You can also view the last cookie you stole by clicking the link at the bottom of the page.</b>";
	//echo "** Brief description: the admin of this site checks every comment that you post. Force their browser to send you their cookie.<br>";
	//echo "Inject some script that will send a cookie to '/grabCookie.php?cookie='. The flag is in the admin's cookie. Good luck :)<br><br>";
	//echo $_SESSION['myCookies'];
?> 

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>MY BLOG</b></h1>
  <p>Welcome to the blog of <span class="w3-tag">XSS</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="http://www.w3schools.com/w3images/woods.jpg" alt="Nature" style="width:100%">
    <div class="w3-container w3-padding-8">
      <h3><b>TELL ME HOW MUCH YOU LOVE MY BLOG</b></h3>
      <h5>I care about love, mostly in terms of how much you love me, <span class="w3-opacity">April 7, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
       <!-- <p><b>Comments:</b></p>-->
      <div class="w3-row">
      <!--
        <div class="w3-col m8 s12">
          <p><button class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black"><b>READ MORE »</b></button></p>
        </div>
      -->
        <div class="w3-col m4 w3-hide-small">
<?php
	echo $html;
?>          
        	<!--<p>Hi!</p>-->
        <div id="input">
			<form name="XSS" action="#" method="GET">
			<p><span class="w3-padding-large w3-left"><b>Enter Comment: </b></p></span><br>
			<!--- <input type="text" name="comment">-->
			<textarea rows="8" cols="80" name="comment"></textarea><br>
			<input type="submit" value="Submit">
			</form>
		</div>
		</div>
      </div>
    </div>
  </div>
  <hr>

  
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-2 w3-margin w3-margin-top">
  <img src="http://www.w3schools.com/w3images/avatar_g.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>My Name</b></h4>
      <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
    </div>
  </div><hr>
  
  <!-- Posts
  <hr> -->
 
  <!-- Labels / tags -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
    </div>
    <div class="w3-container w3-white">
    <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
    </p>
    </div>
  </div>
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <!--<button class="w3-btn w3-disabled w3-padding-large w3-margin-bottom">Previous</button>-->
  <form name="CLEAR" action="#" method="GET">
         <button class="w3-btn w3-padding-large w3-margin-bottom" name="clear" type="submit" value="True">Clear Comments</button>
  </form>
  <p>View the last cookie you stole <a href='/viewCookies.php'>here</a></p>
  <!--<button class="w3-btn w3-padding-large w3-margin-bottom">Next »</button>-->
 
</footer>

</body>
</html>


<?php
	//echo "View the last cookie you stole <a href='/viewCookies.php'>here</a><br><br>";
	//echo $html;
?>

