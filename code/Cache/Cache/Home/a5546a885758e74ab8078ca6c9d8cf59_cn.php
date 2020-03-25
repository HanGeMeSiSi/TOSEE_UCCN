<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($seo_title); ?>-<?php echo ($site_name); ?></title> 
<meta name="keywords" content="<?php if($seo_keywords=='') : echo ($seo_title); else : echo ($seo_keywords); endif;?>" />
<meta name="description" content="<?php echo ($seo_description); ?>" />
<meta name="baidu-site-verification" content="57egBW5jZG" />
<link rel="stylesheet" type="text/css" href="/static/css/base_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/model_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/main_1.css" />
<link rel="stylesheet" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/css/animate.min.css">
<link rel="stylesheet" href="/static/iconfont/iconfont.css">
<link rel="stylesheet" href="/static/css/yh/main.css">
<link rel="stylesheet" href="/static/css/header.css">
<link rel="stylesheet" href="/static/layui/css/layui.css">
<script src="/static/layui/layui.js"></script>
<script src="/static/js/jquery-3.4.1.min.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<!-- <script src="/static/js/jquery-1.8.3.min_1.js"></script> -->
<script src="/static/js/mobile_1.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?17fc284c5191dbb93bc5cebc15116666";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    </script>
</head>
<body>
<!-- 公共头部包含 -->
<div class="header_div row clear" id="header_div">
    <div class="sm-menu-item">
        <div class="shade"></div>
        <div class="left-menu">
            <div class="close-menu">x</div>
            
        </div>
    </div>
  <div style="display: flex;justify-content: space-between;">
    <div class="">
        <div class="logo ml-2">
            <img src="/static/img/logo.jpg" alt="">
        </div>
    </div>
    <div class="h-100 lg-menu-item">
        <div class="icon-viewlist iconfont btn-menu active" id="btn-menu"></div>
        <div class="menu mr-2"></div>
    </div>
  </div>
