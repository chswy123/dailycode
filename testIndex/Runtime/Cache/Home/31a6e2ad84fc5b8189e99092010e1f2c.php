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


	<style>
		#box{
			border:solid black 1px;
			height:400px;
			width:800px;
			margin-left:200px;
			overflow-y:auto;
			overflow-x:hidden;
			word-wrap:break-word;
		}

		#typein{
			border:solid black 1px;
			height:100px;
			width:800px;
			margin-top:20px;
			margin-left:200px;
		}

		textarea{
			width:790px;
			height:90px;
			resize:none;
			margin-left:2px;
		}

		input{
			margin-left:950px;
			margin-top:10px;
		}
	</style>
	
	<script type="text/javascript" src="/testIndex/Public/js/jquery-1.8.3.min.js"></script>
	<script>
		$(function(){
			$("#send").click(function(){
				var chat=$("#con").val();
				$("#con").val("");
				// console.log(chat);

				$.ajax({
					type:"POST",
					url:"http://www.wxtest.com/testIndex.php/Home/Chat/ajaxsave",
					data:"data="+chat,
					dataType:"text",
					success:function(msg){
						// console.log(msg);
						$("#box").append("<div>"+msg+"</div>")
						// alert(msg);
					}
				});
			});

			$("#clear").click(function(){
				$("#box").html("");
			});
		});


	</script>
	<div>游客你好：<?php echo $ipname; ?></div>
	<div id="box"></div>
	
	<form action="U()" method="post">
		<div id="typein">
			<textarea name="" id="con" cols="30" rows="10" wrap="soft"></textarea>
		</div>
		<input type="button" value="发送" id="send">
		<input type="button" value="清除记录" id="clear">
	</form>
</body>
</html>