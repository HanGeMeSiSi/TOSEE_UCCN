<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($seo_title); ?>-<?php echo ($site_name); ?></title> 
<meta name="keywords" content="<?php if($seo_keywords=='') : echo ($seo_title); else : echo ($seo_keywords); endif;?>" />
<!-- <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0,minimal-ui"> -->
<meta name="description" content="<?php echo ($seo_description); ?>" />
<meta name="baidu-site-verification" content="57egBW5jZG" />
<link rel="stylesheet" type="text/css" href="/static/css/base_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/model_1.css" />
<link rel="stylesheet" type="text/css" href="/static/css/main_1.css?v1.0.1" />
<link rel="stylesheet" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/css/animate.min.css">
<link rel="stylesheet" href="/static/iconfont/iconfont.css">
<link rel="stylesheet" href="/static/css/yh/main.css?v1.0.3">
<link rel="stylesheet" href="/static/css/header.css?v1.0.2">
<link rel="stylesheet" href="/static/layui/css/layui.css">
<link rel="stylesheet" href="/static/css/footer.css?v1.0.1">
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


		<!-- 首页banner -->

<style>
  .chanping_center{
   margin-top: 20px;
   margin-bottom: 20px;
  }
  .chanping_center .big_title,
  .yingyong_fw .big_title,
  .news_center .big_title,
  .about_us .big_title{
    color: #000000;
    font-size: 38px;
    text-align: center;
    background: url(/static/Images/titline_1.png) no-repeat bottom center;
    padding-bottom: 15px;
    margin-bottom: 20px;
  }
  .about_us {
    margin: 0 auto;
  }
  .news_center .news_div_item .newsMore:hover{
    background-color: #000;
  }
  .news_center .news_div_item .newsMore{
    padding: 10px 20px;
    position: absolute;
    bottom: 10px;
    right: 30px;
    border-radius: 5px;
    transition: all 0.3s linear;
    background-color: #b7b7b7;
    color: #fff;
  }
  .news_center .news_div_item .news_time{
    display: block;
    color: #6a6a6a;
    font-size: 20px;
    padding: 15px 0;
    padding-left: 40px;
    background: url(/static/images/time_1.png) no-repeat left 5px ;
  }
  .news_center .news_div_item .news_big_title{
    font-size: 24px;
    display: block;
  }
  .news_center .news_div_item{
    position: relative;
    width: 70%;
    margin: 0 auto;
  }
  .news_center{
    margin: 30px auto;
  }
  .chanping_center .chanping_content{

  }
  .about_us .bigshu{
    width: 80%;
    margin: 0 auto;
  }
  .about_us .jianrong{
    margin: 0 auto;
    width: 80%;
  }
  .chanping_center .chanping_content .cp_item{
    padding: 20px;
    cursor: pointer;
  }
  .chanping_center .chanping_content .cp_item:hover .cp_item_name{
    background-color: #e87518;
  }
  .chanping_center .chanping_content .cp_item .cp_item_name{
    text-align: center;
    font-size: 19px;
    font-weight: 700;
    background-color: #515151;
    color:#fff;
    padding: 12px 0;
    cursor: pointer;
    transition: all 0.3s linear;
  }
  .chanping_center .chanping_content .cp_item:hover .cp_item_img img{
    width: 100%;
  }
  .chanping_center .chanping_content .cp_item .cp_item_img img{
    transform: translate(-50%,-50%);
    position: absolute;
    left: 50%;
    top:55%;
    width: 90%;
    transition: all 0.3s linear;
  }
  .chanping_center .chanping_content .cp_item .cp_item_img{
    position: relative;
    margin: 0 auto;
    overflow: hidden;
  }
  .yingyong_content{
    margin: 0 auto;
  }
  .hanhan-div-swiper{
    position: relative;
    width: 100%;
    height: 100%;    
    overflow: hidden;
  }
  .hanhan-div-swiper .hanhan-sw-neirong{
    font-size: 0;
    height: 75%;
    position: absolute;
    left: 0;
    top: 0;
  }
  .hanhan-div-swiper .roll1 .ta1>p{
    height: 100%;
  }
  .hanhan-div-swiper .roll1 .ta1 img{
    width: 100%;
    height: 100%;
  }
  /* .hanhan-div-swiper .roll1 .ta2>p{
    width:100%;
  } */
  .hanhan-div-swiper .roll1 .ta1{width:70%;height:100%;display:inline-block;}
  .hanhan-div-swiper .roll1 .ta2{width:30%;height:100%;display:inline-block;}
  .hanhan-div-swiper .roll1 .ta2>p:nth-child(1)>span:nth-child(1){font-size: 30px;}
  .hanhan-div-swiper .roll1 .ta2>p:nth-child(1)>span:nth-child(2){font-size: 24px;}
  .hanhan-div-swiper .roll1 .ta2>p:nth-child(2){font-size: 18px;text-indent:2em;}
  .hanhan-div-swiper .roll1{
    height: 100%;
    width:100%;
    display:flex;
  }
  .hanhan-div-swiper .hanhan-sw-neirong .hanhan-sw-neirong-item{
    display: inline-block;
    font-size: 14px;
    /* background-color: #ccc; */
    height: 100%;
    overflow: hidden;
  }
  .hanhan-div-swiper .hanhan-sw-nav{
    box-sizing: border-box;
    height: 25%;
    display: flex;
    justify-content: space-around;
    position: absolute;
    width: 100%;
    bottom: 0;
    left: 0;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item .tab_title{
    font-size: 20px;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item:hover{
    color: #f69b24;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item img{
    position: absolute;
    left:42%;
    top: 40%;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item .number{
    font-size: 30px;
    position: relative;
    /* background: url(/static/images/bj3_1.png) no-repeat right; */
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item>div{
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 100%;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item.active{
    border-bottom: 4px solid #f69b24;
  }
  .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item{
    user-select: none;
    margin-top: 20px;
    margin-bottom: 20px;
    border-right: 1px solid #c5c5c5;
    /* border-bottom: 1px solid #c5c5c5; */
    /* background-color: #000; */
    position: relative;
    color: #242424;
    cursor: pointer;
    width: 14.2856%;
    text-align: center;

  }
  @media screen and (max-width: 767px) {  
    .chanping_center .chanping_content .cp_item .cp_item_img{
      height: 350px;
      width: 70%;
    }
    .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item .tab_title{
      font-size: 12px;
    }   
    .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item .number img{
      display: none;
    }
    .hanhan-div-swiper .hanhan-sw-nav .hanhan-sw-nav-item .number{
      font-size: 14px;
    }
    .chanping_center .chanping_content .cp_item .cp_item_name{
      width: 70%;
      margin: 0 auto;
    }
    .hanhan-div-swiper .roll1 .ta2{
      padding: 20px;
    }
    .hanhan-div-swiper .roll1 .ta2>p{
      font-size: 16px;
      white-space: normal;
    }
    .hanhan-div-swiper .roll1 .ta2>p:nth-child(1){line-height: 1em;}
    .hanhan-div-swiper .roll1 .ta2>p:nth-child(1)>span:nth-child(1){font-size: 0.8em;}
    .hanhan-div-swiper .roll1 .ta2>p:nth-child(1)>span:nth-child(2){font-size: 0.6em;}
    .hanhan-div-swiper .roll1 .ta2>p:nth-child(2){font-size: 0.4em;text-indent:0.2em;line-height: 16px;padding-top: 8px;}
    .news_center .news_div_item{
      width: 90%;
    }
  }
  @media screen and (min-width: 768px){
    .chanping_center .chanping_content .cp_item .cp_item_img{
      height: 255px;
      width: 100%;
    }
    .yingyong_fw{
      width: 90%;
      margin: 0 auto;
    }
  }
  
</style>
<div class="topbanner">
  <!-- <div class="banner">
    <ul class="bb clearfix">
      <li> <a title="小型智能断路器" href="/product/227.html" target="_blank"> <img src="/static/picture/20191120160054_514_1.jpg" alt="小型智能断路器"/> </a> </li>
      <li> <a title="智能空开招商加盟" href="/about_zsjh/" target="_blank"> <img src="/static/picture/20190903094418_210_1.jpg" alt="智能空开招商加盟"/> </a> </li>
      <li> <a title="智能用电管理系统" href="/product/225.html" target="_blank"> <img src="/static/picture/20190903094548_592_1.jpg" alt="智能用电管理系统"/> </a> </li>
      <li> <a title="智能用电检测仪" href="/product/228.html" target="_blank"> <img src="/static/picture/20190903094619_825_1.jpg" alt="智能用电检测仪"/> </a> </li>
    </ul>
  </div> -->
  <div class="layui-carousel" id="lunbo_index">
    <div carousel-item>
      <div>
        <a title="小型智能断路器" href="/product/227.html" target="_blank"> 
          <img src="/static/picture/20191120160054_514_1.jpg" alt="小型智能断路器" style="width: 100%;height: 100%;"/> 
        </a>
      </div>
      <div>
        <a title="智能空开招商加盟" href="/about_zsjh/" target="_blank"> 
          <img src="/static/picture/20190903094418_210_1.jpg" alt="智能空开招商加盟" style="width: 100%;height: 100%;"/> 
        </a>
      </div>
      <div>
        <a title="智能用电管理系统" href="/product/225.html" target="_blank"> 
          <img src="/static/picture/20190903094548_592_1.jpg" alt="智能用电管理系统" style="width: 100%;height: 100%;"/> 
        </a>
      </div>
      <div>
        <a title="智能用电检测仪" href="/product/228.html" target="_blank"> 
          <img src="/static/picture/20190903094619_825_1.jpg" alt="智能用电检测仪" style="width: 100%;height: 100%;"/> 
        </a>
      </div>
    </div>
  </div>
  <script>
    layui.use('carousel', function(){
      var carousel = layui.carousel;
      //建造实例
      carousel.render({
        elem: '#lunbo_index'
        ,width: document.body.clientWidth //设置容器宽度
        ,height: document.body.clientWidth/3
        ,arrow: 'always' //始终显示箭头
        //,anim: 'updown' //切换动画方式
      });
    });
  </script>
</div>
<!-- <div class="nei1">
  <div class="container clearfix">
    <div class="fr" style="margin-top:5px;"> <a href="/Page/list/93.html"> <img src="/static/picture/lianxi_1.jpg" alt="" /> </a> </div>
  </div>
</!--> -->
  <!-- 产品中心 -->
<div class="container">
  <div class="chanping_center">
    <div class="big_title">产品中心</div>
    <!-- 产品内容 -->
    <div class="chanping_content row">
      <?php  $_result=M("Product")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where("posid=1 and lang=1 AND status=1 ")->order("listorder desc,updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><div class="cp_item col-sm-3" data-url="<?php echo ($r["url"]); ?>" 
          onclick="(function(e){
            let newurl = $(e).data().url;
            let nowpath = window.location.pathname;
            if(nowpath !== newurl){
              window.location.href = newurl;
            }
          })(this)"
        >
          <div class="cp_item_img">
            <img src="<?php echo ($r["thumb"]); ?>" alt="<?php echo ($r["title"]); ?>">
          </div>
          <div class="cp_item_name"><?php echo ($r["title"]); ?></div>
        </div><?php endforeach; endif;?>
    </div>
  </div>
  <!-- 应用范围 -->
  <div class="yingyong_fw"> 
    <div class="big_title">应用范围</div>
    <div class="yingyong_content" id="yingyong_content">
      <div class="hanhan-div-swiper">
        <div class="hanhan-sw-neirong">
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1515142345502643_1.jpg" title="智慧学校" alt="智慧学校" vspace="0" /></p>
              </div>
              <div class="ta2">
                <p>
                  <span>01</span>
                  <span>智慧学校</span>
                </p>
                <p>
                  智能电源管理，智慧教室，智慧会议室，随时查看校园监控情况，管理员集中管控，分权限管理。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1515125088988957_1.jpg" title="智慧酒店" alt="智慧酒店" vspace="0"/></p>
              </div>
              <div class="ta2">
                <p>
                  <span>02</span>
                  <span>智慧酒店</span>
                </p>
                <p>
                  实时监测客房状态、宾客需求、服务状况及设备情况，极好的智慧睡眠体验，提高入住率。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1567475844692936_1.jpg" title="智慧医院" alt="智慧医院" vspace="0"/></p>
              </div>
              <div class="ta2">
                <p>
                  <span>03</span>
                  <span>智慧医院</span>
                </p>
                <p>
                  监控所有电器设备的负载能耗，以及一切的故障情况等，合理分配各线路负载均衡用电，防止电器火灾等，确保医院和病患的用电安全。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1567475559539070_1.jpg" title="智慧银行" alt="智慧银行" vspace="0"/></p>
              </div>
              <div class="ta2">
                <p>
                  <span>04</span>
                  <span>智慧银行</span>
                </p>
                <p>
                  合理分配各线路的均衡用电，远程控制所有开关，防止产生待机功耗，限电设置、断电保护功能和断电报警功能，能在第一时间发出警报，防止断电监控失效而导致的人身安全和财产损失。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1567476051766588_1.jpg" title="智能油站" alt="智能油站" vspace="0" /></p>
              </div>
              <div class="ta2">
                <p>
                  <span>05</span>
                  <span>智能油站</span>
                </p>
                <p>
                  智慧空开有雷电保护装置，在高压雷电攻击时能自行断电，雷电过后五秒可恢复自动送电，防止因雷电攻击导致的财产损失和人身安全。高灵敏漏电保护装置、高性能的智慧开关故障预判功能，在没有发生事故前，就可以提前预判故障信息，及时找出故障点排除隐患。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1515124935814909_1.jpg" title="智能家居" alt="智能家居" vspace="0" /></p>
              </div>
              <div class="ta2">
                <p>
                  <span>06</span>
                  <span>智能家居</span>
                </p>
                <p>
                  门窗控制，灯光控制，电器控制，安防监控，环境监测。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
          <div class="hanhan-sw-neirong-item">
            <div class="roll1">
              <div class="ta1">
                <p><img src="/static/picture/1567476197582122_1.jpg" title="基站用电" alt="基站用电" vspace="0" /></p>
              </div>
              <div class="ta2">
                <p>
                  <span>07</span>
                  <span>基站用电</span>
                </p>
                <p>
                  未来5G基站的建设规模非常庞大，为了信号的可靠性，每百米需要一个站点，对电气安全监控将会要求更高，智慧空开产品将会为5G基站的建设可靠安全用电做出保障及贡献。
                </p>
                <p style="white-space: normal;">
                  <img src="/static/picture/1506307224104309_1.png"alt="more.png"/>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- 导航 -->
        <div class="hanhan-sw-nav">
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                01
              </span>
              <span class="tab_title">智慧学校</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                02
              </span>
              <span class="tab_title">智慧酒店</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                03
              </span>
              <span class="tab_title">智慧医院</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                04
              </span>
              <span class="tab_title">智慧银行</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                05
              </span>
              <span class="tab_title">智能油站</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                06
              </span>
              <span class="tab_title">智能家居</span>
            </div>
          </div>
          <div class="hanhan-sw-nav-item">
            <div>
            <span class="number">
                <img src="/static/images/bj3_1.png" alt="">
                07
              </span>
              <span class="tab_title">基站用电</span>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<div class="mt3">
  <p><a href="/Page/list/91.html" target="_blank" title="招商加盟"><img src="/static/picture/1567476880631647_1.jpg" title="招商加盟" alt="招商加盟"vspace="0" style="width: 100%;"/></a></p>
</div>
<!-- 新闻中心 -->
<div class="news_center row container">
  <div class="big_title">新闻中心</div>
  <?php  $_result=M("Article")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where("catid in (86,87,88) and lang=1 AND status=1 ")->order("updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><div class="col-sm-6 col-xs-12 mt3"> 
        <div class="news_div_item clearfix"> 
          <a href="<?php echo ($r["url"]); ?>" class="fl newsImg">
            <img src="<?php if($r['thumb']) echo $r['thumb']; else echo '/static/picture/nopic.jpg'; ?>" width="150" height="150"/>
          </a>
          <div class="fl"> 
            <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" class="news_big_title"> <?php echo (substr($r["title"],0,36)); ?> </a> 
            <span class="news_time"> <?php echo (todate($r["createtime"],'Y-m-d')); ?></span> 
            <a href="<?php echo ($r["url"]); ?>" class="newsMore">查看详情</a> 
          </div>
        </div>
      </div><?php endforeach; endif;?>  
</div>
<!-- 关于我们 -->
<div class="about_us row container">
  <div class="big_title">关于我们</div>
  <!-- 内容主体 -->
  <div class="row">
    <div class="col-xs-12 col-sm-6 mt3">
      <div style="width: 80%;margin: 0 auto;">
        <img src="/static/picture/1567477031543944_1.jpg" alt="智能电气" title="智能电气" style="width: 100%;">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <p style="line-height: 2em; text-indent: 2em;"><span style="vertical-align:middle;font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; line-height: 1.75em; text-indent: 2em; font-size: 20px; color: rgb(0, 0, 0);">TOSEE&nbsp; 特西德</span><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; line-height: 1.75em; text-indent: 2em;">&nbsp; &nbsp; &nbsp; &nbsp;<a href="/about/contact.html" target="_self"><img src="/static/picture/1506309706171438_1.png" title="1506309706171438.png" alt="a.png"/></a>&nbsp;</span></p>
      <p style="line-height: 2em;">&nbsp;<span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;深圳市特西智能电气有限公司是一家专注于物联网智慧安全用电，集产品研发、设计、制造、智慧安全用电管理系统云平台建设、销售为一体的高新技术企业。</span></p>
      <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;公司基于物联网时代的到来，国家智能电网的发展和节能减排需要，五年磨一剑，研发了国内首款符合国家3C标准、集智慧安全、遥控大数据为一体的机械双金+电子双重保护智慧断路器，并通过了国家3C认证，欧盟的CE认证、深圳市计量质量检测院等认证、国家公安部检测中心智慧电气安全预警系统认证等。而且取得了发明专利、实用新型专利、软件著作权、国家知识产权管理体系等60多项专利和证书。并为用户承保了1000万的产品责任险。</span></p>
      <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;特西智能是深圳市电气安全物联网协会的发起人之一，且公司有与多个高等院校开展产学研究合作，通过优势互补，达到互利共赢，校企双方联合建立“产、学、研”合作平台，如：与贵阳理工学院共建国内首个“电力大数据实验室”和“电力跨界应用实验室”。</span></p>
      <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;特西电气安全用电系列产品广泛应用于住宅、写字楼、校园、学校、银行、医院、油站、酒店等多个领域，从而达到用电安全与管理的智能化。</span></p>
      <p><span style="font-size: 14px;"></span><br/>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="bigshu">
        <p><strong><span style="color: rgb(0, 0, 0); font-size: 20px;">智控、安全、大数据</span></strong></p>
        <p><span style="font-size: 12px; color: rgb(0, 0, 0);">远程控制，9大安全防护，提供用电侧能耗数据监测分析</span></p>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="jianrong">
        <p><span style="font-size: 20px;"><strong><span style="color: rgb(0, 0, 0);">简单、开放、兼容</span></strong></span></p>
        <p><span style="font-size: 12px; color: rgb(0, 0, 0);">开放的标准化平台，扩充整合容易，系统与未来多数科技产品相容</span></p>
      </div>
    </div>
  </div>
</div>
<script>
  hanhanDivSwiper({
    width:'100%',
    height:($("#yingyong_content").width())/2.2,
    app:"#yingyong_content",
    // weizhi:"center",
    count:7,
    interval:3000,
    time:1,
    isAuto:true
  });
  // 这是hanhan的轮播块
  /******
  * obj.width  @整个轮播的宽
  * obj.height  @整个轮播的高
  * obj.app  @父级
  // * obj.weizhi  @center居中
  * obj.count  @个数
  * obj.interval  @自动间隔
  * obj.time  @渐变时间
  * obj.isAuto  @是否自动播放
  ******/
  function hanhanDivSwiper(obj){
    let S_width = obj["width"];
    let S_heigth = obj["height"];
    let S_app = obj["app"];
    // let S_weizhi = obj["weizhi"];
    let S_count = obj["count"];
    let n_nr = $(S_app).find(".hanhan-sw-neirong");
    let n_nr_item = $(S_app).find(".hanhan-sw-neirong-item");
    let b_nav = $(S_app).find(".hanhan-sw-nav");
    let hanhanSW =$(S_app).find(".hanhan-div-swiper");
    // 是否开始轮播
    let isStart=true;
    // 是否自动播放
    let isAuto = obj['isAuto'];
    $(S_app).mouseenter(()=>{
      isStart=false;
    });
    $(S_app).mouseleave(()=>{
      isStart=true;
    });
    // 间隔
    let interval = obj["interval"];
    // 单次渐变时长
    let S_time = obj["time"];
    // if(S_weizhi == "center"){
    //   $(S_app).css({
    //     margin:"0 auto"
    //   })
    // }
    $((b_nav.find('.hanhan-sw-nav-item'))[0]).addClass("active");
    b_nav.find('.hanhan-sw-nav-item').click((e)=>{
      let _this = $(e.target);
      // console.log(_this);
      if(!_this.hasClass("hanhan-sw-nav-item")){
        return
      }
      _this.siblings().removeClass("active");
      _this.addClass("active"); 
    });
    $(S_app).css({
      height:S_heigth,
      width:S_width
    });
    // console.log(hanhanSW.width());
    n_nr.css({
      width:hanhanSW.width()*S_count,
      transition: `all ${S_time}s linear`
    });
    n_nr_item.css({
      width:hanhanSW.width()
    });
    setInterval(()=>{
      // 当前是第几个
      let nowIndex = b_nav.find(".hanhan-sw-nav-item.active").index();
      n_nr.css({
        left:-nowIndex*hanhanSW.width()
      })
    },100);
    
    setInterval(()=>{
      if(!isAuto){
        return
      }
      if(!isStart){
        return
      }
      let all_items = b_nav.find(".hanhan-sw-nav-item");
      let nowIndex = b_nav.find(".hanhan-sw-nav-item.active").index();
      $(all_items[nowIndex]).removeClass("active");
      if(nowIndex == all_items.length-1){
        // alert(123)
        $(all_items[0]).addClass("active");
      }else{
        $(all_items[nowIndex+1]).addClass("active");
      }
    },interval);
  }
</script>

 
 
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
  <div class="copyright" id="footer_beian">
    <p>Copyright ?http://<?php  echo $_SERVER['SERVER_NAME']; ?> 深圳市特西智能电气有限公司 All Right Reserved. &nbsp; &nbsp; 版权所有：<a href="http://<?php  echo $_SERVER['SERVER_NAME']; ?>/" target="_self">深圳市特西智能电气有限公司</a>&nbsp; &nbsp; 备案号：<a href="http://beian.miit.gov.cn" target="_self" textvalue=""></a></p>
  </div>
</div>
<!--底部JS加载区域-->
<script type="text/javascript" src="/static/js/common_1.js"></script>
<script type="text/javascript" src="/static/js/message_1.js"></script>
</body>
</html>





<!--在线客服-->
<link rel="stylesheet" href="/static/kefu/qqkf.css" type="text/css"/>
<div id="floatTools" class="float0831">
  <div class="floatL"> 
    <a title="关闭在线客服" 
      class="btnCtn"  
      id="aFloatTools_Hide" 
      style="display: block;" 
      onclick="javascript:$('#divFloatToolsView').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#divFloatToolsView').hide(); });$('#aFloatTools_Show').attr('style','display:block');$('#aFloatTools_Hide').attr('style','display:none');" href="javascript:void(0);"
    >收缩</a> 
    <a title="查看在线客服" 
      class="btnOpen" 
      id="aFloatTools_Show" 
      style="display: none;" 
      onclick="javascript:$('#divFloatToolsView').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#divFloatToolsView').show(); });$('#aFloatTools_Show').attr('style','display:none');$('#aFloatTools_Hide').attr('style','display:block');" href="javascript:void(0);">
    展开</a> 
  </div>
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
</div>
<script>
  (function(){
    // if(window)
    var footer_beian = $("#footer_beian");
    var hostname = window.location.hostname;
    if(hostname =="www.sztosee.cn"){
      console.log(123)
      var a_s = footer_beian.find("a");
      $(a_s[a_s.length-1]).text("粤ICP备20025221号").attr("textvalue","粤ICP备20025221号");
    }else if(hostname =="www.toseesz.com"){
      var a_s = footer_beian.find("a");
      // $(a_s[a_s.length-1]).text("粤ICP备20025221号").attr("textvalue","粤ICP备20025221号");
    }
    // console.log(window.location.hostname)
    $(document).ready(()=>{
      document.getElementById("aFloatTools_Hide").click();
    })
  })()
</script>
<!-----foot end------->