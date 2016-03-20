<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>

	<link rel="stylesheet" type="text/css" href="/dailycode/testIndex/Home/Common/jqdate/tcal.css" />
	
	<script type="text/javascript" src="/dailycode/testIndex/Home/Common/jqdate/tcal.js"></script> 
	<script type="text/javascript" src="/dailycode/testIndex/Public/js/jquery-1.8.3.min.js"></script>
	<script>
	// $("#click").click(function($this()));
	// $("#click").click("documentwrite('123')");
	</script>

</head>
<body>
	
	<a href="<?php echo U('Index/index'); ?>">首页</a>
	<br/>



<style>
	#data{
		display:none;
	}

	#show{
		/*border-style:solid;*/
		border:3px solid;
		border-color: #666;
		margin:10px;
		padding:10px;
		width:600px;
		float:none;
		position:absolute;

	}

	table{
		float:left;
	}

	/*#empty{
		border:solid;
		height:800px;
		float:right;
	}*/
</style>

<script>
	$(function(){
		$(".tNo").mouseover(function(){
			var ID=$(this).attr("id");
			// alert(ID);
			// var pre=$('#data').html();
			// console.log(ID);
			$('#show').html(ID);
			$(this).mousemove(function(e){
				var X=e.pageX+50;
				var Y=e.pageY-80;
				console.log(Y);
				$('#show').css({top:Y,left:X});
			});
			
		});
		$(".tNo").mouseout(function(){
			$('#show').text('查看座次');
		});
	});
</script>

<body>

	

	<br/>
	<div><?php echo $date; ?></div>
	<div><input type="button" onclick="history.back()" value="返回"></div>
	<table border="1">
					<tr bgcolor="green">
						<td>列车类型</td>
						<td>列车编号</td>
						<td>列车始发</td>
						<td>发车时间</td>
						<td>到达时间</td>
						<td>历时</td>
						<td>查看</td>
					</tr>
		<?php foreach($info as $v){ ?>
			<?php foreach($v as $vv){ ?>
				<?php foreach($vv as $vvv){ ?>
					<tr>
						<td><?php echo $vvv['trainType']; ?></td>
						<td><?php echo $vvv['trainNo']; ?></td>
						<td><?php echo $vvv['from'].'->'.$vvv['to']; ?></td>
						<td><?php echo $vvv['startTime']; ?></td>
						<td><?php echo $vvv['endTime']; ?></td>
						<td><?php echo $vvv['duration']; ?></td>
						<!-- <td><input type="button" onclick="location='<?php echo U('Train/details').'?tNo='.$vvv['trainNo']; ?>'" value="查看"></td> -->
						<td><input type="button" value="查看" class="tNo" id="<?php  foreach($vvv['seatInfos'] as $vvvv){ echo $vvvv['seat'].'&nbsp;&nbsp;&nbsp;票价：'.$vvvv['seatPrice'].'元&nbsp;&nbsp;&nbsp;余票：'.$vvvv['remainNum'].'</br>'; } ?>" />
							<div id="data"><?php print_r($vvv['seatInfos']); ?></div>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	</table>

	
	
	
<!-- print_r($vvv['seatInfos']); -->
	

	<div id="show">
		查看座次</br>
	</div> 


<!-- 	<div id="empty"></div>
	 -->
</body>
</html>