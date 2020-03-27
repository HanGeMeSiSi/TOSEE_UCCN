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

<div class="n_banner">   <img src="/static/picture/20191120160635_955.jpg" alt="新闻资讯" title="新闻资讯" />   </div>
<div class="neiBox">
  <!-- 主体部分 -->
  <div id="container" class="clearfix">
    <div class="left">
      <div class="box sort_menu">
          <h3> 特西电气</h3>
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
        <h2>招商计划 </h2>
       <div class="site">您的当前位置： <a href="/">首 页</a>><span class="cc"><?php echo ($title); ?></span> </div>
      </div>
      <div class="content">
        <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; text-align: justify; line-height: 28px;"><strong><span style="font-size: 20px; font-family: 微软雅黑;"></span></strong></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><strong><span style="font-size: 18px;">行业前景：</span></strong></span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><span style="font-size: 18px; font-family: 微软雅黑;">&nbsp; &nbsp; &nbsp; &nbsp;2018年因违反电气安装使用规定引发的火灾占总数的34.6%，生活用火不慎引发的占21.5%，吸烟引发的占7.3%，自燃引发的占4.8%，生产作业不慎引发的占4.1%，玩火引发的占2.9%，放火引发的占1.3%，雷击静电引发的占0.1%，其他原因引发的占17.1%，原因不明确的占4.2%，仍在调查的占2.1%，</span><strong><span style="font-size: 18px; font-family: 微软雅黑;">67起较大火灾中，37起为电气引起，4起重大火灾中，</span></strong><strong><span style="font-size: 18px; font-family: 微软雅黑;">就有</span></strong><strong><span style="font-size: 18px; font-family: 微软雅黑;">3起为电气引起！</span></strong></span></p>
        <p style="white-space: normal; text-indent: 32px;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">根据《国务院安全生产委员会关于开展电气火灾综合治理工作的通知》（安委[2017]4号）&nbsp;、《中华人民共和国公安部关于全面推进“智慧消防”建设的指导意见》（公消[2017]297号）等通知的要求，全国省市地区陆续展开智慧式用电安全隐患监管服务系统推广工作，电气安全刻不容缓！</span></p>
        <p style="white-space: normal; text-indent: 32px;"><br/>
        </p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><strong><span style="font-size: 18px; font-family: 微软雅黑;">加盟优势：</span></strong></span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">1、品牌支持：免费为合作商提供品牌宣传资料等；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">2、推广支持：支持网络推广、学术会议、行业展会等宣传形式宣传；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">3、厂家直销：厂家直销供货，厂价更有优势，预留给合作商丰厚的利润空间；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">4、区域保护：严禁的区域市场保护政策，每一地级市仅限一家合作商；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">5、技术支持：编制项目施工方案、现场技术交流、技术人员全程提供24个小时在线咨询服务；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">6、安装培训：免费培训安装维护人员，提供工程安装技术指导；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">7、售后支持：客服中心将及时处理并解决合作商在运营中遇到的问题；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp;</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><strong><span style="font-size: 18px; font-family: 微软雅黑;">加盟条件：</span></strong></span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">1、建筑、消防、设计等相关行业具有一定客户及良好的商誉和信誉，并有能力协调当地的消防部门及政府相关主管部门的单位或个人；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">2、具备市场规划和开拓能力，具有良好的行业背景，并具备1年以上业务往来经历，有稳定的销售渠道，诚实守信；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">3、以公司名义申请需要向本公司提供营业执照副本（复印件）、税务登记证副本（复印件）及法人代表证明（身份证复印件）等资质文件。个人申请提供有效证件（身份证复印件），以便公司备案。</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">4、在电气行业有一定的经营经验，有较强的销售团对和技术团队的优先考虑。</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp;</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><strong><span style="font-size: 18px; font-family: 微软雅黑;">经销商政策：</span></strong></span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">1、独家授权经销，负责区域可以是片区、县、市、省的总经销，授权经销商只能对授权区域的项目进行产品销售和提供技术服务；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">2、授权经销商需完成区域分配的业绩指标，销售按当地人口与经济情况调整（具体情况按最终合同为准），并遵守电气市场的管理要求。</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">3、丰厚的后期提货奖励返点。</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp;</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><strong><span style="font-size: 18px; font-family: 微软雅黑;">加盟流程:</span></strong></span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">1、加盟咨询；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">2、双方资质判断和相互了解；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">3、确认意向；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">4、签订合同；</span></p>
        <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">5、达成合作。</span></p>
        <p style="margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; text-align: justify; line-height: 28px;"><br/>
        </p>
      </div>
    </div>
  </div>
</div>

 
 
<div class="footer_div">
  <div class="foot_content">
    <div class="foot_item">
      <div>
        <p><img src="/static/picture/1543485466481995_1.png" title="1543485466481995.png" alt="LOGO.png" width="196" height="74" style="width: 196px; height: 74px;"/></p>
        <div class="lianxi">
          <p>深圳市宝安区沙井街道后亭学子围工业区C栋2楼</p>
          <p>全国统一服务热线 : 4008897913</p>
          <p>E-mail : 3310073861@qq.com</p>
          <p>Q Q：3310073861</p>
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