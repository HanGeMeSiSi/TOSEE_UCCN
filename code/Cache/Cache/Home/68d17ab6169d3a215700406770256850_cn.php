<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($seo_title); ?>-<?php echo ($site_name); ?></title> 
<meta name="keywords" content="<?php if($seo_keywords=='') : echo ($seo_title); else : echo ($seo_keywords); endif;?>" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0,minimal-ui">
<meta name="description" content="<?php echo ($seo_description); ?>" />
<meta name="baidu-site-verification" content="57egBW5jZG" />
<link rel="stylesheet" type="text/css" href="/static/css/base_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/model_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/main_1.css" />
<link rel="stylesheet" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/css/animate.min.css">
<link rel="stylesheet" href="/static/iconfont/iconfont.css">
<link rel="stylesheet" href="/static/css/yh/main.css">
<link rel="stylesheet" href="/static/css/header.css?v1.0.1">
<link rel="stylesheet" href="/static/layui/css/layui.css">
<link rel="stylesheet" href="/static/css/footer.css?v1.0.0">
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
        let titleName = $(menu_items[menu_items.length-1]).find(".menu-item-title").text();
        titleName = titleName.replace(/\s*/g,"");
        // console.log(titleName)
        if(titleName === "联系我们"){
            $(menu_items[menu_items.length-1]).attr("title","4008897913").css({position:"relative"}).append(
                `<div class="lianxi_tanchu">
                    <img src="/static/picture/1515132262343080_1.png"/>
                    <span>4008897913</span>
                </div>`
            );
        }
        menu_item_active();
        function menu_item_active(){
            for(let i = 0;i<menu_items.length;i++){
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
        $(".left-menu-title").click((e)=>{
            let _this = $(e.target);
            // console.log();
            let isActive = _this.closest(".left-menu-item").hasClass("active");
            if(isActive){
                window.location.href = $(e.target).data().url;
            }
        });
        $(".left-menu-child").click((e)=>{
            window.location.href = $(e.target).data().url;
        });
    });
  })()
</script>
<div class="top_zhanwei"></div>


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
      <div style="display:none;" class="box n_contact">
        <h3>联系我们</h3>
        <div class="content n_lianxi">
          <p><img src="/static/picture/1506395094817044.gif" title="智能配电箱" alt="智能配电箱" width="241" height="97" border="0" vspace="0" style="width: 241px; height: 97px;"/></p>
          <p><br/>
          </p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">深圳市特西智能电气有限公司</span></strong></span></p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">电话：</span></strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">0755-23202921<br/>
            </span></span></p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">手机：</span></strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">18928489391</span></span></p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">邮箱：</span></strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">3310073861@qq.com</span></span></p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">网址：</span></strong></span><a href="http://<?php  echo $_SERVER['SERVER_NAME']; ?>" target="_self" style="text-decoration: underline; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;"><?php  echo $_SERVER['SERVER_NAME']; ?></span></a><br/>
            <span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">地址：</span></strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">深圳市宝安区沙井街道后亭学子围工业网C栋2楼</span></span></p>
          <p style="line-height: 2em;"><span style="font-size: 14px;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">阿里巴巴：</span></strong></span><a href="http://szzhoushi.1688.com/" target="_blank" style="text-decoration: underline; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 12px;">http://szzhoushi.1688.com/</span></a></p>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="sitemp clearfix">
        <h2>企业简介 </h2>
        <div class="site">您的当前位置： <a href="/">首 页</a>><span class="cc">企业简介</span> </div>
      </div>
      <div class="content">
        <p style="LINE-HEIGHT: 2em"><span style="vertical-align: middle; line-height: 1.75em; text-indent: 2em; font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; &nbsp;深圳市特西智能电气有限公司是一家专注于物联网智慧安全用电，集产品研发、设计、制造、<a href='/product/225.html' target='_blank' class='key_tag'><font color=#136ec2><strong>智慧安全用电管理系统</strong></font></a>云平台建设、销售为一体的高新技术企业，公司旗下品牌“特西德”、“迈通”已为国内知名电气品牌。</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 公司基于物联网时代的到来，国家智能电网的发展和节能减排需要，五年磨一剑，研发了国内首款符合国家3C标准、集智慧安全、遥控大数据为一体的机械双金+电子双重保护智慧断路器，通过了国家3C认证，欧盟的CE认证、深圳市计量质量检测院等认证、国家公安部检测中心智慧电气安全预警系统认证等。并取得了发明专利、实用新型专利、软件著作权、国家知识产权管理体系等60多项专业和证书，并为用户承保了1000万的产品责任险。</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 特西电气是深圳市电气安全物联网协会的发起人之一，且公司与多个高等院校开展产学研究合作，通过优势互补，达到互利互赢。校企双方联合建立“产、学、研”合作平台，如：与贵阳理工学院共建国内首个“电力大数据实验室”和“电力跨界应用实验室”。</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 特西电气安全用电系列产品广泛应用于住宅、写字楼、校园、学校、银行、医院、油站、酒店、基站安全用电等多个领域，从而达到了用电安全与管理的智能化，致力于为社会电气火灾事故每年降低5%而努力奋斗！</span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;"><strong>公司荣誉&nbsp;</strong></span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 公司连续八年被深圳市质量技术监督授予&quot;产品监检质量优&quot;等荣誉称号；</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 2002年-2005年国家经济贸易委员会列入《全国城乡电网建设与改造所需要设备产品及生产推荐目录》;</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 2009年至2013年深圳产品质量监督所授权深圳市电气行业行业中唯一可使用&quot;质量跟踪产品&quot; 的标志；</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 2012年和2013年广东省名牌战略推委员会评为&quot;广东省名牌产品称号&quot;，是深圳市电气行业中唯一获得此殊荣的品牌；</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 2015年通过了二级计量保证，同年被国家质量监督检验检疫评为&quot;国家免检&quot;产品。</span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;"><strong>企业愿景</strong></span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 将“特西德”品牌打造成智慧能源物联网安全用电的国际知名品牌！</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 为社会电气火灾事故每年降低5%而努力奋斗！</span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;"><strong>企业文化</strong></span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; <span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0);"><strong>研发为源&nbsp; 战略领先&nbsp; 客户至上</strong></span></span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;"><strong>企业核心价值观:</strong></span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp;</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; <span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0);"><strong>责任、诚信 、卓越！&nbsp;&nbsp;</strong></span></span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;"><strong>董事长致辞&nbsp;</strong></span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 宝剑锋从磨砺出，梅花香自苦寒来。六年来，特西智能遵从“研发为源，战略领先，客户至上”的发展方针，致力于打造国内一流世界知名的电气产品制造商，旗下品牌“TOSEE”，“MAYTO”为全国著名商标。我们今天骄人的成绩是靠我们特西所有成员经过艰苦卓绝的奋斗取得的成果，在前行的道路上，我们秉承“追求完美，争创一流”的企业精神，恪守“诚信、创新、责任、价值”的核心价值观，励精图治，改革创新。公司拥有完整、科学的质量管理体系, 高效、顶尖的研发团队,致力于开发节能、环保、安全的智能配电设备。 产品广泛用于工业、商业、高层建筑和民用住宅等各种场所。公司依托全国的销售网络,及时为用户提供满意的售后服务及各种成套解决方案。</span></p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">&nbsp; &nbsp; 千江有水千江月。我们身处祖国飞速发展的时代，我们特西团队有信心与所有客户一起精诚团结，相互支持，取得共同的进步，共创美好辉煌的明天！</span></p>
        <p><br/>
        </p>
        <p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 20px;">&nbsp; &nbsp; <span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0);"><strong>特西电气现面向全国招商加盟，期待您的强势加入！</strong></span></span></p>
        <p style="LINE-HEIGHT: 2em"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0); font-size: 18px;"></span></p>
        <p style="line-height: 2em; text-align: center;"><br/>
        </p>
      </div>
    </div>
  </div>
