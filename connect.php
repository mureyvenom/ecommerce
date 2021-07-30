<?php

$connect = mysqli_connect('localhost', 'commerce', 'e-commerce1', 'commerce');

if(!$connect)
{
	echo 'Database connection error';
	exit;
}

?>
