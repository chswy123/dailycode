<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link href="/testIndex/Home/Common/css/button.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/testIndex/Public/js/jquery-1.8.3.min.js"></script>
	<script>
		$(function(){
			$.ajax({
				type:"GET",
				url:"/testIndex.php/Home/Index/Index/ajaxtime",
				dataType:"html",
				success:function(msg){
					// location.reload();
					// $("#time").html(ajaxtime);
					alert(msg);
				}
			});
		});
	</script>
</head>
<body>
	<h3>Hi~ o(*￣▽￣*)ブ</h3>
	<div id="time"></div>
	<input type="button" class="btn4" onclick="location='<?php echo U('News/news'); ?>'" value="新闻"> 
	<input type="button" class="btn4" onclick="location='<?php echo U('Qcode/qcode'); ?>'" value="二维码生成">
	<input type="button" class="btn4" onclick="location='<?php echo U('Train/train'); ?>'" value="火车列次查询">
	<input type="button" class="btn4" onclick="location='<?php echo U('Music/music'); ?>'" value="音乐搜索">
	<!-- <input type="button" value="Submit" class="btn4" /> -->
</body>
</html>