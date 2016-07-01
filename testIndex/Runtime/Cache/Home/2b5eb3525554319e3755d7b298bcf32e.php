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


<body>
	<h1>添加权限</h1>
	<form action="<?php echo U('Option/acladd'); ?>" method="post">
		选择上级权限：
		<select name="" id="">
			<option value="0">顶级权限</option>

			<option value=""></option>

		</select>
		<br/>
		权限名称：<input type="text" name="acl_name"><br/><br/>
		模块：<input type="text" name="moudle"><br/><br/>
		控制器：<input type="text" name="controller"><br/><br/>
		方法：<input type="text" name="action"><br/>
		<input type="submit" value="提交">
	</form>

	
</body>