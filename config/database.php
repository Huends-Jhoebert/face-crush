<?php
$server = 'localhost'; //server name; xammpp default is localhost
$uname = 'root'; //mysql username; root is the default username
$pword = ''; //mysql password; blank is the default of xammpp
$dbname = 'face_crush_db'; //name of the DB to be used
$conn = new mysqli($server, $uname, $pword, $dbname); //this variable is the one that will connect to the database;
