<?php
/**
 *
 *  分享地址：  /index.php?g=App&m=Article&a=show&id=1 (新闻)
 *  下载地址： /appapk/  下面 
 *	Maxhom 系统app通用接口地址
 *	author: dengweicai （1519287158）
 *  date: 2014-08-13
 */
if (! defined ( "Maxhom" ))
	exit ( "Access Denied" );
class MaxhomAction extends AppAction {
	public function index() {
		exit ();
	}
	function _initialize() {
		parent::_initialize ();
		// 获取模型id
		// $this->moduleid=$this->mod['Feedback'];
		// $fields = F($this->moduleid.'_Field');
		
		$this->cartdao = M ( 'Cart' );
	}
	/**
	 * 删除信息基础类
	 * 传入需要删除的ids,模型名称
	 */
	function baseDelete($params) {
	    $ids = $params ['ids'];
	    notEmpty($ids, "ids");
	    $module = $params ['module'];
	    $condition = array (
	        'id' => array (
	            'in',
	            explode ( ',', $ids )
	        )
	    );
	    $module = ($module == '') ? "Article" : $module;
	    $data = M ( $module )->where ( $condition )->delete ();
	    // 删除订单信息，需要同时删除订单辅助表信息
	
	    if ($module == 'Order') {
	        $datacondition = array (
	            'order_id' => array (
	                'in',
	                explode ( ',', $ids )
	            )
	        );
	        M ( 'Order_data' )->where ( $datacondition )->delete ();
	    }
	
	    if ($data) {
	        success ();
	    } else {
	        $p ['info'] ['result'] = false;
	        $p ['info'] ['errorCode'] = 00017;
	        $p ['info'] ['msg'] = '删除失败';
	        echo jsontext ( $p );
	        exit ();
	    }
	}
	public $member_table = "User"; // 如果换其他的表的话，请将字段设置一样的情况下面去改变表的名称
	function baseLogin($params) {
		$username = $params ['username'];
		$pw = $password = $params ['password'];
		
		if (empty ( $username ) || empty ( $password )) {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 10003;
			$p ['info'] ['msg'] = '用户名或者密码为空';
			echo jsontext ( $p );
			exit ();
		}
		
		$this->dao = M ( $this->member_table );
		
		$authInfo = $this->dao->where ( "tel='$username'" . " or username='$username'" )->find ();
//		var_dump($authInfo);die;
		
		// 使用用户名、密码和状态的方式进行认证
		
		if (empty ( $authInfo )) {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 10004;
			$p ['info'] ['msg'] = '用户名不存在'; // '用户名不存在';
			echo jsontext ( $p );
			exit ();
		} else {

			if ($authInfo ['password'] != sysmd5 ( $pw )) {
				$p ['info'] ['result'] = false;
				$p ['info'] ['errorCode'] = 10005;
				$p ['info'] ['msg'] = '登陆密码错误'; // '登陆密码错误';
				echo jsontext ( $p );
				exit ();
			}
			if ($authInfo ['status'] != 1) {
				$p ['info'] ['result'] = false;
				$p ['info'] ['errorCode'] = 10006;
				$p ['info'] ['msg'] = '该用户禁止登陆';
				echo jsontext ( $p );
				exit ();
			}
			
			// 保存登录信息
			$dao = M ( 'User' );
			$data = array ();
			$userid = $authInfo ['id'];
			$data ['id'] = $userid;
			$data ['distance'] = 500;
			$data ['last_logintime'] = time ();
			$data ['last_ip'] = get_client_ip ();
			$data ['login_count'] = array (
					'exp',
					'login_count+1' 
			);
			$dao->save ( $data );
			
			// 登录的时候更新
			/*$tokendata ["os"] = $params ['os'];
			$tokendata ["token"] = $params ['token'];
			if ($tokendata) {
				$ret = M ( $this->member_table )->where ( "id=$userid" )->data ( $tokendata )->save ();
			}*/
			
			$p ['info'] ['result'] = true;
			$p ['info'] ['errorCode'] = 10000;
			$p ['info'] ['msg'] = '登陆成功';
			$p ['data'] ['userid'] = $authInfo ['id'];
			$p ['data'] ['groupid'] = $authInfo ['groupid'];
			$p ['data'] ['username'] = $authInfo ['username'];
			$p ['data'] ['avatar'] = $authInfo ['avatar'];
			$p ['data'] ['nickname'] = $authInfo ['nickname'];
			$p ['data'] ['recommendcode'] = $authInfo ['recommendcode'];
			$p ['data'] ['ispay'] = $authInfo ['ispay'];
			$p ['data'] ['paymoney'] =$this->Config['paymoney'];
			
			$p ['data'] = dealImgUrl ( $p ['data'] );
			echo jsontext ( $p );
			exit ();
		}
	}
	
