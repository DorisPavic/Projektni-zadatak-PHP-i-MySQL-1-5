<?php
	# Database connection
	include ("dbconn.php");
print '
<!DOCTYPE html>
<html>
	<head>
		
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- End CSS -->
		<!-- meta elements -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="some description">
        <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
		
		<title>Example page - HTML5</title>
	</head>
<body>
	<header>
		<nav>';
            include("menu.php");
print '</nav>
		<div'; if ($_GET['menu'] = 1) { print ' class="welcome"'; }  print '></div>
	</header>
	<main>';

# Homepage
if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("loviste.php"); }

# About Lovište
else if ($_GET['menu'] == 2) { include("about.php"); }

# News
else if ($_GET['menu'] == 3) { include("news.php"); }

# Contact
else if ($_GET['menu'] == 4) { include("contact.php"); }

# About us
else if ($_GET['menu'] == 5) { include("gallery.php"); }

print '
	</main>
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Doris Pavić. <a href="https://github.com/DorisPavic?tab=repositories"><img src="slike/github.png" title="Github" alt="Github" style="width:30px;width:15px"></a></p>
	</footer>
</body>
</html>';
?>