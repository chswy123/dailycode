<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Music</title>
</head>
<body>
	<form action="<?php echo U('Music/song'); ?>" method="POST" />
		歌名：<input type="text">
		<input type="submit" value="搜索">
	</form>
	
</body>
</html>