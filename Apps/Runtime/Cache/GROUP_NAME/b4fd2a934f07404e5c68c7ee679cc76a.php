<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($title); ?></title><meta name="keywords" content="<?php echo ($keywords); ?>" /><meta name="description" content="<?php echo ($description); ?>" /><link href="../Public/css/style.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="../Public/js/jquery.form.js"></script><script type="text/javascript" src="../Public/js/common.js"></script><style type="text/css">#nav_<?php echo ($position[0]['id']); ?>{background:url(../Public/images/nav.jpg) no-repeat center;}
</style></head><body><!--百度分享--><?php $other=$_result=M('Other')->where('settag="bdshare"')->find(); echo $other['setvalue'];?><div id="container"><div id="header"><div class="logo"><a href="__APP__"><img src="__ROOT__/Uploads<?php $set=$_result=M('Set')->getField('logo',1); echo $set;?>" /></a></div><div class="member"><?php if($_SESSION['account']!= null): ?>欢迎您！<a href="<?php echo U('Member/index');?>"><?php echo (session('account')); ?></a>&nbsp;&nbsp;<a href="<?php echo U('Member/logout');?>" target='_top'>退出</a>&nbsp;&nbsp;<a href="<?php echo U('Shopcart/index');?>">购物车</a><?php else: ?><a href="<?php echo U('Member/register');?>">注册</a>&nbsp;|&nbsp;<a href="<?php echo U('Member/login');?>">登录</a><?php endif; ?></div><div class="jrsc"><?php $other=$_result=M('Other')->where('settag="collect"')->find(); echo $other['setvalue'];?></div><div class="swsy"><?php $other=$_result=M('Other')->where('settag="homepage"')->find(); echo $other['setvalue'];?></div><div class="search"><?php $other=$_result=M('Other')->where('settag="lxdh"')->find(); echo $other['setvalue'];?></div><div class="nav"><ul><li id="nav_0"><a href="__APP__">首页</a></li><?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="nav_<?php echo ($vo["id"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catname"]); ?></a><?php if(!empty($vo["sub_nav"])): ?><ul class="sub_nav_ul"><?php if(is_array($vo["sub_nav"])): $i = 0; $__LIST__ = $vo["sub_nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($sub["url"]); ?>"><?php echo ($sub["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><?php endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="ad"><!--图片轮换播放--><div id="play"><div id="play_info_bg"></div><div id="play_info"></div><div id="play_text"><ul><?php $_result=M('Slide')->where('status=1')->field('id')->order('listorder desc')->limit(5)->select();foreach($_result as $key=>$slide):?><li><?php echo ($key+1); ?></li><?php endforeach;?></ul></div><div id="play_list"><?php $_result=M('Slide')->where('status=1')->field('id,title,url,img')->order('listorder desc')->limit(5)->select();foreach($_result as $key=>$slide):?><a href="<?php echo ($slide["url"]); ?>" target="_blank"><img src="__UPLOADS__<?php echo ($slide["img"]); ?>" alt="<?php echo ($slide["title"]); ?>" /></a><?php endforeach;?></div></div></div></div><script type="text/javascript">var t = n = 0, count = $("#play_list a").size();
$(function(){
    
    //幻灯片播放
    $("#play_list a:not(:first-child)").hide();
    $("#play_info").html($("#play_list a:first-child").find("img").attr('alt'));
    $("#play_info").click(function(){window.open($("#play_list a:first-child").attr('href'), "_blank");});
    
    $("#play_text li:first-child").css({"background":"#fff",'color':'#000'});
    $("#play_text li").click(function() {
            var i = $(this).text() - 1;
            n = i;
            if (i >= count) return;
            $("#play_info").html($("#play_list a").eq(i).find("img").attr('alt'));
            $("#play_info").unbind().click(function(){window.open($("#play_list a").eq(i).attr('href'), "_blank");});
            $("#play_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
            $(this).css({"background":"#fff",'color':'#000'}).siblings().css({"background":"#000",'color':'#fff'});
    });
    t = setInterval("showAuto()", 5000);
    $("#play").hover(function(){clearInterval(t);}, function(){t = setInterval("showAuto()", 5000);});
    
    $(".nav ul li:has(ul)").hover(function(){
        $(this).children("ul").stop(true,true).slideDown(400);
    },function(){
        $(this).children("ul").stop(true,true).slideUp("fast");
    });
    
});
function showAuto(){
    n = n >= (count - 1) ? 0 : ++n;
    $("#play_text li").eq(n).trigger('click');
}
</script><div id="main"><div class="main_left"><div class="model"><div class="model_top">产品分类<span><a href="#"></a></span></div><div class="model_content clearbimg"><ul><div class="lf_tree"><?php $_list=D('Category')->where('status=1 and id in (41,37,42,38,43,39,40)')->field("*,concat(path,'-',id) as bpath")->order('bpath')->select();foreach($_list as $key=>$value):$_list[$key]['count']=count(explode('-',$value['bpath']));endforeach;$_result=$_list;foreach($_result as $key=>$category): if($_result[$key]['count'] == $_result[$key-1]['count'] or $_result[$key-1]['count'] == null): ?><li><a href="<?php echo U('Product/index',array('id'=>$category['id']));?>"><?php echo ($category["catname"]); ?></a></li><?php elseif($_result[$key]['count'] > $_result[$key-1]['count']): ?><ul><li><a href="<?php echo U('Product/index',array('id'=>$category['id']));?>"><?php echo ($category["catname"]); ?></a></li><?php elseif($_result[$key]['count'] < $_result[$key-1]['count']): ?></ul><li><a href="<?php echo U('Product/index',array('id'=>$category['id']));?>"><?php echo ($category["catname"]); ?></a></li><?php endif; endforeach;?></div></ul></div></div></div><div class="main_right"><div class="content"><div class="content_top"><?php echo ($data["catname"]); ?></div><div class="content_main"><ul class="listcontent"><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><div class="img"><a href="<?php echo U('Product/show',array('id'=>$vo['id']));?>" target="_blank"><img src="__ROOT__/Uploads/<?php echo ($vo['thumb']); ?>" width="160" height="160" /></a></div><div class="title"><a href="<?php echo U('Product/show',array('id'=>$vo['id']));?>" target="_blank"><?php echo (msubstr($vo['title'],0,30)); ?></a></div><div class="price">价格：<span>￥<?php echo ($vo['price']); ?></span></div></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="clear"></div><div class="page"><?php echo ($page); ?></div></div></div></div><div class="clear"></div><!--Powered by Yufucms!--><div id="footer"><?php $other=$_result=M('Other')->where('settag="footer"')->find(); echo $other['setvalue'];?>&nbsp;&nbsp;<?php $other=$_result=M('Other')->where('settag="cnzzstatistics"')->find(); echo $other['setvalue'];?></div></div><!--客服面板--><div id="cmsFloatPanel"><div class="ctrolPanel"><a class="arrow" href="#"><span>顶部</span></a><a class="service" href="#"><span>客服</span></a><a class="message" href="#"><span>留言</span></a><a class="qrcode" href="#"><span>微信</span></a><a class="arrow" href="#"><span>底部</span></a></div><div class="servicePanel"><div class="servicePanel-inner"><div class="serviceMsgPanel"><div class="serviceMsgPanel-hd"><a href="#"><span>关闭</span></a></div><div class="serviceMsgPanel-bd"><div class="msggroup">售前咨询</div><div class="msgtool"><?php $other=$_result=M('Other')->where('settag="qq1"')->find(); echo $other['setvalue'];?></div><div class="msggroup">售后客服</div><div class="msgtool"><?php $other=$_result=M('Other')->where('settag="qq2"')->find(); echo $other['setvalue'];?></div></div><div class="serviceMsgPanel-ft"></div></div><div class="arrowPanel"><div class="arrow02"></div></div></div></div><div class="messagePanel"><div class="messagePanel-inner"><div class="formPanel"><div class="formPanel-hd">欢迎给我们留言<a href="#"><span>关闭</span></a></div><div class="formPanel-bd"><form id="form_message" action="<?php echo U('Message/index');?>" method="post"><div><textarea name="content" id="message_content" cols="30" rows="4"></textarea></div><div>联系人： <input type="text" name="name" id="message_name" /></div><div>电 &nbsp;&nbsp; 话： <input type="text" name="tel" id="message_tel" /></div><div><input type="submit" id="submit" value="提 交" /> &nbsp;&nbsp; <input type="reset" value="重 置" /></div></form></div><div class="formPanel-ft"><a href="#"><span>鱼福网提供技术支持</span></a></div></div><div class="arrowPanel"><div class="arrow01"></div><div class="arrow02"></div></div></div></div><div class="qrcodePanel"><div class="qrcodePanel-inner"><div class="codePanel"><div class="codePanel-hd">用微信扫一扫，加为关注<a href="#"><span>关闭</span></a></div><div class="codePanel-bd"><img src="__UPLOADS__<?php echo ($wxqrcode); ?>" /></div><div class="codePanel-ft"><a href="<?php echo U('Content/index',array('id'=>48));?>"><span><< 点击下载APP手机客户端 >></span></a></div></div><div class="arrowPanel"><div class="arrow01"></div><div class="arrow02"></div></div></div></div></div><script type="text/javascript">    $(function(){
        //在线留言
        $('#form_message').ajaxForm({
            beforeSubmit:  checkForm_message, 
            success:       complete_header, 
            dataType: 'json'
        });
        function checkForm_message(){
            if( '' === $.trim($('#message_name').val())){
                alert('联系人不能为空');
                return false;
            }
            if( '' === $.trim($('#message_content').val())){
                alert('内容不能为空');
                return false;
            }
            //可以在此添加其它判断
        }
        function complete_header(data){
            if (data.status===1){
                alert(data.info);
                $('#form_message').resetForm();
            }else{
                alert(data.info);
            }
        }

        // cms客服浮动面板
        if($("#cmsFloatPanel")){
	  $("#cmsFloatPanel > .ctrolPanel > a.arrow").eq(0).click(function(){$("html,body").animate({scrollTop :0}, 800);return false;});
	  $("#cmsFloatPanel > .ctrolPanel > a.arrow").eq(1).click(function(){$("html,body").animate({scrollTop : $(document).height()}, 800);return false;});
	  var objServicePanel = $("#cmsFloatPanel > .servicePanel");
	  var objMessagePanel = $("#cmsFloatPanel > .messagePanel");
	  var objQrcodePanel = $("#cmsFloatPanel > .qrcodePanel");
	  var w_s = objServicePanel.outerWidth();
	  var w_m = objMessagePanel.outerWidth();
	  var w_q = objQrcodePanel.outerWidth();
	  $("#cmsFloatPanel .ctrolPanel > a.service").bind({
		  click : function(){return false;},
		  mouseover : function(){
			  objMessagePanel.stop().hide();objQrcodePanel.stop().hide();
			  if(objServicePanel.css("display") == "none"){
			     objServicePanel.css("width","0px").show();
			     objServicePanel.animate({"width" : w_s + "px"},600);
			  }
			  return false;
		  }
	  });
	  $(".servicePanel-inner > .serviceMsgPanel > .serviceMsgPanel-hd > a",objServicePanel).bind({
		  click : function(){
			  objServicePanel.animate({"width" : "0px"},600,function(){
				objServicePanel.hide();  
			  });
			  return false;
		  }
	  });
	  $("#cmsFloatPanel > .ctrolPanel > a.message").bind({
		  click : function(){return false;},
		  mouseover : function(){
			  objServicePanel.stop().hide();objQrcodePanel.stop().hide();
			  if(objMessagePanel.css("display") == "none"){
			     objMessagePanel.css("width","0px").show();
			     objMessagePanel.animate({"width" : w_m + "px"},600);
			  }
			  return false;
		  }
	  });
	  $(".messagePanel-inner > .formPanel > .formPanel-hd > a",objMessagePanel).bind({
		  click : function(){
			  objMessagePanel.animate({"width" : "0px"},600,function(){
				objMessagePanel.stop().hide();  
			  });
			  return false;
		  }
	  });
	  $("#cmsFloatPanel > .ctrolPanel > a.qrcode").bind({
		  click : function(){return false;},
		  mouseover : function(){
			  objServicePanel.stop().hide();objMessagePanel.stop().hide();
			  if(objQrcodePanel.css("display") == "none"){
			     objQrcodePanel.css("width","0px").show();
			     objQrcodePanel.animate({"width" : w_q + "px"},600);
			  }
			  return false;
		  }
	  });
	  $(".qrcodePanel-inner > .codePanel > .codePanel-hd > a",objQrcodePanel).bind({
		  click : function(){
			  objQrcodePanel.animate({"width" : "0px"},600,function(){
				objQrcodePanel.stop().hide();  
			  });
			  return false;
		  }
	  });

        }
        
    });
  

</script></body></html>