<?php

/* 
 * Copyright (C) 2013 peter
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define("HOST", "localhost"); 			// The host you want to connect to. 
define("USER", "sec_user"); 			// The database username. 
define("PASSWORD", "4Fa98xkHVd2XmnfK"); 	// The database password. 
define("DATABASE", "secure_login");             // The database name.

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
