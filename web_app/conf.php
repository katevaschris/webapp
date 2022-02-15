<?php
//for localhost
$db = new mysqli('localhost', 'root', '', 'users');

if($db->connect_errno)
{
	//echo $db->connect_error; // Για εμφάνιση σφαλμάτων σύνδεσης με τη βάση. Μετά το development θα πρέπει να μείνει MONO το παρακάτω.
	die('There was an error while trying to connect to database!');
}

// We define that all query executions will be on utf-8 encoding
mysqli_set_charset($db, 'utf8');
$encKey = '@fbh*56@';
?>
