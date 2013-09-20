<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($title); ?></title><meta name="keywords" content="<?php echo ($keywords); ?>" /><meta name="description" content="<?php echo ($description); ?>" /><link href="../Public/css/style.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="../Public/js/jquery.form.js"></script></head><body><div id="container1"><div id="header"><div class="logo"><a href="__APP__"><img src="../Public/images/logo.jpg" /></a></div></div><script language="JavaScript">    $(function(){
        $("#account").blur(function(){
            var account=$("#account").val();
            $.post("<?php echo U('Member/checkAccount');?>",{account:account}, function(data){
                   $("#accounterror").html(data['info']);
            });
        });
        $("#password").blur(function(){
            var password=$("#password").val();
            if(password==""){
                $("#passworderror").html("密码不能空！"); 
            }else{
                $("#passworderror").html("*"); 
            }
        });
        $("#repassword").blur(function(){
            var password=$("#password").val();
            var repassword=$("#repassword").val();
            if(repassword!=password){
                $("#repassworderror").html("密码与确认密码不一致！"); 
            }else{
                $("#repassworderror").html("*"); 
            }
        });
        $("#email").blur(function(){
            var email=$("#email").val();
            if(email==""){
               $("#emailerror").html("电子邮箱不能空！"); 
            }else{
                $("#emailerror").html("*"); 
            }
        });
        
        $('#form1').ajaxForm({
            beforeSubmit:  checkForm, 
            success:       complete, 
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#account').val())){
                alert('用户名不能为空');
                return false;
            }
            if( '' == $.trim($('#password').val())){
                alert('密码不能为空');
                return false;
            }
            if( $.trim($('#repassword').val()) != $.trim($('#password').val())){
                alert('密码与确认密码不一致');
                return false;
            }
            if( '' == $.trim($('#email').val())){
                alert('电子邮箱不能为空');
                return false;
            }
            
        }
        function complete(data){
            if (data.status==1){
                window.location.href="<?php echo U('Member/login');?>";
            }else{
                alert(data.info);
            }
        }
    });
    function fleshVerify(){ 
        //重载验证码
        $('#verifyImg').attr('src',"<?php echo U('Member/verify',array('t'=>time()));?>");
    }
</script><div class="memberbox"><div class="memberbox_left"><h1>会员注册</h1><form method='post' id="form1" action="<?php echo U('Member/register');?>" ><table cellpadding=3 cellspacing=3><tr><td>用户名：</td><td><input type="text" id="account" name="account"><span id="accounterror" class="red">*</span></td></tr><tr><td>密码：</td><td><input type="password" id="password" name="password"><span id="passworderror" class="red">*</span></td></tr><tr><td>确认密码：</td><td><input type="password" id="repassword" name="repassword"><span id="repassworderror" class="red">*</span></td></tr><tr><td>电子邮箱：</td><td><input type="text" id="email" name="email"><span id="emailerror" class="red">*</span></td></tr><tr><td>验证码：</td><td><input type="text" style="width: 95px;" id="verify" name="verify"><img id="verifyImg" src="<?php echo U('Member/verify');?>" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor:pointer" align="absmiddle"></td></tr><tr><td></td><td><input type="hidden" name="role_id" value="15" ><input type="submit" value="保 存" class="small submit"></td></tr></table></form></div><div class="memberbox_right"><div style="font-size: 18px; margin-bottom: 20px;">已是会员</div><div style="margin-bottom: 20px;"><a href="<?php echo U('Member/login');?>">登录</a></div><div><a href="__APP__">返回首页</a></div></div></div><div class="clear"></div><!--Powered by Yufucms!--><div id="footer"><?php $other=$_result=M('Other')->where('settag="footer"')->find(); echo $other['setvalue'];?>&nbsp;&nbsp;<?php $other=$_result=M('Other')->where('settag="cnzzstatistics"')->find(); echo $other['setvalue'];?></div></div><!--客服面板--><div id="cmsFloatPanel"><div class="ctrolPanel"><a class="arrow" href="#"><span>顶部</span></a><a class="service" href="#"><span>客服</span></a><a class="message" href="#"><span>留言</span></a><a class="qrcode" href="#"><span>微信</span></a><a class="arrow" href="#"><span>底部</span></a></div><div class="servicePanel"><div class="servicePanel-inner"><div class="serviceMsgPanel"><div class="serviceMsgPanel-hd"><a href="#"><span>关闭</span></a></div><div class="serviceMsgPanel-bd"><div class="msggroup">售前咨询</div><div class="msgtool"><?php $other=$_result=M('Other')->where('settag="qq1"')->find(); echo $other['setvalue'];?></div><div class="msggroup">售后客服</div><div class="msgtool"><?php $other=$_result=M('Other')->where('settag="qq2"')->find(); echo $other['setvalue'];?></div></div><div class="serviceMsgPanel-ft"></div></div><div class="arrowPanel"><div class="arrow02"></div></div></div></div><div class="messagePanel"><div class="messagePanel-inner"><div class="formPanel"><div class="formPanel-hd">欢迎给我们留言<a href="#"><span>关闭</span></a></div><div class="formPanel-bd"><form id="form_message" action="<?php echo U('Message/index');?>" method="post"><div><textarea name="content" id="message_content" cols="30" rows="4"></textarea></div><div>联系人： <input type="text" name="name" id="message_name" /></div><div>电 &nbsp;&nbsp; 话： <input type="text" name="tel" id="message_tel" /></div><div><input type="submit" id="submit" value="提 交" /> &nbsp;&nbsp; <input type="reset" value="重 置" /></div></form></div><div class="formPanel-ft"><a href="#"><span>鱼福网提供技术支持</span></a></div></div><div class="arrowPanel"><div class="arrow01"></div><div class="arrow02"></div></div></div></div><div class="qrcodePanel"><div class="qrcodePanel-inner"><div class="codePanel"><div class="codePanel-hd">用微信扫一扫，加为关注<a href="#"><span>关闭</span></a></div><div class="codePanel-bd"><img src="__UPLOADS__<?php echo ($wxqrcode); ?>" /></div><div class="codePanel-ft"><a href="<?php echo U('Content/index',array('id'=>48));?>"><span><< 点击下载APP手机客户端 >></span></a></div></div><div class="arrowPanel"><div class="arrow01"></div><div class="arrow02"></div></div></div></div></div><script type="text/javascript">    $(function(){
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