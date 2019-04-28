 <?php
 //logout.php
 session_start();
 session_unset();
 session_destroy();
 ?>

 <!DOCTYPE html>
 <html>
 <!--Austin Cultra, Austin Kirby, Lana Therrien, Group Project-->
 <head>
   <title>Guide to Bowling Green</title>

   <meta charset="utf-8" />
   <link href="../cssFiles/style.css" type="text/css" rel="stylesheet" />
   <script src="../javascripts/controlOperations.js" type="text/javascript"> </script>

 </head>
     <body id="page1">
         <!--Top Navigation Bar -->

         <div class="topNav">
             <ul>
                 <li class="title"><h2>Welcome to Bowling Green</h2></li>
                 <li><a class="active" href="../index.html">Home</a></li>
                 <li><a href="../visit.html" id="tToQ">Visit here</a></li>
                 <li><a href="../eat.html" id="tToS">Eat here</a></li>
                 <li><a href="../living.html" id="tToA">Live here</a></li>
                 <li class="right"><a href="register.php">Register</a></li>
                 <li class="right"><a href="login.php">Login</a></li>
             </ul>
         </div>

         <div>
             <h1> Welcome to Bowling Green, Your Town</h1>
         </div>
         <div>
             <h2> You have successfully logged out.</h2>
         </div>
     </body>
 </html>
