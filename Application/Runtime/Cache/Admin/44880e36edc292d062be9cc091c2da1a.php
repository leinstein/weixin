<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	<ul class="toolbar">
        <li><a href="<?php echo U('tianjia');?>"><span><img src="/Public/Admin/images/t01.png" /></span>添加</a></li>
        <li class="click"><span><img src="/Public/Admin/images/t02.png" /></span>修改</li>
        <li><span><img src="/Public/Admin/images/t03.png" /></span>删除</li>
        <li><span><img src="/Public/Admin/images/t04.png" /></span>统计</li>
        </ul>
        
        
        <ul class="toolbar1">
        <li><span><img src="/Public/Admin/images/t05.png" /></span>设置</li>
        </ul>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>名称</th>
        <th>价格</th>
        <th>数量</th>
        <th>重量</th>
        <th>展示</th>
        <th>展示缩略图</th>
        <th>创建时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php if(is_array($info)): foreach($info as $k=>$v): ?>-->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="<?php echo ($v["goods_id"]); ?>" /></td>-->
        <!--<td><?php echo ($k+1); ?></td>-->
        <!--<td><?php echo ($v["goods_name"]); ?></td>-->
        <!--<td><?php echo ($v["goods_price"]); ?></td>-->
        <!--<td><?php echo ($v["goods_number"]); ?></td>-->
        <!--<td><?php echo ($v["goods_weight"]); ?></td>-->
        <!--<td><?php echo (date("Y-m-d H:i:s",$v["goods_create_time"])); ?></td>-->
        <!--<td><a href="<?php echo U('upd',array('goods_id'=>$v['goods_id']));?>">修改</a>&nbsp;&nbsp;<a href="#" class="tablelink">查看</a>     <a href="<?php echo U('del',array('goods_id'=>$v['goods_id']));?>" class="tablelink" onclick="return confirm('确定删除吗?')"> 删除</a></td>-->
        <!--</tr>-->
        <!--<?php endforeach; endif; ?>-->

        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 3 );++$k; if($mod == 1): ?><tr style="background-color:lightblue;">
               <?php else: ?>
               <tr><?php endif; ?>
            
                <td><input name="" type="checkbox" value="<?php echo ($v["goods_id"]); ?>" /></td>
                <td><?php echo ($v["goods_id"]); ?></td>
                <td><?php echo ($v["goods_name"]); ?></td>
                <td><?php echo ($v["goods_price"]); ?></td>
                <td><?php echo ($v["goods_number"]); ?></td>
                <td><?php echo ($v["goods_weight"]); ?></td>
                <td><img src="<?php echo (substr($v["goods_big_img"],1)); ?>" alt="产品展示" width="80" height="80" /></td>
                <td><img src="<?php echo (substr($v["goods_small_img"],1)); ?>" alt="缩略图" width="70" height="70" /></td>
                <td><?php echo (date("Y-m-d H:i:s",$v["goods_create_time"])); ?></td>
                <td><a href="<?php echo U('upd',array('goods_id'=>$v['goods_id']));?>">修改</a>&nbsp;&nbsp;<a href="#" class="tablelink">查看</a>     <a href="<?php echo U('del',array('goods_id'=>$v['goods_id']));?>" class="tablelink" onclick="return confirm('确定删除吗?')"> 删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130907</td>-->
        <!--<td>温州19名小学生中毒流鼻血续：周边部分企业关停</td>-->
        <!--<td>uimaker</td>-->
        <!--<td>山东济南</td>-->
        <!--<td>2013-09-08 14:02</td>-->
        <!--<td>未审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130906</td>-->
        <!--<td>社科院:电子商务促进了农村经济结构和社会转型</td>-->
        <!--<td>user</td>-->
        <!--<td>江苏无锡</td>-->
        <!--<td>2013-09-07 13:16</td>-->
        <!--<td>未审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130905</td>-->
        <!--<td>江西&quot;局长违规建豪宅&quot;：局长检讨</td>-->
        <!--<td>admin</td>-->
        <!--<td>北京市</td>-->
        <!--<td>2013-09-06 10:36</td>-->
        <!--<td>已审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130904</td>-->
        <!--<td>中国2020年或迈入高收入国家行列</td>-->
        <!--<td>uimaker</td>-->
        <!--<td>江苏南京</td>-->
        <!--<td>2013-09-05 13:25</td>-->
        <!--<td>已审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130903</td>-->
        <!--<td>深圳地铁车门因乘客拉闸打开 3人被挤入隧道</td>-->
        <!--<td>user</td>-->
        <!--<td>广东深圳</td>-->
        <!--<td>2013-09-04 12:00</td>-->
        <!--<td>已审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130902</td>-->
        <!--<td>33次地表塌陷 村民不敢下地劳作(图)</td>-->
        <!--<td>admin</td>-->
        <!--<td>湖南长沙</td>-->
        <!--<td>2013-09-03 00:05</td>-->
        <!--<td>未审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130901</td>-->
        <!--<td>医患关系：医生在替改革不彻底背黑锅</td>-->
        <!--<td>admin</td>-->
        <!--<td>江苏南京</td>-->
        <!--<td>2013-09-02 15:05</td>-->
        <!--<td>未审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>-->
        <!---->
        <!--<tr>-->
        <!--<td><input name="" type="checkbox" value="" /></td>-->
        <!--<td>20130900</td>-->
        <!--<td>山东章丘公车进饭店景点将自动向监控系统报警</td>-->
        <!--<td>uimaker</td>-->
        <!--<td>山东滨州</td>-->
        <!--<td>2013-09-01 10:26</td>-->
        <!--<td>已审核</td>-->
        <!--<td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>-->
        <!--</tr>        -->
        </tbody>
    </table>
    
   
    <div class="pagin">
       <div class="flickr"><?php echo ($pagelist); ?></div>
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Public/Admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>