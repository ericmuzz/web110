<!DOCTYPE html>
<html>
 <head>
  <title>Mae Flour</title>
  <meta name="robots" content="noindex,nofollow" /> 
  <meta name = "viewport" content = "width=device-width" />
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/big.css" />
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="stylesheet" href="css/forms.css" />
  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://s3.amazonaws.com/menumaker/menumaker.min.js" type="text/javascript"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 </head>
 <body>
  <div class="wrapper">
   <header>
    <a href="index.html">
        <img class="title" src="images/maeflour_logo.png">
    </a> 
    <nav id="cssmenu">
      <ul>
        <li><a href="index.html"><i class="fa fa-fw fa-institution"></i> Mae Flour</a></li>
        <li><a href="bakerymenu.html"><i class="fa fa-fw fa-home"></i> Bakery Menu</a></li>
        <li><a href="catering.html"><i class="fa fa-fw fa-globe"></i> Catering</a></li>
        <li><a href="events.html"><i class="fa fa-fw fa-thumbs-o-up"></i> Events</a></li>
        <li><a href="gallery.html"><i class="fa fa-fw fa-camera-retro"></i> Image Gallery</a></li>
        <li><a href="#"><i class="fa fa-fw fa-bars"></i> About</a>
            <ul>
                <li><a href="contact.php"><i class="fa fa-fw fa-calendar"></i> Contact Us!</a></li>
                <li><a href="location.html"><i class="fa fa-fw fa-map-o"></i> Location</a></li>
            </ul>
        </li>
      </ul>  
    </nav>
   </header>
      <!-- Start left column -->
   <section>
    <h2 class="pageID">Contact Us!</h2>
    <?php
        
        include 'includes/multiple.php';
	?>
   </section>
      <!-- end left column -->

  </div>
  <footer>
       <p><small>&copy; 2018 by <a href="contact.php" target="_blank">Eric Muzzarelli</a>, All Rights Reserved ~ <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~ <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a></small></p>
       <p><a href="disclaimer.html">Disclaimer</a></p>
   </footer>

 </body>
</html>