</div>
<script>
  (function(){
    let menu_data = [
        {
            firstName:"首页",
            children:[],
            url:"/"
        },
        {
            firstName:"产品中心",
            children:[
                {
                    name:"新品介绍",
                    url:"/Product/list/74.html"
                },{
                    name:"智能集中控制器",
                    url:"/Product/list/75.html"
                },{
                    name:"智能空开",
                    url:"/Product/list/76.html"
                },{
                    name:"智能断路器",
                    url:"/Product/list/77.html"
                },{
                    name:"智能电箱",
                    url:"/Product/list/78.html"
                },{
                    name:"智能用电管理系统",
                    url:"/Product/list/79.html"
                },{
                    name:"智能用电检测仪",
                    url:"/Product/list/80.html"
                }
            ],
            url:"/Product/list/72.html"
        },
        {
            firstName:"招商加盟",
            children:[],
            url:"/Page/list/81.html"
        },
        {
            firstName:"工程案例",
            children:[
                {
                    name:"成功案例项目",
                    url:"/Case/list/94.html"
                }
            ],
            url:"/Case/list/94.html"
        },
        {
            firstName:"服务支持",
            children:[
                {
                    name:"安装指导",
                    url:"/Download/list/96.html"
                },
                {
                    name:"售后服务",
                    url:"/Page/list/84.html"
                },
                {
                    name:"下载资料",
                    url:"/Download/list/85.html"
                }
            ],
            url:"/Download/list/96.html"
        },
        {
            firstName:"新闻资讯",
            children:[
                {
                    name:"公司新闻",
                    url:"/Article/list/86.html"
                },
                {
                    name:"政策法规",
                    url:"/Article/list/87.html"
                },
                {
                    name:"行业资讯",
                    url:"/Article/list/88.html"
                }
            ],
            url:"/Article/list/71.html"
        },
        {
            firstName:"公司简介",
            children:[
                {
                    name:"企业简介",
                    url:"/Page/list/90.html"
                },
                {
                    name:"招商计划",
                    url:"/Page/list/91.html"
                },
                {
                    name:"人员招聘",
                    url:"/Page/list/92.html"
                },
                {
                    name:"联系我们",
                    url:"/Page/list/93.html"
                }
            ],
            url:"/Page/list/89.html"
        },
        {
            firstName:"联系我们",
            children:[],
            url:""
        },
    ];
    
    let newLeftMenu="";
    let newLGMenu="";
    for(let i =0;i<menu_data.length;i++){
        let firstName =menu_data[i].firstName;
        let firstUrl =menu_data[i].url;
        let childMenu = "";
        let childMenu2="";
        for(let k =0;k<menu_data[i].children.length;k++){
            let newChildrenName = menu_data[i].children[k].name;
            let newChildrenUrl = menu_data[i].children[k].url;
            childMenu += `<div class="left-menu-link" data-url="${newChildrenUrl}">${newChildrenName}</div>`;
            childMenu2 += `<div class="menu-item-tanChu-link" data-url="${newChildrenUrl}">${newChildrenName}</div>`;
        }
        let pianduan =`
            <div class="left-menu-item">
                <div class="left-menu-title" data-url="${firstUrl}">
                    ${firstName}
                    <div class="icon-arrow-down iconfont"></div>
                </div>
                <div class="left-menu-child">
                    ${childMenu}
                </div>
            </div>
        `;
        let pianduan2 =`
            <div class="menu-item">
                <div class="menu-item-title" data-url="${firstUrl}">
                    ${firstName}
                </div>
                <div class="menu-item-tanChu">
                    ${childMenu2}
                </div>
            </div>
        `;
        newLeftMenu+=pianduan;
        newLGMenu+=pianduan2;
    }
    $(".lg-menu-item .menu").html(newLGMenu);
    $(".sm-menu-item .left-menu").html(newLeftMenu);
    $(document).ready(()=>{
        let pathname = window.location.pathname; 
        let menu_items = $(".menu .menu-item");
        menu_item_active();
        function menu_item_active(){
            for(let i = 0;i<menu_items.length;i++){
                let titleName = $(menu_items[i]).find(".menu-item-title").text();
                titleName = titleName.replace(/\s*/g,"");
                if(titleName === "联系我们"){
                    $(menu_items[i]).attr("title","4008897913").css({position:"relative"}).append(
                        `<div class="lianxi_tanchu">
                            <img src="/static/picture/1515132262343080_1.png"/>
                            <span>4008897913</span>
                        </div>`
                    );
                }
                let i_title = $(menu_items[i]).find(".menu-item-title").data("url");
                let i_link = $(menu_items[i]).find(".menu-item-tanChu .menu-item-tanChu-link");
            
                if(pathname === i_title){
                    $(menu_items[i]).addClass("active");
                    return;
                }else{
                    for(let j=0;j<i_link.length;j++){
                        let childrenUrl = $(i_link[j]).data("url");
                        if(childrenUrl === pathname){
                            $(menu_items[i]).addClass("active");
                            break;
                        }
                    }
                }
            }
        }
        
        $("#btn-menu").click(()=>{
            $(".sm-menu-item").addClass("active");
        });
        
        $(".sm-menu-item .close-menu").click(()=>{
            $(".sm-menu-item").removeClass("active");
        });
        $(".sm-menu-item .shade").click(()=>{
            $(".sm-menu-item").removeClass("active");
        });
        $(".left-menu-item").click((e)=>{
            var all_item = $(".left-menu-item");
            if($(e.target).hasClass("left-menu-link") || $(e.target).hasClass("left-menu-child")){
                return;
            }
            // console.log($(e.target).closest(".left-menu-item"));
            var _this =$(e.target).closest(".left-menu-item");
            if(_this.hasClass("active")){
                _this.removeClass("active");
                _this.find(".left-menu-child").css({
                    height:0
                })
            }else{
                // console.log($(_this))
                for(let i =0;i<all_item.length;i++){
                    let now_item = $(all_item[i]);
                    if($(now_item)[0] != _this[0]){
                        now_item.removeClass("active");
                        now_item.find(".left-menu-child").css({
                            height:0
                        });
                        // console.log($(now_item))
                        // console.log(222)                       
                    }
                }
                _this.addClass("active");
                _this.find(".left-menu-child").css({
                    height: _this.find(".left-menu-child .left-menu-link").length*30+'px'
                })
            }
        });
       
        menu_items.mouseenter((e)=>{
            let _this = $(e.target);
            let allmenuitems = $(".menu .menu-item");
            if(!_this.hasClass("menu-item")){
                _this = _this.closest(".menu-item");
            }

            // console.log(allmenuitems)
            for(let i = 0;i<allmenuitems.length;i++){
                if(allmenuitems[i] !== e.target){
                    $(allmenuitems[i]).find(".menu-item-tanChu").css({
                        height:0
                    })
                }
            }
        
            let childrenLength =0;
            try{
                childrenLength=_this.find(".menu-item-tanChu")[0].children.length;
            }catch(e){
                console.log(e)
                console.log(_this)
            } 
            let tanchu = _this.find(".menu-item-tanChu");
            
            tanchu.css({
                height:30*childrenLength+"px"
            })
        });
        menu_items.mouseleave((e)=>{
            let _this = $(e.target);
            if(!_this.hasClass("menu-item")){
                _this = _this.closest(".menu-item");
            }
            let tanchu = _this.find(".menu-item-tanChu");
            // setTimeout(()=>{
                tanchu.css({
                    height:0
                })
            // },500);
        });
        $(".menu .menu-item .menu-item-tanChu").mouseleave((e)=>{
            let _this = $(e.target);
            let tanchu = _this.closest(".menu-item-tanChu")
            // setTimeout(()=>{
                tanchu.css({
                    height:0
                })
            // },500);
        });
        $(".menu-item-tanChu-link").click((e)=>{
        window.location.href = $(e.target).data().url;
        });
        $(".menu-item-title").click((e)=>{
            window.location.href = $(e.target).data().url;
        });
        $(".left-menu-title").dblclick((e)=>{
        window.location.href = $(e.target).data().url;
        });
        $(".left-menu-child").click((e)=>{
        window.location.href = $(e.target).data().url;
        });
    });
  })()
