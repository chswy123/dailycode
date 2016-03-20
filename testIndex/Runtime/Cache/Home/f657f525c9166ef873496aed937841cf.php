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
	<a href="<?php echo U('Login/logout'); ?>">退出</a>
	<br/>

	


	

	<h4>输入城市查询列车班次</h4>
	<form action="<?php echo U('Train/chaxun'); ?>" method="POST">
		出发城市：<input type="text" name="chufa" ><br/><br/>
		到达城市：<input type="text" name="daoda" ><br/><br/>
		<div>出发日期：<input type="text" name="date" class="tcal" value="" /></div>&nbsp;&nbsp;&nbsp;
		<input type="submit" value="查询">
	</form>
	
</body>
</html>