	/**
	 * 获取用户信息
	 * 
	 * @param        	
	 *
	 */
	function getBaseUserInfo($params) {
		$userid = get_safe_replace ( $params ['userid'] );
		$field = $params ['field'];
		isIdError ( $userid );
		isHasUser ( $userid );
		$field = getField ( $field );
		$p ['data'] = M ( $this->member_table )->field ( $field )->where ( "id = '$userid'" )->find ();
		noData ( $p ['data'] );
		
		$p ['data'] = dealImgUrl ( $p ['data'] );
		success ( $p );
	}
	
	/**
	 * 增加数据基础方法
	 */
	function baseInsert($data) {
		
		$module = $data ['module'];
		$createtime=$data['createtime'];
		if(empty($createtime)){
		  $data ['createtime'] = time ();
		}
		
		$data ['updatetime'] = time ();
		$status = $data ['status'];
		if($status!=3){
			$data ['status'] = 1;
		}
		
		if ($status == 2) {
			$data ['status'] = 0;
		}
		
		$data ['lang'] = 1;
		
		$id = M ( $module )->data ( $data )->add ();
		if ($id) {
			$p["id"]=$id;
			success ($p);
		} else {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 12006;
			$p ['info'] ['msg'] = '失败';
			echo jsontext ( $p );
			exit ();
		}
	}
	
	/**
	 * 修改数据基础方法
	 */
	function baseUpdate($params) {
		//是否显示成功信息，默认都显示
		$isShowSuccess=$params['isShowSuccess'];
		$id = $params ['id'];
		notEmpty ( $id, "id" );
		$module = $params ['module'];
		isHasModuleInfo ( $module, $id );
		$data = $params;
		$data ['updatetime'] = time ();
		$data ['lang'] = 1;
		$data ['status'] = 1;
		
		$module = ($module == '') ? 'Article' : $module;
		
		$ret = M ( $module )->where ( "id=$id" )->data ( $data )->save ();
		
		if ($ret) {
			//若是为空，这显示成功信息，并终止运行
			if(empty($isShowSuccess)){
				success ();
			}
			
		} else {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 00015;
			$p ['info'] ['msg'] = '修改失败';
			echo jsontext ( $p );
			exit ();
		}
	}
	
