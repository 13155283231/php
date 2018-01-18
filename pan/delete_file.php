<?php 
$file = $_GET['file'];
$file = iconv("utf-8", "gbk", $file);
$result = @unlink ($file); 
if ($result == true) { 
	echo '蚊子赶走了'; 
} else { 
	echo '无法赶走'; 
} 
?> 