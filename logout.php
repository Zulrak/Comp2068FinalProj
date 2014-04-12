<!--
File Name: logout.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page runs when the user clicks
logout. It removes the session and redirects to 
the home page.
-->
<?php
//open the session
session_start();
//destroy the session
session_destroy();
//redirect
header("location:index.html");
exit();
?>