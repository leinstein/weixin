<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>

        <form action="" method="post">
            <ul class="forminfo">
                <input type="hidden" name="goods_id" class="dfinput" value="<?php echo ($data["goods_id"]); ?>"/>
                <li><label>商品名称</label>
                    <input name="goods_name" type="text" class="dfinput" value="<?php echo ($data["goods_name"]); ?>"/></li>
                <li><label>商品价格</label>
                    <input name="goods_price" type="text" class="dfinput" value="<?php echo ($data["goods_price"]); ?>"/></li>
                <li><label>数量</label>
                    <input name='goods_number' type="text" value="<?php echo ($data["goods_number"]); ?>" class="dfinput" /></li>
                <li><label>重量</label>
                    <input name="goods_weight" type="text" class="dfinput" value="<?php echo ($data["goods_weight"]); ?>"/></li>
                <label>介绍</label>
                <textarea name="goods_introduce" cols="50" rows="30"  type="text" class="textinput" value="<?php echo ($data["goods_introduce"]); ?>"/></textarea></li>


                <!--<li><label>关键字</label><input name="" type="text" class="dfinput" /><i>多个关键字用,隔开</i></li>-->
                <!--<li><label>是否审核</label><cite><input name="" type="radio" value="" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="" />否</cite></li>-->
                <!--<li><label>引用地址</label><input name="" type="text" class="dfinput" value="http://www.mycodes.net" /></li>-->
                <!--<li><label>文章内容</label><textarea name="" cols="" rows="" class="textinput"></textarea></li>-->
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/>&nbsp;&nbsp;&nbsp;<input name="" type="button" class="btn" onclick="javascript:history.go(-1)" value="返回"/></li>
            </ul>
        </form>


    </div>


</body>

</html>