</script>
<div style="height: 65px;"></div>


		<!-- 内页banner -->

<div class="n_banner"> <img src="/static/picture/20191120160635_955.jpg" alt="新闻资讯" title="新闻资讯" /> </div>
<div class="neiBox">
  <!-- 主体部分 -->
  <div id="container" class="clearfix">
    <div class="left">
      <div class="box sort_menu">  <h3> 特西电气</h3>
<ul class="sort">
  <?php $n=0;foreach($Categorys as $key=>$r):if( $r['ismenu']==1 && intval(89)==$r["parentid"] ) :++$n;?><li class="layer1"> <a href="<?php echo ($r["url"]); ?>" class="list_item"><?php echo ($r["catname"]); ?></a>
      <div class="layer2" style="display:none;">
        <ul>
        </ul>
      </div>
    </li><?php endif; endforeach;?>
</ul>

        <script type="text/javascript">

 var url   = location.pathname;
 var urlArray = url.split("/");
 var name = urlArray[urlArray.length-2];
 
 var aboutArray1  = ["about"];
 var about_Array2 = ["about_server"];
 var about_Array3 = ["about_renli"];
 
 if(name==aboutArray1){
	 $(".n_banner img").attr("src","/data/images/banner/20191120160741_498.jpg");
 }else if(name == about_Array2){
	 $(".n_banner img").attr("src","/data/images/banner/20191120160707_178.jpg");
 }else if(name == about_Array3){
	 $(".n_banner img").attr("src","/data/images/banner/20191120160722_735.jpg");
 }
 
 //判断元素是否包含在数组中
 function in_array(str,arr){
	  for(var f1 in arr){
		if(arr[f1] == name){
			return true;
		 }
	   }
	   return false;
  }

 </script>
        <script type="text/javascript">
