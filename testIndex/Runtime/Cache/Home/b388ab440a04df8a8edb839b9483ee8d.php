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


<link href="/testIndex/Home/Common/css/button.css" rel="stylesheet" type="text/css" />
<style>
		body{
			background-color: grey;
		}

		#contenta{
			width:400px;
			height:200px;
			color:black;
			font-size:15px;
			margin-left:-11px;
		}

		#blocka{
			width:400px;
			height:400px;
			border:solid #eeeeee;
			float:left;
			margin:40px;
			background-color:#00FFFF;
		}
		
		#imga{
			height:150px;
		}
		
		#change{
			width:50px;
			height:20px;
		}


</style>
	
	<div id="change">
		<input type="button" class="btn4" onclick="location.reload()" value="换一换">
	</div>
	
 	<?php foreach($info as $k=>$v){ ?>

		<div id="blocka">
			<h4><a href="<?php echo $v['url']; ?>"><?php echo $v['title'];?></a></h4>

	 		<div id="imga">
	 			<a href="<?php echo $v['url']; ?>"><img src="<?php echo $v['image_url']; ?>" alt=""></a>
	 		</div>
			
			<div id="contenta">
				<?php echo $v['abstract'];?>
			</div>
		</div>

 		
		
 	<?php } ?>

 </body>
 </html>