	/**
	 * 用户注册
	 * 
	 * @param        	
	 *
	 */
	function baseReg($params) {
		$username = $params ['username'];
		$userpassword = $params ['password'];
		$email = $params ['email'];
		$sex = $params ['sex'];
		$tel = $params ['tel'];
		
		$data ['username'] = $username;
		$data ['password'] = sysmd5 ( $userpassword );
		$sex = $sex ? $sex : 1;
		$data ['sex'] = $sex;
		$data ['address'] = $params ['address'] ? $params['address'] : '';
		$data ['tel'] = $tel ? $tel : '';
		$data ['score'] = 0;
		$data ['groupid'] = 3;
		$data ['createtime'] = time ();
		$data ['updatetime'] = time ();
		$data ['reg_ip'] = get_client_ip ();
		$data ['status'] = 1; // 注册是否需要审核 这里默认是审核通过，如果需要审核，这里修改为 0
		$data ['nickname'] = rand_string ( 5, 1 );
		$data ['email'] = $email ? $email : '';
		$data ['orecommendcode'] = $params['orecommendcode'];
		
		$data ['avatar'] = $this->defaultAvatar;
		// 父级id 子账号功能需要
		$parentid = $params ['parentid'];
		$type = $params ['type'];
		if ($type == 2) {
			notEmpty ( $parentid, "parentid" );
		}
		if ($parentid > - 1) {
			$parent = isHasUser ( $parentid );
			$data ['parentid'] = $parentid;
		}
		
		if (! empty ( $username )) {
			$userNum = M ( $this->member_table )->where ( "username = '$username'" )->count ();
		}
		
		if (! empty ( $tel )) {
			$telNum = M ( $this->member_table )->where ( "tel='$tel'" )->count ();
		}
		
		// 是否有相同的在里面
		if ($userNum > 0) {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 10002;
			$p ['info'] ['username'] = $username;
			$p ['info'] ['msg'] = '用户名已经存在';
			echo jsontext ( $p );
			exit;
		}
		
		if ($telNum > 0) {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 10002;
			$p ['info'] ['username'] = $telNum;
			$p ['info'] ['msg'] = '手机号码已经存在';
			echo jsontext ( $p );
			exit;
		} 
		
	
			$ret = M ( $this->member_table )->data ( $data )->add ();
			if ($ret) {
				$p ['info'] ['result'] = true;
				$p ['info'] ['errorCode'] = 10000;
				$p ['info'] ['msg'] = '注册成功';
				$p ['data'] ['userid'] = $ret;
				$p ['data'] ['username'] = $username;
				$p ['data'] ['nickname'] = $data ['nickname']; // 这里可以需要修改下，根据需要修改
				$p ['data'] ['avatar'] = $data ['avatar'];
				$p ['data'] = dealImgUrl ( $p ['data'] );
				$p ['data'] ['paymoney'] =$this->Config['paymoney'];
				success($p);
			} else {
				$p ['info'] ['result'] = false;
				$p ['info'] ['errorCode'] = 10015;
				$p ['info'] ['msg'] = '注册失败';
				echo jsontext ( $p );
				exit;
			}
		
		
		
	}
	
	/**
	 * 获取单页模型详情
	 */
	function getBasePageDateils($params) {
		$id = intval ( $params ['id'] );
		$field = $params ['field'];
		$field = ($field == '') ? "*" : $field;
		$p ['data'] = M ( 'Page' )->field ( $field )->where ( "id=$id" )->find ();
		if (empty ( $p )) {
			$p ['info'] ['result'] = false;
			$p ['info'] ['errorCode'] = 00014;
			$p ['info'] ['msg'] = '没有数据';
			echo jsontext ( $p );
			exit ();
		} else {
			$p ['data'] = dealImgUrl ( $p ['data'] );
			$p ['info'] ['result'] = true;
			$p ['info'] ['errorCode'] = 10000;
			$p ['info'] ['msg'] = '成功';
			
			echo jsontext ( $p );
		}
	}
	