$(function(){
	$(".sort > li:eq(0)").addClass("current2");
	var url = window.location.href;
	$(".sort > li").each(function(){
		if($(this).children('a').attr("href") == url ){
			$(".sort>li:eq(0)").removeClass("current2");
			$(this).addClass("current2");
		};
	});
});
</script>
      </div>
      <div class="box n_search">
         
<h3>相关产品</h3>
<div class="content">
  <ul class="news_list words">
    <?php
 $slist = M("Product")->order("rand()")->limit(10)->select(); foreach($slist as $srs){ ?>
    <li><a href="<?php echo ($srs["url"]); ?>" title="<?php echo ($srs["title"]); ?>"><?php echo ($srs["title"]); ?></a></li>
    <?php } ?>
  </ul>
</div>

        <script type="text/javascript">
			  $(function(){
			  	$(".words li:odd").addClass("right_word");
			  });
			</script>
      </div>
      
      
    </div>
    <div class="right">
      <div class="sitemp clearfix">
        <h2>联系我们 </h2>
        <div class="site">您的当前位置： <a href="/">首 页</a>><span class="cc">联系我们</span> </div>
      </div>
      <div class="content">
        <p><br/>
        </p>
        <table align="center" uetable="null">
          <tbody>
            <tr class="firstRow">
              <td style="BORDER-BOTTOM-COLOR: rgb(221,221,221); BORDER-TOP-COLOR: rgb(221,221,221); BORDER-RIGHT-COLOR: rgb(221,221,221); BORDER-LEFT-COLOR: rgb(221,221,221)" valign="top"><img style="WIDTH: 263px; HEIGHT: 247px" title="" border="0" alt="" src="/static/picture/1429492934373519.png" width="263" height="247"/></td>
              <td style="BORDER-BOTTOM-COLOR: rgb(221,221,221); BORDER-TOP-COLOR: rgb(221,221,221); BORDER-RIGHT-COLOR: rgb(221,221,221); BORDER-LEFT-COLOR: rgb(221,221,221)" valign="top"><br/></td>
              <td style="border-color: rgb(221, 221, 221); word-break: break-all;" valign="top"><p style="LINE-HEIGHT: 2em"><strong><span style="FONT-FAMILY: 微软雅黑, &#39;Microsoft YaHei&#39;; FONT-SIZE: 16px">深圳市特西智能电气有限公司</span></strong></p>
                <span style="FONT-FAMILY: 微软雅黑, &#39;Microsoft YaHei&#39;; FONT-SIZE: 16px">
                <p style="LINE-HEIGHT: 2em"><br style="WHITE-SPACE: normal"/>
                  手&nbsp; 机：189-2646-9431<span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></span></p>
                <p style="LINE-HEIGHT: 2em">电&nbsp; 话<span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; line-height: 32px;">：<span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">400-889-7913</span></span></p>
                <p style="LINE-HEIGHT: 2em">网 &nbsp;址：<a href="http://<?php  echo $_SERVER['SERVER_NAME']; ?>" target="_self"><?php  echo $_SERVER['SERVER_NAME']; ?></a><br style="WHITE-SPACE: normal"/>
                  地 &nbsp;址：深圳市宝安区沙井后亭学子围工业区C栋</p>
                </span></td>
            </tr>
          </tbody>
        </table>
        <p><br/>
        </p>
        <p style="TEXT-ALIGN: center"><img width="530" height="340" src="/static/picture/8d629efd44e44523802910878ff3b6e6.gif"/></p>
        <p style="text-align: center;"><br/>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
</div>

 
 
<!-- <style>
.footnei li{overflow: hidden;
    line-height: 30px;
    height: 30px;}
