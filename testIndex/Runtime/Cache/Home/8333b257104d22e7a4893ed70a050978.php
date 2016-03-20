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


<style>
	#testtable{
		border:solid 1px black; 
		width:500px;
	}
</style>
<!-- hellow! -->

<table id="testtable" >
		<tr>
			<th>id</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>爱好</th>
			<th>地址</th>
		</tr>
	<?php foreach($info as $v){ ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['user_name']; ?></td>
			<td><?php echo $v['sex']==1?'男':'女'; ?></td>
			<td><?php echo $v['age']; ?></td>
			<td><?php echo $v['habbit']; ?></td>
			<td><?php echo $v['adress']; ?></td>
		</tr>
	<?php } ?>
</table>