	/**
	 * 获取列表基础方法
	 * $params $isShowCat=1 表示要验证catid, 其他情况不验证，默认验证
	 */
	public function getBaseList($params) {
		// 默认都显示，1为不显示
		$isShowPage = $params ['isShowPage'];
		
		// 排序
		$sorttype=$params['sorttype'];
		if($sorttype==1){
			$sort= 'desc';
		}
		if($sorttype==2){
			$sort = 'asc';
		}
		$areaid=$params['areaid'];
		$module = $params ['module'];
		if(!empty($areaid)&&$module=='Parttimejobs'){
			
			$areaList=M('area')->where('parentid='.$areaid)->select();
			
			foreach ($areaList as $key=>$value){
				$id=$value['id'];
				$areaListChild=M('area')->where('parentid='.$id)->select();
				if(!empty($areaListChild)){
					foreach ($areaListChild as $key1=>$value1){
						$id1=$value1['id'];
						$areaids.=$id1.",";
					}
				}
				$areaids.=$id.",";
			}
			
			$areaids.=$areaid.",-1";
			
			$params ['where']="areaid in ( ".$areaids." )";
		}
	    
		$where = $params ['where'];
		
		$where = getWhere ( $where );
		$table = $params ['table'];
		if(!empty($table)){
			$order = getOrder ( $order );
		}
		$order = $params ['order'];	
		
		
		$cat_id = $params ['catid'];
		
		$pagesize = $params ['pagesize'];
		$shopid = $params ['shopid'];
		$page = $params ['p'];
		$user_id = $params ['user_id'];
		
		// 是否包含子分类的 文章 默认为不包含 1 包含
		$cat_list = $params ['cat_list'];
		// 是否必须含有图片 默认不包含图片 1包含
		$is_picture = $params ['is_picture'];
		$recommend_id = $params ['recommendid'];
		
		if (! empty ( $params ['map'] )) {
			$map = $params ['map'];
		}
		$field = $params ['field'];
		// 商品id 用于通过商品id获取分类id，获取关联商品使用
		$goodid = $params ['goodid'];
		if (! empty ( $goodid )) {
			$product = M ( 'product' )->where ( "id=$goodid" )->find ();
			$cat_id = $product ['catid'];
		}
		
		// 是否使用catid获取栏目名字,默认需要.获取用户相关信息的时候不需要
		$isShowCat = $params ['isShowCat'];
		$isShowCat = ($isShowCat == '') ? 1 : $isShowCat; // 0 为不包含 1 包含
		if ($isShowCat == 1) {
			
			// 根据catid 获取模型名称
			notEmpty ( $cat_id, "catid" );
			$cat = $this->categorys [$cat_id];
			$module = $cat ['module'];
			$page = empty ( $page ) ? 1 : $page;
			
			$cat_list = ($cat_list == '') ? 1 : $cat_list; // 0 为不包含 1 包含
			$is_picture = ($is_picture == '') ? 0 : $is_picture;
			
			$catname = M ( 'category' )->where ( "id=$cat_id" )->find ();
			notEmpty ( $catname, '请求栏目' );
			$p ['category'] ['catname'] = $catname ['catname'];
			$p ['category'] ['cat_id'] = $cat_id;
			// 栏目ID，包括子栏目ID列表
			$arrid = $catname ['arrchildid'];
			
			// $cat_list==1 包含子栏目文章
			$tcatid = ($cat_list == 1) ? $arrid : $cat_id;
			
			$where .= " and catid in (" . $tcatid . ")";
			
			if ($is_picture == 1) {
				$where .= " and thumb != '' ";
			}
		}
		
		if (! empty ( $user_id )) {
			$where .= " and userid = $user_id ";
		}
		
	     $keyword=$params ['keyword'];
		if ($keyword) {
				
			if (strstr ( $keyword, 'or' )) {
				$keydo = ' or ';
				$keyword_arr = explode ( 'or', $keyword );
			} elseif (strstr ( $keyword, ' ' )) {
				$keydo = ' AND ';
				$keyword_arr = explode ( ' ', $keyword );
			}
				
			if (count ( $keyword_arr ) > 1) {
				foreach ( $keyword_arr as $key => $keywordz ) {
					$keyword_arr [$key] = ' title like "%' . trim ( $keywordz ) . '%" ';
				}
				$where .= ' AND (' . implode ( $keydo, $keyword_arr ) . ')';
			} else {
				$where .= ' AND title like "%' . $keyword . '%" ';
			}
		}
		
		// 是否显示距离
		$isShowJuLi = $params ['isShowJuLi'];
		if ($isShowJuLi == true) {
			// 经度，纬度，计算距离
			$lat = $params ['lat'];
			$lng = $params ['lng'];
			notEmpty ( $lat, "lat经度" );
			notEmpty ( $lat, "lng纬度" );
			$around = $params ['juli'];
			if ($around) {
				$around = $around / 1000;
			} else {
				$around = 0.5;
			}
			
			$range = 180 / pi () * $around / 6372.797; // 里面的 1 就代表搜索 1km 之内，单位km
			$temp = abs ( cos ( $lat * pi () / 180 ) );
			$lngR = $range / $temp;
			
			$maxLat = $lat + $range; // 最大纬度
			$minLat = $lat - $range; // 最小纬度
			$maxLng = $lng + $lngR; // 最大经度
			$minLng = $lng - $lngR; // 最小经度
			
		   $islimitDistance = $params['islimitDistance'];
			if ($islimitDistance != 1) {
			
				$map['lng'] = array('between', array($minLng, $maxLng));
				//经度值
				$map['lat'] = array('between', array($minLat, $maxLat));
				//纬度值

			}
			
			                                                       
			// $shops = M ( $module )->query("select". $field.",(2 * 6378.137* ASIN(SQRT(POW(SIN(3.1415926535898*(".$lat."-lat)/360),2)+COS(3.1415926535898*".$lat."/180)* COS(lat * 3.1415926535898/180)*POW(SIN(3.1415926535898*(".$lng."-lng)/360),2))))*1000 as juli from `wifi_shop`
			                                                       // where shoplevel like '%".$type."%' and province = '".$_SESSION['shop']['province']."' and city = '".$_SESSION['shop']['city']."' order by juli asc limit ".$Page->firstRow.",".$Page->listRows);
			$field .= "," . $juli = "round((2 * 6378.137* ASIN(SQRT(POW(SIN(3.1415926535898*(" . $lat . "-lat)/360),2)+COS(3.1415926535898*" . $lat . "/180)* COS(lat * 3.1415926535898/180)*POW(SIN(3.1415926535898*(" . $lng . "-lng)/360),2))))*1000) as distance";
		}
		if($module=='survey'||$module=='Survey'){
			$map ['endDate'] =array("EGT",time());
		}
		
		$map ['_string'] = $where;
		
		
	
	
		$count = M ( $module )->where ( $map )->table ( $table )->field ( $field )->count ();
	   if(empty($recommend_id)){
		if ($count) {
			import ( "@.ORG.Page" );
			$listRows = ($pagesize != '') ? $pagesize : C ( 'PAGE_LISTROWS' );
			$maxpagecount = ceil ( $count / $listRows );
			if ($page > $maxpagecount) {
				noPage ();
			}
			
			$page = new Page ( $count, $listRows );
			$page->urlrule = geturl ( $cat, '' );
			$pages = $page->show ();
			
			// 默认都显示，1为不显示
			if ($isShowPage != 1) {
				$p ['pageinfo'] = $page;
			}
			
			if (empty ( $sort )) {
				
				
			
				if(!empty ( $table )){
					$p [$module . '_list'] = M ( $module )->field ( $field )->table ( $table )->where ( $map )->order ( $order )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
				}else{
					$p [$module . '_list'] = M ( $module )->field ( $field )->table ( $table )->where ( $map )->order ( 'listorder desc,id desc' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
				}
			} else {
				//自定义排序
				$selforder=$params['selforder'];
				
				if(empty($selforder)){
					$p [$module . '_list'] = M ( $module )->field ( $field )->table ( $table )->where ( $map )->order ( "`" . $order . "` " . $sort )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
				}else{
					
					$p [$module . '_list'] = M ( $module )->field ( $field )->table ( $table )->where ( $map )->order ( $selforder )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
				}
				
				
			}
			
			
		
			
			$p [$module . '_list'] = dealImgUrlList ( $p [$module . '_list'] );
		} else {
			
			noData($p [$module . '_list']);
			 
		}
	   }
		// --------------------------
		// 推荐信息
		
	 
		if ($recommend_id) {
			$p [$module . '_list'] = array ();
			$twhere = $where . " and pos LIKE ('%" . $recommend_id . "%')";
			
			$count = M ( $module )->where ( $twhere )->count ();
			
			if ($count) {
				import ( "@.ORG.Page" );
				$listRows = ($pagesize != '') ? $pagesize : C ( 'PAGE_LISTROWS' );
				$maxpagecount = ceil ( $count / $listRows );
				
		
				if ($page > $maxpagecount) {
					noPage ();
				}
				$page = new Page ( $count, $listRows );
				$page->urlrule = geturl ( $cat, '' );
				$pages = $page->show ();
				$p ['pageinfo'] = $page;
			
				$p [$module . 'size'] = 0;
				$p ['recommend_list'] = M ( $module )->field ( $field )->where ( $twhere )->order ( "`" . $order . "` " . $sort )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
				if ($p ['recommend_list']) {
					$p ['recommend_list'] = dealImgUrlList ( $p ['recommend_list'] );
					$p ['recommend_listsize'] = count ( $p ['recommend_list'] );
				}
			} else {
				noData($p ['recommend_list']);
				
			}
		}
		
		// -------------------------
		$isReturn = $params ['isReturn'];
		if(empty($isReturn)){
			success ( $p );
		}else{
			return $p;
		}
		
	}
	
	/**
	 * 获取详情基础方法
	 */
	function getBaseDetails($params) {
		// 文章id
		
		
		// 显示的字段列表
		$field = $params ['field'];
		$field = getField ( $field );
		
		// 获取模型名称，默认文章类型
		$module = $params ['module'];
		$table=$params ['table'];
		
		$module = ($module == '') ? 'Article' : $module;
		
		$where = $params ['where'];
		$id = intval ( $params ['id'] );
		if (empty ( $where )) {
			
			notEmpty ( $id, "id" );
			isIdError ( $id );
			$where = " id=$id and status=1 ";
		}
		
		// 是否显示距离
		$isShowJuLi = $params ['isShowJuLi'];
		if ($isShowJuLi == true) {
			// 经度，纬度，计算距离
			$lat = $params ['lat'];
			$lng = $params ['lng'];
			notEmpty ( $lat, "lat经度" );
			notEmpty ( $lat, "lng纬度" );
			$around = $params ['juli'];
			if ($around) {
				$around = $around / 1000;
			} else {
				$around = 0.5;
			}
			
			$range = 180 / pi () * $around / 6372.797; // 里面的 1 就代表搜索 1km 之内，单位km
			$temp = abs ( cos ( $lat * pi () / 180 ) );
			$lngR = $range / $temp;
			
			$maxLat = $lat + $range; // 最大纬度
			$minLat = $lat - $range; // 最小纬度
			$maxLng = $lng + $lngR; // 最大经度
			$minLng = $lng - $lngR; // 最小经度
			                        
			// 是否对距离进行限制 默认不限制
			$islimitDistance = $params ['islimitDistance'];
			if ($islimitDistance != 1) {
				$map ['lng'] = array (
						'between',
						array (
								$minLng,
								$maxLng 
						) 
				); // 经度值
				$map ['lat'] = array (
						'between',
						array (
								$minLat,
								$maxLat 
						) 
				); // 纬度值
			}
			
			// $shops = M ( $module )->query("select". $field.",(2 * 6378.137* ASIN(SQRT(POW(SIN(3.1415926535898*(".$lat."-lat)/360),2)+COS(3.1415926535898*".$lat."/180)* COS(lat * 3.1415926535898/180)*POW(SIN(3.1415926535898*(".$lng."-lng)/360),2))))*1000) as juli from `wifi_shop`
			// where shoplevel like '%".$type."%' and province = '".$_SESSION['shop']['province']."' and city = '".$_SESSION['shop']['city']."' order by juli asc limit ".$Page->firstRow.",".$Page->listRows);
			$field .= "," . $juli = "round((2 * 6378.137* ASIN(SQRT(POW(SIN(3.1415926535898*(" . $lat . "-lat)/360),2)+COS(3.1415926535898*" . $lat . "/180)* COS(lat * 3.1415926535898/180)*POW(SIN(3.1415926535898*(" . $lng . "-lng)/360),2))))) as distance";
		}
		$map ['_string'] = $where;
		
		$p ['data'] = M ( $module )->table($table)->where ( $map )->field ( $field )->find ();
		noData ( $p ['data'] );
		
		
		//通過字段类型进行图片处理
		if($this->mod[$module]){
			$this->moduleid = $this->mod[$module];
			if($this->moduleid){
				$p ['data']=dealImgUtlByField($module,$p ['data'],$this->moduleid );
			}
		}
		
		
		// 统一处理图片地址
		$p ['data'] = dealImgUrl ( $p ['data'] );
		
		// 增加文章游览量
		M ( $module )->where ( "id =$id" )->setInc ( 'hits', 1 );
		
		// 是否显示某个商品评论总数
		$isShowGoodReviewNum = $params ['isShowGoodReviewNum'];
		if ($isShowGoodReviewNum == true) {
			$goodReviewNum = M ( 'goodreview' )->where ( "articleid=$id" )->count ();
		}
		$isReturn = $params ['isReturn'];
		
		if(empty($isReturn)){
			
			
			
			success ( $p );
		}else{
			return $p;
		}
		
	}
	
	/**
	 * 修改用户信息基础方法
	 */
	function modyMemberInfo($params) {
		$userid = $params ['userid'];
		isIdError ( $userid );
		$data = $params;
		$user = isHasUser ( $userid );
		
		$ret = M ( $this->member_table )->where ( "id=$userid" )->data ( $data )->save ();
		if ($ret) {
			if (! empty ( $data ['nickname'] )) {
				$reviewdata ['username'] = $data ['nickname'];
			} else {
				$reviewdata ['username'] = $user ['nickname'];
			}
			
			M ( 'review' )->where ( "userid=$userid" )->setField ( $reviewdata );
			M ( 'user_canyu' )->where ( "userid=$userid" )->setField ( $reviewdata );
			M ( 'Article' )->where ( "userid=$userid" )->setField ( $reviewdata );
			success ();
		} else {
			success ();
		}
	}
	
	/**
	 * 获取幻灯片信息
	 */
	function getBaseSildeData($params) {
		$id = $params ['id'];
		notEmpty ( $id, "id" );
		$slide=M('Slide')->where("id=$id"." and status=1")->find();
		
		if(empty($slide)){
			$p ['bannerlist']=null;
			noData ( $p ['bannerlist'] );
		}
		$p ['bannerlist'] = M ( 'Slide_data' )->where ( "fid=$id"." and status=1" )->order ( "listorder asc,id asc" )->field ( "id,link,title,pic as thumb" )->select ();
		$p ['bannerlist'] = dealImgUrlList ( $p ['bannerlist'] );
		noData ( $p ['bannerlist'] );
		success ( $p );
	}
	
	function BasemodyPassword($params) {
		$userid = $params ['userid'];
		$old_password = $params ['oldpwd'];
		$new_password = $params ['newpwd'];
		isIdError ( $userid );
		notEmpty($userid, "userid");
		notEmpty($old_password, "oldpwd");
		notEmpty($new_password, "newpwd");
		if ($old_password == $new_password) {
			$p['info'] ['result'] = false;
			$p['info'] ['errorCode'] = 10020;
			$p['info'] ['msg'] = '新旧密码一样，无需修改';
			echo jsontext ( $p );
			exit ();
		}
		$this->dao = M ( $this->member_table );
		$map = array ();
		$map ['password'] = array (
				'eq',
				sysmd5 ( $old_password )
		);
		$map ['id'] = $userid;
		// 检查用户
		if (! $this->dao->where ( $map )->field ( 'id' )->find ()) {
			$p['info'] ['result'] = false;
			$p['info'] ['errorCode'] = 10021;
			$p['info'] ['msg'] = '旧密码错误';
			echo jsontext ( $p );
			exit ();
		} else {
			$this->dao->id = $userid;
			$this->dao->update_time = time ();
			$this->dao->password = sysmd5 ( $new_password );
			$r = $this->dao->save ();
			if ($r) {
				$p['info'] ['result'] = true;
				$p['info'] ['errorCode'] = 10000;
				$p['info'] ['msg'] = '修改成功';
				echo jsontext ( $p );
				exit ();
			} else {
				$p['info'] ['result'] = false;
				$p['info'] ['errorCode'] = 10016;
				$p['info'] ['msg'] = '修改失败';
				echo jsontext ( $p );
				exit ();
			}
		}
	}

	/**
	 *	生成并发送验证码
	 */
	function BaseidentifyCode($params){
		$isfindPw = $params["isfindPw"];
		$telNum = $params["telNum"];
		if ($isfindPw != 1) {
			$num = M ( $this->member_table )->where ( " tel='$telNum'" )->count ();

			// 是否有相同的在里面
			if ($num > 0) {
				$p ['info'] ['result'] = false;
				$p ['info'] ['errorCode'] = 12005;
				$p ['info'] ['username'] = $telNum;
				$p ['info'] ['msg'] = '用户名或者手机号码已经存在';
				echo jsontext ( $p );
				exit ();
			}
		}

		$randNum = randomkeys ( 4 );

		$codeNum = $this->Config ['codeNum'];

		// 判断是否已经发送
		$yzcodeInfo = M ( 'yzcode' )->where ( "telphone=$telNum" )->find ();
		$updateDate = getdate ( $yzcodeInfo ['updatetime'] );
		$currenDate = getdate ( time () );

		if (! empty ( $yzcodeInfo )) {

			$num = $yzcodeInfo ['num'];
			$id = $yzcodeInfo ['id'];

			// 判断时间是否是当天
			if ($currenDate ['mday'] - $updateDate ['mday'] == 0) {

//				if ($codeNum > $num) {
				$yadata ['num'] = $num + 1;
				$yadata ['code'] = $randNum;
				$yadata ['updatetime'] = time ();
				$yadata ['validity'] = time() + (30*60);
				M ( 'yzcode' )->where ( "id=$id" )->data ( $yadata )->save ();
				/*} else {

					$p ['info'] ['result'] = false;
					$p ['info'] ['errorCode'] = 12001;
					$p ['info'] ['msg'] = '今天验证次数已满';
					echo jsontext ( $p );
					exit ();
				}*/
			} 			// 不是当天
			else {

				$yadata ['num'] = 0;
				$yadata ['code'] = $randNum;
				$yadata ['updatetime'] = time ();
				$yadata ['validity'] = time() + (30*60);
				M ( 'yzcode' )->where ( "id=$id" )->data ( $yadata )->save ();
			}
		} else {
			$yadata ['telphone'] = $telNum;
			$yadata ['code'] = $randNum;
			$yadata ['status'] = 1;
			$yadata ['lang'] = 1;
			$yadata ['num'] = 1;
			$yadata ['createtime'] = $yadata ['updatetime'] = time ();
			$yadata ['validity'] = time() + (30*60);
			M ( 'yzcode' )->data ( $yadata )->add ();
		}

		 sendsms($telNum,$randNum);
 

		if ($telNum) {
			$p ['yzcode'] = $randNum;
			success ( $p );
		}
	}
}
?>
