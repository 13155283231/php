<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>魔法师的网盘</title>
</head>

<body>
	<h1>魔法师的网盘 -- 不知道能用来干嘛</h1>
    <table id="list">
        <colgroup>
            <col width="55%">
            <col width="20%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <th><a href="?C=N&amp;O=A">File Name</a>&nbsp;<a href="?C=N&amp;O=D">&nbsp;↓&nbsp;</a></th>
                <th><a href="?C=S&amp;O=A">File Size</a>&nbsp;<a href="?C=S&amp;O=D">&nbsp;↓&nbsp;</a></th>
                <th><a href="?C=M&amp;O=A">Action</a>&nbsp;<a href="?C=M&amp;O=D">&nbsp;↓&nbsp;</a></th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td><a href="Challenge/" title="Challenge">Challenge/</a></td>
                <td>-</td>
                <td>2017-Jun-23 09:28</td>
            </tr> -->
            <?php
				// 列出文件
				$dir = @opendir('upload');
				if(!$dir) {
				 echo "Error opening the 'upload' directory!<BR>";
				 exit;
				}
				while(($files[] = readdir($dir)) !== false);
				closedir($dir);
				foreach ($files as $file) {
					if ($file=='.' || $file=='..' || $file=='') {
						continue;
					}
					$file_size = round((filesize("upload/".$file)/1024/1000),2);//获取文件大小
					$file = iconv("gbk", "utf-8", $file);  // 转码处理中文
					echo "<tr>";
					echo "<td><a href='upload/$file'>$file</a></td>";
					echo "<td>$file_size M</td>";
					echo "<td><a href='delete_file.php?file=upload/$file'>delete</a></td>";
					echo "</tr>";
				}
			?>
        </tbody>
    </table>
    <br>
    <div id="upload">
		<form action="upload_file.php" method="post" enctype="multipart/form-data">
			<label for="file">文件名:</label>
			<input type="file" name="file" id="file" /> 
			<input type="submit" name="submit" value="上传" />
		</form>
    </div>
</body>
<style type="text/css">
#list {
    width: 80%;
    border:1px solid #aaa;
    margin: 0 auto;
}
th,td {padding:0.1em 0.5em;
}
th {text-align:left;
	font-weight:bold;
	background:#eee;
	border-bottom:1px solid #aaa;
}
h1{
	width:80%; font-size:28px; margin: 0 auto 5px auto;
}
body{
	background: #f8f8f8;
}
#upload{
    margin-left: 135px;
}
</style>

</html>