</style>
<div class="foot">
  <div class="footer clearfix">
    <div class="fl footOne">
      <p><img src="/static/picture/1543485466481995_1.png" title="1543485466481995.png" alt="LOGO.png" width="196" height="74" style="width: 196px; height: 74px;"/></p>
      <div class="lianxi">
        <p>深圳市宝安区沙井街道后亭学子围工业区C栋2楼</p>
        <p>全国统一服务热线 : 4008897913</p>
        <p>E-mail : 3310073861@qq.com</p>
        <p>Q Q：3310073861</p>
      </div>
    </div>
    <div class="fl footTwo">
      <p><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 24px;"><strong>新闻中心</strong></span></p>
      <ul class="footnei">
	  	<?php  $_result=M("Article")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where(" 1  and lang=1 AND status=1 ")->order("updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>"><?php echo ($r["title"]); ?></a></li><?php endforeach; endif;?>
        
      </ul>
    </div>
    <div class="fr erwei">
      <p><img src="/static/picture/1543485366826110_1.jpg" title="特西电气" alt="特西电气" width="219" height="220" style="width: 219px; height: 220px;" border="0" vspace="0"/></p>
    </div>
  </div>
</div>
<div class="foot2">
  <div class="footer">
    <div class="clearboth"></div>
    <div class="copyright">
      <p>Copyright ?http://<?php  echo $_SERVER['SERVER_NAME']; ?> 深圳市特西智能电气有限公司 All Right Reserved. &nbsp; &nbsp; 版权所有：<a href="http://<?php  echo $_SERVER['SERVER_NAME']; ?>/" target="_self">深圳市特西智能电气有限公司</a>&nbsp; &nbsp; 备案号：<a href="http://beian.miit.gov.cn" target="_self" textvalue="粤ICP备15032763号">粤ICP备15032763号</a></p>
    </div>
     
  </div>
</div> -->
  
<!--底部JS加载区域-->
<script type="text/javascript" src="/static/js/common_1.js"></script>
<script type="text/javascript" src="/static/js/message_1.js"></script>
<script>
    bb1(); //首页banner切换
    </script>
</body></html>





<!--在线客服-->
<!-- <link rel="stylesheet" href="/static/kefu/qqkf.css" type="text/css"/>
<div id="floatTools" class="float0831">
  <div class="floatL"> <a title="关闭在线客服" class="btnCtn" id="aFloatTools_Hide" style="display: block;" onclick="javascript:$('#divFloatToolsView').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#divFloatToolsView').hide(); });$('#aFloatTools_Show').attr('style','display:block');$('#aFloatTools_Hide').attr('style','display:none');" href="javascript:void(0);">收缩</a> <a title="查看在线客服" class="btnOpen" id="aFloatTools_Show" style="display: none;" onclick="javascript:$('#divFloatToolsView').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#divFloatToolsView').show(); });$('#aFloatTools_Show').attr('style','display:none');$('#aFloatTools_Hide').attr('style','display:block');" href="javascript:void(0);">展开</a> </div>
  <div id="divFloatToolsView" class="floatR">
    <div class="tp"></div>
    <div class="cn">
      <ul>
        <li class="top">
          <h3 class="titZx"> QQ咨询 </h3>
        </li>
        <li> <span class="icoZx">在线咨询</span> </li>
        
        
        <li style="line-height:17px; padding-top:15px;"> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=3310073861&amp;site=qq&amp;menu=yes"><img height="17" src="/static/kefu/qq.png"> 业务-刘生</a> </li> 
		  <li style="line-height:17px; padding-top:15px;"> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=3310073861&amp;site=qq&amp;menu=yes"><img height="17" src="/static/kefu/qq.png"> 业务-刘生</a> </li>     </ul>
      <ul>
        <li>
          <h3 class="titDh"> 电话咨询 </h3>
        </li>
         <?php if(is_array($mytel)): $i = 0; $__LIST__ = $mytel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li> <span class="icoTl"><?php echo ($r["value"]); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li class="bot">
          <h3 class="titDc"> <a href="/" target="_blank">驰骋网络</a> </h3>
        </li>
      </ul>
    </div>
  </div>
</div> -->
<!-----foot end------->