<?php

if (isset($_POST['full_filename']))
{
	$filename = $_POST['full_filename'];
}
else
{
	$filename = "";
}

if (file_exists($filename))
{
    if (unlink($filename))
	{
		echo "Success!";
	}		
	
} 
else 
{
    exit("Неверный путь к файлу");
}
