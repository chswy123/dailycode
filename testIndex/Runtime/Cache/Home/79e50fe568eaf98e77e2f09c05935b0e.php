<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>

	<link rel="stylesheet" type="text/css" href="/testIndex/Home/Common/jqdate/tcal.css" />
	
	<script type="text/javascript" src="/testIndex/Home/Common/jqdate/tcal.js"></script> 
	<script type="text/javascript" src="/testIndex/Public/js/jquery-1.8.3.min.js"></script>
	<script>
	// $("#click").click(function($this()));
	// $("#click").click("documentwrite('123')");
	</script>

</head>
<body>
	
	<a href="<?php echo U('Index/index'); ?>">首页</a>
	<br/>



<!-- /testIndex.php/Home/Qcode/msg -->
	<form method='POST' action="<?php echo U('Qcode/msg'); ?>" >
		
		填域名生成二维码：<input type="text" name='msg'>
		<button type='submit'>提交</button>
	</form>
	<img src="<?php echo $info['url']; ?>" alt="">
</body>
</html>