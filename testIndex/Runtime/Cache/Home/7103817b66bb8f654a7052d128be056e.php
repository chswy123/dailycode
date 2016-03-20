<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link href="/testIndex/Home/Common/css/button.css" rel="stylesheet" type="text/css" />
	<style>
		body{
			background-color:#DBDBDB;
		}
		#weather{
			/*display:none;*/
			/*border:solid black 1px;*/
			width:40px;
			height:9px;
			margin-left:20px;
			font-size:20px;
			color:#BA55D3;
			/*padding:5px;*/
		}

		#block{
			display:none;
			border:solid  #FFA500 1px;
			width:400px;
			height:300px;
			margin-left:20px;
		}
	</style>
	<script type="text/javascript" src="/testIndex/Public/js/jquery-1.8.3.min.js"></script>
	<script>
		$(function(){

			$.get("http://www.dailycode.com/testIndex.php/Home/Index/ajaxtime",function(data){
				$("#time").html(data);                                                         //初始时间
			});


			$("#weather").mouseover(function(){
				$("#block").slideDown("slow",function(){
					$("#block").css("display","block")
				});
			});

			$("#weather").mouseout(function(){
				$("#block").slideUp("slow",function(){
					$("#block").css("display","none");
				});
			});

		});

		function ajaxtime(){
					$.ajax({
					type:"GET",
					url:"http://www.dailycode.com/testIndex.php/Home/Index/ajaxtime",
					dataType:"html",
					success:function(msg){
						$("#time").html(msg);
					}
				});
			}

		setInterval("ajaxtime()",1000);   


	</script>
</head>
<body>
	<br/><br/><br/>
	<span>Hi~ o(*￣▽￣*)ブ</span><br/>
		<input type="button" class="btn4" style="width:80px;" onclick="location='<?php echo U('Login/logout'); ?>'" value="注销"> 
	<div id="weather" >
		天气
	</div>


	<div id="block">
		城市：<?php echo $info['retData']['city']; ?><br/>
		日期：<?php echo $info['retData']['date']; ?>
		<?php echo $info['retData']['time']; ?><br/>
		邮编：<?php echo $info['retData']['postCode']; ?><br/>
		经度：<?php echo $info['retData']['longitude']; ?><br/>
		纬度：<?php echo $info['retData']['latitude']; ?><br/>
		海拔：<?php echo $info['retData']['altitude']; ?><br/>
		天气：<?php echo $info['retData']['weather']; ?><br/>
		气温：<?php echo $info['retData']['temp']; ?><br/>
		最低气温：<?php echo $info['retData']['l_tmp']; ?><br/>
		最高气温：<?php echo $info['retData']['h_tmp']; ?><br/>
		风向：<?php echo $info['retData']['WD']; ?><br/>
		风力：<?php echo $info['retData']['WS']; ?><br/>
		日出时间：<?php echo $info['retData']['sunrise']; ?><br/>
		日落时间：<?php echo $info['retData']['sunset']; ?><br/>
	</div>


	<div id="time"></div>
	<input type="button" class="btn4" onclick="location='<?php echo U('News/news'); ?>'" value="新闻"> 
	<input type="button" class="btn4" onclick="location='<?php echo U('Qcode/qcode'); ?>'" value="二维码生成">
	<input type="button" class="btn4" onclick="location='<?php echo U('Train/train'); ?>'" value="火车列次查询"><br/><br/>
	<input type="button" class="btn4" onclick="location='<?php echo U('Test/testindex'); ?>'" value="测试"> <br/><br/>
	<input type="button" class="btn4" onclick="location='<?php echo U('Option/option'); ?>'" value="系统管理"> 


	<!-- <input type="button" class="btn4" onclick="location='<?php echo U('Chat/chat'); ?>'" value="聊天"> -->
	<!-- <input type="button" value="Submit" class="btn4" /> -->
</body>
</html>