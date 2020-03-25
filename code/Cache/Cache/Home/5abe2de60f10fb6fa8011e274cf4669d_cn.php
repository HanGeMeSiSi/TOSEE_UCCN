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
                    url:""
                },{
                    name:"智能集中控制器",
                    url:""
                },{
                    name:"智能空开",
                    url:""
                },{
                    name:"智能断路器",
                    url:""
                },{
                    name:"智能电箱",
                    url:""
                },{
                    name:"智能用电管理系统",
                    url:""
                },{
                    name:"智能用电检测仪",
                    url:""
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
                    url:""
                },
                {
                    name:"政策法规",
                    url:""
                },
                {
                    name:"行业资讯",
                    url:""
                }
            ],
            url:"/Article/list/71.html"
        },
        {
            firstName:"公司简介",
            children:[
                {
                    name:"企业简介",
                    url:""
                },
                {
                    name:"招商计划",
                    url:""
                },
                {
                    name:"人员招聘",
                    url:""
                },
                {
                    name:"联系我们",
                    url:""
                }
            ],
            url:"/Page/list/89.html"
        },
        {
            firstName:"联系我们",
            children:[],
            url:"/Page/list/93.html"
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
        
        $(".menu .menu-item").mouseenter((e)=>{
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
        $(".menu .menu-item").mouseleave((e)=>{
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


		<!-- 首页banner -->

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
          <img src="/static/picture/20191120160054_514_1.jpg" alt="小型智能断路器"/> 
        </a>
      </div>
      <div>
        <a title="智能空开招商加盟" href="/about_zsjh/" target="_blank"> 
          <img src="/static/picture/20190903094418_210_1.jpg" alt="智能空开招商加盟"/> 
        </a>
      </div>
      <div>
        <a title="智能用电管理系统" href="/product/225.html" target="_blank"> 
          <img src="/static/picture/20190903094548_592_1.jpg" alt="智能用电管理系统"/> 
        </a>
      </div>
      <div>
        <a title="智能用电检测仪" href="/product/228.html" target="_blank"> 
          <img src="/static/picture/20190903094619_825_1.jpg" alt="智能用电检测仪"/> 
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
        ,width: '100%' //设置容器宽度
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
</div> -->
<div class="nei2">
  <div class="container">
    <div class="nei2tit"> 产品中心 </div>
    <div class="nei2Con">
      <ul class="product_listN2 clearfix">
        <?php  $_result=M("Product")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where("posid=1 and lang=1 AND status=1 ")->order("listorder desc,updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li> <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank" class="img"><img src="<?php echo ($r["thumb"]); ?>" alt="<?php echo ($r["title"]); ?>" /></a>
            <h3><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank"><?php echo ($r["title"]); ?></a></h3>
          </li><?php endforeach; endif;?>
      </ul>
    </div>
    <div class="nei2Box">
      <div class="nei2tit"> 应用范围 </div>
      <div id="tabs_box">
        <div id="tabs-body" class="tabs-body clearfix">
          <div style="display:block;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1515142345502643_1.jpg" title="智慧学校" alt="智慧学校" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">01&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智慧学校</span></p>
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;"></span>智能电源管理，智慧教室，智慧会议室，随时查看校园监控情况，管理员集中管控，分权限管理。</p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1515125088988957_1.jpg" title="智慧酒店" alt="智慧酒店" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">02&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智慧酒店</span></p>
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;"></span>实时监测客房状态、宾客需求、服务状况及设备情况，极好的智慧睡眠体验，提高入住率。<span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;"></span></p>
                <p style="white-space: normal;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></p>
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;"><img src="/static/picture/1506307224104309_1.png" title="1506307224104309.png" alt="more.png"/></span></p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1567475844692936_1.jpg" title="智慧医院" alt="智慧医院" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">03&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智慧医院</span></p>
                <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span><span style="font-size: 14px;">监控所有电器设备的负载能耗，以及一切的故障情况等，合理分配各线路负载均衡用电，防止电器火灾等，确保医院和病患的用电安全。</span></p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1567475559539070_1.jpg" title="智慧银行" alt="智慧银行" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">04&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智慧银行</span></p>
                <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span><span style="font-size: 14px;">合理分配各线路的均衡用电，远程控制所有开关，防止产生待机功耗，限电设置、断电保护功能和断电报警功能，能在第一时间发出警报，防止断电监控失效而导致的人身安全和财产损失。</span><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></p>
                <p style="white-space: normal;"><span style="font-size: 14px;"><img src="/static/picture/1506307485123802_1.png" title="1506307485123802.png" alt="more.png"/></span></p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1567476051766588_1.jpg" title="智能油站" alt="智能油站" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">05&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智能油站</span></p>
                <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span><span style="font-size: 14px;">智慧空开有雷电保护装置，在高压雷电攻击时能自行断电，雷电过后五秒可恢复自动送电，防止因雷电攻击导致的财产损失和人身安全。高灵敏漏电保护装置、高性能的智慧开关故障预判功能，在没有发生事故前，就可以提前预判故障信息，及时找出故障点排除隐患。</span><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></p>
                <p style="white-space: normal;"><span style="font-size: 14px;"><img src="/static/picture/1506307485123802_1.png" title="1506307485123802.png" alt="more.png"/></span></p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1515124935814909_1.jpg" title="智能家居" alt="智能家居" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">06&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">智能家居</span></p>
                <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span><span style="font-size: 14px;">门窗控制，灯光控制，电器控制，安防监控，环境监测。</span></p>
              </div>
            </div>
          </div>
          <div style="display:none;">
            <div class="roll1 clearfix">
              <div class="fl ta1">
                <p><img src="/static/picture/1567476197582122_1.jpg" title="基站用电" alt="基站用电" width="857" height="407" border="0" vspace="0" style="width: 857px; height: 407px;"/></p>
              </div>
              <div class="fr ta2">
                <p style="white-space: normal;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 33px;">07&nbsp;</span><span style="font-size: 25px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">基站用电</span></p>
                <p style="white-space: normal;"><span style="font-size: 18px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span><span style="font-size: 14px;">未来5G基站的建设规模非常庞大，为了信号的可靠性，每百米需要一个站点，对电气安全监控将会要求更高，智慧空开产品将会为5G基站的建设可靠安全用电做出保障及贡献。</span><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"></span></p>
                <p style="white-space: normal;"><span style="font-size: 14px;"><img src="/static/picture/1506307485123802_1.png" title="1506307485123802.png" alt="more.png"/></span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="clearboth"></div>
        <div class="tabs clearfix">
          <ul id="tabs" class="clearfix">
            <li class="tab-nav-action"><a href="javascript:void(0)"><span>01 <i></i></span>智慧学校</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>02 <i></i></span>智慧酒店</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>03 <i></i></span>智慧医院</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>04 <i></i></span>智慧银行</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>05 <i></i></span>智能油站</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>06 <i></i></span>智能家居</a></li>
            <li class="tab-nav"><a href="javascript:void(0)"><span>07 <i></i></span>基站用电</a></li>
          </ul>
        </div>
      </div>
      <script type="text/javascript">
    $(function(){
        $("#tabs li").on("hover", function(){
            var index = $(this).index();
            var divs = $("#tabs-body > div");
            $(this).parent().children("li").attr("class", "tab-nav");//将所有选项置为未选中
            $(this).attr("class", "tab-nav-action"); //设置当前选中项为选中样式
            divs.hide();//隐藏所有选中项内容
            divs.eq(index).show(); //显示选中项对应内容
        });
 
    });
</script>
    </div>
  </div>
</div>
<div class="nei3">
  <p><a href="/Page/list/91.html" target="_blank" title="招商加盟"><img src="/static/picture/1567476880631647_1.jpg" title="招商加盟" alt="招商加盟" width="1920" height="242" border="0" vspace="0" style="width: 1920px; height: 242px;"/></a></p>
</div>
<div class="nei4">
  <div class="container">
    <div class="nei2tit"> 新闻中心 </div>
    <div class="nei4tit">
      <p style="text-align: center;"><img src="/static/picture/1506308104769709_1.png" title="1506308104769709.png" alt="newstit.png"/></p>
    </div>
    <ul class="news_listN4 clearfix">
	
	<?php  $_result=M("Article")->field("id,catid,url,title,title_style,keywords,description,thumb,createtime")->where("catid in (86,87,88) and lang=1 AND status=1 ")->order("updatetime desc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li class="clearfix"> <a href="<?php echo ($r["url"]); ?>" class="fl newsImg"><img src="<?php if($r['thumb']) echo $r['thumb']; else echo '/static/picture/nopic.jpg'; ?>" width="150" height="150"/></a>
        <div class="fl"> <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>"> <?php echo (substr($r["title"],0,36)); ?> </a> <span> <?php echo (todate($r["createtime"],'Y-m-d')); ?></span> <a href="<?php echo ($r["url"]); ?>" class="newsMore"> </a> </div>
      </li><?php endforeach; endif;?>  
	  
	  
      
    </ul>
    <div class="nei2tit"> 关于我们 </div>
    <div class="nei4Con clearfix">
      <div class="nei4left fl">
        <p><img src="/static/picture/1567477031543944_1.jpg" title="智能电气" alt="智能电气" width="522" height="298" style="width: 522px; height: 298px;" border="0" vspace="0"/></p>
      </div>
      <div class="fr guanyu">
        <p style="line-height: 2em; text-indent: 2em;"><span style="vertical-align:middle;font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; line-height: 1.75em; text-indent: 2em; font-size: 20px; color: rgb(0, 0, 0);">TOSEE&nbsp; 特西德</span><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; line-height: 1.75em; text-indent: 2em;">&nbsp; &nbsp; &nbsp; &nbsp;<a href="/about/contact.html" target="_self"><img src="/static/picture/1506309706171438_1.png" title="1506309706171438.png" alt="a.png"/></a>&nbsp;</span></p>
        <p style="line-height: 2em;">&nbsp;<span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;深圳市特西智能电气有限公司是一家专注于物联网智慧安全用电，集产品研发、设计、制造、智慧安全用电管理系统云平台建设、销售为一体的高新技术企业。</span></p>
        <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;公司基于物联网时代的到来，国家智能电网的发展和节能减排需要，五年磨一剑，研发了国内首款符合国家3C标准、集智慧安全、遥控大数据为一体的机械双金+电子双重保护智慧断路器，并通过了国家3C认证，欧盟的CE认证、深圳市计量质量检测院等认证、国家公安部检测中心智慧电气安全预警系统认证等。而且取得了发明专利、实用新型专利、软件著作权、国家知识产权管理体系等60多项专利和证书。并为用户承保了1000万的产品责任险。</span></p>
        <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;特西智能是深圳市电气安全物联网协会的发起人之一，且公司有与多个高等院校开展产学研究合作，通过优势互补，达到互利共赢，校企双方联合建立“产、学、研”合作平台，如：与贵阳理工学院共建国内首个“电力大数据实验室”和“电力跨界应用实验室”。</span></p>
        <p style="line-height: 2em;"><span style="font-size: 14px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;特西电气安全用电系列产品广泛应用于住宅、写字楼、校园、学校、银行、医院、油站、酒店等多个领域，从而达到用电安全与管理的智能化。</span></p>
        <p><span style="font-size: 14px;"></span><br/>
        </p>
      </div>
    </div>
    <div class="clearfix" style="margin-top:20px;">
      <div class="fl bigshu">
        <p><strong><span style="color: rgb(0, 0, 0); font-size: 20px;">智控、安全、大数据</span></strong></p>
        <p><span style="font-size: 12px; color: rgb(0, 0, 0);">远程控制，9大安全防护，提供用电侧能耗数据监测分析</span></p>
      </div>
      <div class="fr jianrong">
        <p><span style="font-size: 20px;"><strong><span style="color: rgb(0, 0, 0);">简单、开放、兼容</span></strong></span></p>
        <p><span style="font-size: 12px; color: rgb(0, 0, 0);">开放的标准化平台，扩充整合容易，系统与未来多数科技产品相容</span></p>
      </div>
    </div>
    <div class="f_link"> 
	
	 <?php  $_result=M("Link")->field("*")->where(" status = 1  and lang=1")->order("listorder desc,id desc")->limit("100")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><a href='<?php echo ($r["siteurl"]); ?>' target='_blank' rel="nofollow" ><?php echo ($r["name"]); ?></a><?php endforeach; endif;?>
	   
	   </div>
  </div>
</div>
 
 
<style>
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
</div>
  
<!--底部JS加载区域-->
<script type="text/javascript" src="/static/js/common_1.js"></script>
<script type="text/javascript" src="/static/js/message_1.js"></script>
<script>
    bb1(); //首页banner切换
    </script>
</body></html>





<!--在线客服-->
<link rel="stylesheet" href="/static/kefu/qqkf.css" type="text/css"/>
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
</div>
<!-----foot end------->