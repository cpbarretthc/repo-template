<?php

$conn = mysqli_connect('localhost', 'root', '', 'commentsection'); //server

if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