</div>

 
 
<div class="footer_div">
  <div class="foot_content">
    <div class="foot_item">
      <div style="width:85%">
        <p><img src="/static/picture/1543485466481995_1.png" title="1543485466481995.png" alt="LOGO.png" width="196" height="74" style="width: 196px; height: 74px;"/></p>
        <div class="lianxi">
          <p class="mt1">深圳市宝安区沙井街道后亭学子围工业区C栋2楼</p>
          <p class="mt1">全国统一服务热线 : 4008897913</p>
          <p class="mt1">E-mail : 3310073861@qq.com</p>
          <p class="mt1">Q Q：3310073861</p>
        </div>
      </div>
    </div>
    <div class="foot_item">
      <div>
        <p><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 24px;"><strong>新闻中心</strong></span></p>
        <ul class="footnei">
        <?php  $_result=M("Article")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where(" 1  and lang=1 AND status=1 ")->order("updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>"><?php echo ($r["title"]); ?></a></li><?php endforeach; endif;?>
        </ul>
      </div>
    </div>
    <div class="foot_item">
      <div>
        <p><img src="/static/picture/1543485366826110_1.jpg" title="特西电气" alt="特西电气" width="219" height="220" style="width: 219px; height: 220px;" vspace="0"/></p>
      </div>
    </div>
  </div>
  <!-- <div class="foot2">
    <div class="footer">
      <div class="clearboth"></div>
      <div class="copyright">
        <p>Copyright ?http://<?php  echo $_SERVER['SERVER_NAME']; ?> 深圳市特西智能电气有限公司 All Right Reserved. &nbsp; &nbsp; 版权所有：<a href="http://<?php  echo $_SERVER['SERVER_NAME']; ?>/" target="_self">深圳市特西智能电气有限公司</a>&nbsp; &nbsp; 备案号：<a href="http://beian.miit.gov.cn" target="_self" textvalue="粤ICP备15032763号">粤ICP备15032763号</a></p>
      </div>
      
    </div>
  </div> -->
</div>
<!--底部JS加载区域-->
<script type="text/javascript" src="/static/js/common_1.js"></script>
<script type="text/javascript" src="/static/js/message_1.js"></script>
</body>
</html>





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