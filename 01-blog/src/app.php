<?php

if(isset($_GET['post']))
{
	$postName = $_GET['post'];
	require 'src/post/index.php';
	return;
}
else if(isset($_GET['view']))
{
	$view = $_GET['view'];
	require 'src/'. $view . '.php';
	return;
}else
{
	require 'src/home.php';
	return;
}



?>