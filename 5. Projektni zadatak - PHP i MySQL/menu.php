<?php
include("dbconn.php");
print '
	<ul>
	<li><a href="index.php?menu=1">Home</a></li>				
    <li><a href="index.php?menu=2">About Lovište</a></li>
    <li><a href="index.php?menu=3">News and information</a></li>
    <li><a href="index.php?menu=4">Contact us</a></li>
    <li><a href="index.php?menu=5">Gallery</a></li>
    <li><a href="index.php?menu=11">Find a movie</a></li>';
if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
    print '
            <li><a href="index.php?menu=6">Register</a></li>
			<li><a href="index.php?menu=7">Sign In</a></li>';
}
else if ($_SESSION['user']['valid'] == 'true') {
    if ($_SESSION['user']['role'] == 'Administrator') {
        print '
    <li><a href="index.php?menu=8">Administration</a></li>';
    }
    else if ($_SESSION['user']['role'] == 'Editor') {
        print '
    <li><a href="index.php?menu=9">Editing</a></li>';
    }
    else if ($_SESSION['user']['role'] == 'User') {
        print '
    <li><a href="index.php?menu=10">Add news</a></li>';
    }
    print'
			<li><a href="signout.php">Sign Out</a></li>';
}
print '
	</ul>';
?>
