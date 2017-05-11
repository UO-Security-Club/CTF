<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/navbar.css">
<!-- Bootstrap Core CSS -->
     <link href="../css/bootstrap.css" rel="stylesheet">
     <!-- Custom CSS -->
     <!-- -->
	<link href="../css/full-width-pics.css" rel="stylesheet">
     <!--Modal CSS-->
     <link href="../css/modal.css" rel="stylesheet">
     <?php
          require("user_includes/accountInfo.php");
     ?>
</head>
<body>
<section>
<div class="container">
     <h1>Challenges:</h1>
     <br>

     <h2>x86 Stack-Based Memory Corruption:</h2>
     <!-- Stack-Based Memory Corruption Modals -->
     <div>

          <!--Canary Challenge 1 -->
          <div id="NWBChal1Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick = "closeWithSpan(document.getElementById('NWBChal1Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b>Canary Example 1 : 10pts</b></h3>
                              <br>
                              <p><b>Description:</b><br> We've implemented a 'super-secure' stack canary to mitigate inaccurate return values from 
                              func1() due to buffer overflows. Overwrite the error variable to a non-zero value and the process will barf out a 
                              flag for you.</p>
                              <p><b>Connect to the program remotely with:</b><br> nc 35.160.19.245 4001</p>

                              <a href="../images/ctf_canary_example1-src.png">Source Code</a><br>
                              <a href="https://drive.google.com/a/uosec.info/file/d/0BwRJUP-ZgBwsZXc0dUJXcExQUmc/view?usp=sharing">Download Binary</a><br>
                              <form action="checkFlag.php" method="post" name="chal1">
                                   <!--<label for="chal1_flag">Enter Flag:</label>-->
                                   <input id="chal1_flag" class="chals" type="text" name="flag" placeholder="Enter Flag" required />
                                   <input type="hidden" name="chal_flag" value="chal1" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!--Canary Challenge 2 -->
          <div id="NWBChal2Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick = "closeWithSpan(document.getElementById('NWBChal2Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b>Canary Example 2 : 30pts</b></h3>
                              <br>
                              <p><b>Description:</b><br> The funny thing about the rand() function's randomness is that it's only as random as the seed it's given.. Do you know what time it is?</p>
                              <p><b>Connect to the program remotely with:</b><br> nc 35.160.19.245 4002</p>

                              <a href="../images/ctf_canary_example2-src.png">Source Code</a><br>
                              <a href="https://drive.google.com/a/uosec.info/file/d/0BwRJUP-ZgBwsTU94T1NNaFRRenM/view?usp=sharing">Download Binary</a><br>
                              <form action="checkFlag.php" method="post" name="chal1">
                                   
                                   <input id="canary2_flag" class="chals" type="text" name="flag" placeholder="Enter Flag" required />
                                   <input type="hidden" name="chal_flag" value="canary2" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

           <!--Canary Challenge 3 -->
          <div id="NWBChal3Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick = "closeWithSpan(document.getElementById('NWBChal3Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b>Canary Example 3 : 30pts</b></h3>
                              <br>
                              <p><b>Description:</b><br> [TO-DO]</p>
                              <p><b>Connect to the program remotely with:</b><br> nc 35.160.19.245 4003</p>

                              <a href="../images/ctf_canary_example3-src.png">Source Code</a><br>
                              <a href="">Download Binary</a><br>
                              <form action="checkFlag.php" method="post" name="chal1">
                                   <!--<label for="chal1_flag">Enter Flag:</label>-->
                                   <input id="canary3_flag" class="chals" type="text" name="flag" placeholder="Enter Flag" required />
                                   <input type="hidden" name="chal_flag" value="canary3" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     <!-- Stack-Based Memory Corruption Modals -->
     <!-- Stack-Based Memory Corruption Buttons -->
     <div id="NativeChallengeButtons">
         <button class="modal-button" id="NWBChal1Btn" onclick="openModal(document.getElementById('NWBChal1Modal'))">Canary Example 1<br>10 pts</button>
         <button class="modal-button" id="NWBChal2Btn" onclick="openModal(document.getElementById('NWBChal2Modal'))">Canary Example 2<br>30 pts</button>
         <button class="modal-button" id="NWBChal3Btn" onclick="openModal(document.getElementById('NWBChal3Modal'))">Canary Example 3<br>30 pts</button>
     </div>
     <!-- End Native Whitebox Challenge Buttons -->
     <br>

     <h2>Native: (Reverse Engineering Intro)</h2>
     <!-- Native Blackbox Modals -->
     <div>

          <!-- Native Blackbox Challenge 1 -->
          <div id="NBBChal1Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick = "closeWithSpan(document.getElementById('NBBChal1Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><u><b>Challenge 1 (Reverse ELF-32bit / Hidden Functionality) : 15pts</b></u></h3>
                              <br>
                              <p><u>Description:</u> Use your disassembler of choice to reverse engineer the binary file. Try to find the hidden functionality that prints the flag. <br>
                              You can download the binary file at the link below. Once you've found the hidden functionality, run it on netcat (nc) as specified below.</p>
                              <p>Connect to the program remotely with: nc 35.160.19.245 4477</p>

                              <a href="https://drive.google.com/open?id=0BwRJUP-ZgBwsQ2xNVWMxdVN0QlU">Binary File</a>
                              <form action="checkFlag.php" method="post" name="chal1">
                                   <label for="re1_flag">Enter Flag:</label>
                                   <input id="re1_flag" class="chals" type="text" name="flag" required />
                                   <input type="submit" name="chal_flag" value="reverse1" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

     </div>
     <!-- End Native Blackbox Modals -->
     <!-- Native Blackbox Challenge Buttons -->
     <div id="ReverseChallengeButtons">
          <button class="modal-button" id="NBBChal1Btn" onclick="openModal(document.getElementById('NBBChal1Modal'))">RE [Not Available]<br>15pts</button>
     </div>
     <!-- End Native Blackbox Challenge Buttons -->
     <br>

     <h2>Crypto (classical): </h2>
     <!-- Crypto Modals -->
     <div>

          <!-- Crypto Challenge 1 -->
          <div id="CryptoChal1Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal1Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 1: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Something simple to start with, before the main course. </p>
                              <p>Ciphertext: XVATBSZVKRQFNYNQF</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto1" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Crypto Challenge 2 -->
          <div id="CryptoChal2Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal2Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 2: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Mirror mirror on the wall...</p>
                              <p>Ciphertext: HOBSLOBLOWDRAZIW</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto2" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Crypto Challenge 3 -->
          <div id="CryptoChal3Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal3Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 3: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> An affinity for math may be helpful for this one.</p>
                              <p>Ciphertext: FYYZSPGFNYBCFXZKQPC <br> a=9 b=5</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto3" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Crypto Challenge 4 -->
          <div id="CryptoChal4Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal4Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 4: 10pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Rome's favorite square.</p>
                              <p>Ciphertext: 142335321411321345512321322115511432 <br> k=HISTORY</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto4" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Crypto Challenge 5 -->
          <div id="CryptoChal5Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal5Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 5: 10pts</u></b></h3>
                              <br>
                              <p><u>Description:</u><br><img src="https://i.imgflip.com/1ibcpm.jpg" /></p>
                              <p>Ciphertext: 64265367686533734987754684686674268577 <br> k=MARMOT</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto5" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Crypto Challenge 6 -->
          <div id="CryptoChal6Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('CryptoChal6Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 6: 10pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> This cipher, like the next cipher, is a cipher to end all ciphers.</p>
                              <p>Ciphertext: XDFDGXFFXAAFFGAGFGDAFGDDFXXDDDAAAADDGDFGAFGD <br> k=SPRING</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="crypto6" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

     </div>
     <!-- End Crypto Modals -->
     <!-- Crypto Challenge Buttons -->
     <div id="CryptoChallengeButtons">
          <button class="modal-button" id="CryptoChal1Btn" onclick="openModal(document.getElementById('CryptoChal1Modal'))" >Challenge 1<br>5pts</button>
          <button class="modal-button" id="CryptoChal2Btn" onclick="openModal(document.getElementById('CryptoChal2Modal'))" >Challenge 2<br>5pts</button>
          <button class="modal-button" id="CryptoChal3Btn" onclick="openModal(document.getElementById('CryptoChal3Modal'))" >Challenge 3<br>5pts</button>
          <button class="modal-button" id="CryptoChal4Btn" onclick="openModal(document.getElementById('CryptoChal4Modal'))" >Challenge 4<br>10pts</button>
          <button class="modal-button" id="CryptoChal5Btn" onclick="openModal(document.getElementById('CryptoChal5Modal'))" >Challenge 5<br>10pts</button>
          <button class="modal-button" id="CryptoChal6Btn" onclick="openModal(document.getElementById('CryptoChal6Modal'))" >Challenge 6<br>10pts</button>
     </div>
     <!-- End Crypto Challenge Buttons -->


     <h2>Steganography: </h2>
     <!-- Steganography Modals -->
     <div>

          <!-- Steganography Challenge 1 -->
          <div id="StegChal1Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal1Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 1: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> THARS FLAGS IN THEM THAR PIXELS!</p>
                              <p>Flag format is UOSEC_[******]</p>
                              <p><img src= "../images/steg1.bmp" /></p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg1" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Steganography Challenge 2 -->
          <div id="StegChal2Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal2Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 2: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Just have to dig a little deeper this time.</p>
                              <p>Flag format is UOSEC_[******]</p>
                              <p><img src= "../images/steg2.bmp" /></p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg2" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Steganography Challenge 3 -->
          <div id="StegChal3Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal3Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 3: 5pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Cats have magic abilities.</p>
                              <p>Flag format is UOSEC_[******]</p>
                              <p><img style='height: auto; width: auto; max-height: 100%; max-width:100%; object-fit: contain' src="../images/steg3.jpg" /></p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg3" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Steganography Challenge 4 -->
          <div id="StegChal4Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal4Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 4: 10pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> Not fun to do by hand. </p>
                              <p>Flag format is UOSEC_[******]</p>
                              <p><img style='height: auto; width: auto; max-height: 100%; max-width:100%; object-fit: contain' src= "../images/steg4.bmp" /></p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg4" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Steganography Challenge 5 -->
          <div id="StegChal5Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal5Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 5: 10pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> This album has a ton of tracks on it, but only a few singles.</p>
                              <p>Flag format is UOSEC_[******]</p>
                              <p><img style='height: auto; width: auto; max-height: 100%; max-width:100%; object-fit: contain' src="../images/steg5.png" /></p>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg5" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Steganography Challenge 6 -->
          <div id="StegChal6Modal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                    <span class="close" id="span1" onclick="closeWithSpan(document.getElementById('StegChal6Modal'))" style="color:#FFFFFF;">&times;</span>
                    <div class="row">
                         <div class="col-lg-12">
                              <h3><b><u>Challenge 6: 10 pts</u></b></h3>
                              <br>
                              <p><u>Description:</u> A tasty one.</p>
                              <p>Flag format is UOSEC_[******] with the deciphered message in uppercase, between the brackets.</p>
                              <p>S<b>o</b>me <b>b</b>ooks a<b>r</b>e to <b>b</b>e t<b>ast</b>ed<br>
                              <b>o</b>th<b>e</b>rs to b<b>e</b> <b>s</b>w<b>a</b>ll<b>o</b>w<b>ed</b><br>
                              and some fe<b>w</b> to b<b>e</b> ch<b>ewe</b>d a<b>n</b>d d<b>i</b>gest<b>e</b>d<br>
                              SF<b>B</b></p>
                              <br>
                              <form action="checkFlag.php" method="post" name="chalN">
                                   <label for="chalN_flag">Enter Flag:</label>
                                   <input id="chalN_flag" class="chals" type="text" name="flag" required />
                                   <input type="hidden" name="chal_flag" value="steg6" />
                                   <input type="submit" />
                              </form>
                         </div>
                    </div>
               </div>
          </div>

     </div>
     <!-- End Steganography Modals -->
     <!-- Steganography Challenge Buttons -->
     <div id="SubsectionChallengeButtons">
          <button class="modal-button" id="StegChal1Btn" onclick="openModal(document.getElementById('StegChal1Modal'))" >Challenge 1<br>5pts</button>
          <button class="modal-button" id="StegChal2Btn" onclick="openModal(document.getElementById('StegChal2Modal'))" >Challenge 2<br>5pts</button>
          <button class="modal-button" id="StegChal3Btn" onclick="openModal(document.getElementById('StegChal3Modal'))" >Challenge 3<br>5pts</button>
          <button class="modal-button" id="StegChal4Btn" onclick="openModal(document.getElementById('StegChal4Modal'))" >Challenge 4<br>10pts</button>
          <button class="modal-button" id="StegChal5Btn" onclick="openModal(document.getElementById('StegChal5Modal'))" >Challenge 5<br>10pts</button>
          <button class="modal-button" id="StegChal6Btn" onclick="openModal(document.getElementById('StegChal6Modal'))" >Challenge 6<br>10pts</button>
     </div>
     <!-- End Steganography Challenge Buttons -->

</div>
</section>
<br>
<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UOSec 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>

<script src="../js/modalScript.js"></script>
</body>
</html>
