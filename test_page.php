<?php
include 'db_connect.php';
include 'functions.php';

sec_session_start();

$success = login('test@example.com', hash('sha512', '6ZaxN2Vzm9NUJT2y'), $mysqli);
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
        <?php
        if ($mysqli) {
            echo '<p>Connected to database successfully</p>';
        } else {
            echo '<p>Not connected</p>';
        }
        
        if ($success) {
            echo '<p>Login successful!</p>';
        } else {
            echo '<p>Login unsuccessful!</p>';
        }
        ?>
    </body>
</html>
