<?php
// To create the password hash you will need to use the following code. 
// Make sure the value of $_POST['p'] is already hashed from JavaScript.
//   
// If you are not using this method because you want to validate the password 
// server side then make sure you hash it
include 'db_connect.php';

// The data passed in from the registration form (needs to be filtered)
$username = $_POST['username'];
$email = $_POST['email'];

// The hashed password from the form 
$password = $_POST['p']; 

// Create a random salt 
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true)); 

// Create salted password (Careful not to over season) 
$password = hash('sha512', $password.$random_salt);

// Add your insert to database script here. 
// Make sure you use prepared statements! 
if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, 							password, salt) VALUES (?, ?, ?, ?)")) { 
	$insert_stmt->bind_param('ssss', $username, $email, 
				$password, $random_salt); 
	// Execute the prepared query.
	$insert_stmt->execute(); 
}
?>
<!DOCTYPE html>
<!--
Copyright (C) 2013 peter

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <?php
        // put your code here
        ?>
    </body>
</html>
