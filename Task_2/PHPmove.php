<?php

if (isset($_POST['full_filename']))
{
	$filename = $_POST['full_filename'];
}
else
{
	$filename = "";
}
	
if (isset($_POST['new_directory']))
{
	$dir = $_POST['new_directory'];
}
else
{
	$dir = "";
}
		

if (file_exists($filename) && is_dir($dir))
{
    if (rename($filename, $dir.pathinfo($filename)['basename']))
    {
        echo "Success!";
    }
} 
elseif (!file_exists($filename)) 
{
    exit("Файл по пути не найден");
} 
else 
{
    exit("Неверный путь к директории"); 
}

