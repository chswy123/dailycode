<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>/style.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/index.js"></script>
</head>


<body>

<div class="nav-top">
	<span>个人后台管理系统</span>
    <div class="nav-topright">
    	<!-- <p>上次登陆时间：2015-04-15 22:33:50   登陆IP：192.168.1.1</p> -->
        <span>您好：<?php echo $_SESSION['user_name'];?></span><span><a style="color:red;" href="<?php echo U('Login/logout');?>">注销</a></span>
    </div>
</div>
<div class="nav-down">
	<div class="leftmenu1">

        <?php  $menu = $_SESSION['menu']; ?> 
        <?php ?>

        <div class="menu-oc"><img src="<?php echo IMG_PATH;?>/menu-all.png" /></div>
    	<ul>
            <?php foreach($menu as $k=>$v){ ?>
            <?php if($v['menu_id']=='0'){ ?>
            	<li>
                	<a class="a_list a_list1"><?php echo $v['menu_name'];?></a>
                    <div class="menu_list menu_list_first">
                        <?php foreach($menu as $kk=>$vv){?>
                            <?php if($v['id']==$vv['menu_id']){?>
                    	       <a href="<?php echo U($vv['menu_url'].'/index');?>" ><?php echo $vv['menu_name'];?></a>
                            <?php }?>
                        <?php } ?>
                    </div>
                </li>
            <?php }?>
            <?php }?>
            <!-- <li>
            	<a class="a_list a_list2">小应用</a>
                <div class="menu_list">
                </div>
            </li>
            <li>
            	<a class="a_list a_list3">新闻管理</a>
                <div class="menu_list">
                	<a href="#">新闻中心</a>
                    <a href="#">添加新闻</a>
                    <a href="#">修改新闻</a>
                    <a href="#">删除新闻</a>
                </div>
            </li>
            <li>
            	<a class="a_list a_list3">新闻管理</a>
                <div class="menu_list">
                	<a href="#">新闻中心</a>
                    <a href="#">添加新闻</a>
                    <a href="#">修改新闻</a>
                    <a href="#">删除新闻</a>
                </div>
            </li> -->
        </ul>
    </div>
    <div class="leftmenu2">
    	<div class="menu-oc1"><img src="<?php echo IMG_PATH;?>/menu-all.png" /></div>
        <ul>
        	<li>
            	<a class="j_a_list j_a_list1"></a>
                <div class="j_menu_list j_menu_list_first">
                	<span class="sp1"><i></i>设置</span>
                	<a class="j_lista_first" href="<?php echo U('User/index');?>">用户列表</a>
                    <a href="#">其他设置</a>
                    <a href="#">界面风格</a>
                    <a href="#">系统工具</a>
                </div>
            </li>
            <li>
            	<a class="j_a_list j_a_list2"></a>
                <div class="j_menu_list">
                	<span class="sp2"><i></i>权限管理</span>
                	<a href="#">基本权限</a>
                    <a href="#">分配权限</a>
                    <a href="#">权限管理</a>
                    <a href="#">成员管理</a>
                </div>
            </li>
            <li>
            	<a class="j_a_list j_a_list3"></a>
                <div class="j_menu_list">
                	<span class="sp3"><i></i>权限管理</span>
                	<a href="#">基本权限</a>
                    <a href="#">分配权限</a>
                    <a href="#">权限管理</a>
                    <a href="#">成员管理</a>
                </div>
            </li>
        </ul>
        
    </div>
    

    <div class="rightcon">
    	<div class="right_con">
        	<p style="text-align:left; margin-top:50px">右侧内容自适应哦！我是左对齐</p>
            <p style="text-align:center">这是首页</p>
            <p style="text-align:right">右侧内容自适应哦！我是右对齐</p>
            <h1><?php echo $list; ?></h1>
            <h2>我是标题2。。。</h2>
            <h3>我是标题3。。。</h3>
            <h4>我是标题4。。。</h4>
            <h5>我是标题5。。。</h5>
        </div>
    </div>
</div>
<div style="text-align:center;">
<!-- <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p> -->
</div>

</body>
</html>
<script type="text/javascript">
	
</script>