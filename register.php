<?php
// To create the password hash you will need to use the following code. 
// Make sure the value of $_POST['p'] is already hashed from JavaScript.
//   
// If you are not using this method because you want to validate the password 
// server side then make sure you hash it
include 'db_connect.php';

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
// The data passed in from the registration form (needs to be filtered)
    $username = $_POST['username'];
    $email = $_POST['email'];

    // TODO: We need to do server side checking here in case the POST data has
    // been tampered with.
    // 
    // Username should contain only upper and lowercase letters, digits, underscores and hyphens
    // Email should validate as an email
    // It should not be possible to enter a username or email that already exists in the db
    //
    // It should also be possible to ensure that the password length is acceptable
    // There's no obvious way of doing this except, perhaps, by passing the password
    // length in the post data.

// The hashed password from the form 
    $password = $_POST['p'];

// Create a random salt
    $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes (16), TRUE));

// Create salted password (Careful not to over season) 
    $password = hash('sha512', $password . $random_salt);

// Add your insert to database script here. 
// Make sure you use prepared statements! 
    if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
        $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
        // Execute the prepared query.
        $insert_stmt->execute();
    }
    header('Location: ./register_success.php');
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
        <title>Registration Form</title>
        <script type="text/JavaScript" src="sha512.js"></script> 
        <script type="text/JavaScript" src="forms.js"></script>
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Under development...</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
            Username: <input type='text' name='username' id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form, 
                                                this.form.username, 
                                                this.form.email, 
                                                this.form.password, 
                                                this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>
