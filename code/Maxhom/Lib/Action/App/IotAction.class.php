<?php
/**
 * 
 *Maxhom  app的其他接口
 *  
 */
if(!defined("Maxhom")) exit("Access Denied");
class IotAction extends MaxhomAction
{

	
    //下面是其他的接口  上面是通用的接口
 	
	/**
	 * 获取用户设备列表
	 *
	 * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=getUserDeviceList&userid=1&type=1
	 * @param id $userid 用户id
	 *   @param type  1插座  2开关(默认插座)
	 * @return 获取用户设备列表 info[result：true 成功，false 失败]
	 */
	function getUserDeviceList(){
		$userid =  $this->_request("userid");
		$type =  $this->_request("type");
		$type=($type<=1)?1:$type;
	
	    $p['devicelist'] = M('wifi_iot')->field("*")->where("userid=".$userid." and type=$type")->order("id desc")->limit(100)->select();
	 
	   if(count($p['devicelist'])){
			success($p);
		}else{
			fail('设备为空');
		}
	}
	
	/**
	 * 删除设备
	 *
	 * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=delDevice&id=1
	 * @param id $deviceid
	 *        	设备id
	 * @return 删除设备 info[result：true 成功，false 失败]
	 */
	function delDevice(){ 
		$deviceid =  $this->_request("id"); 
	    M('wifi_iot')->where("id=".$deviceid)->delete();
	   
		success($p);
	}
	
	/**
	 * 添加用户设备
	 *
	 * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=addDevice&device_mac=1213&userid=1&title=miniwifi&type=1
	 * @param str $userid
	 *        	用户id
	 * @param int $device_mac
	 *        	设备device_mac
	 * @param str $title
	 *        	设备名称
	   *   @param type  1插座  2开关(默认插座)
	 * @return 添加用户设备 info[result：true 成功，false 添加失败]
	 */
	function addDevice(){
		$data['userid'] = $userid =  $this->_request("userid");        
		isHasUser($userid);
		$device_mac= $this->_request("device_mac");
		notEmpty($device_mac, "device_mac");		
		$data['device_mac'] = $device_mac = str_replace(":","",$device_mac);       
		$data['title'] = $title= $this->_request("title");		 
		notEmpty($title, "title");			
		$type= $this->_request("type");	
		$data['type'] = $type=($type<=1)?1:$type;
		
		$num =  M("wifi_iot")->where("userid=".$userid." and device_mac='".$device_mac."'")->count();
		if($num<1){	  

			$data ['updatetime'] = time ();
			$data ['status'] = 1;
			$id = M ('wifi_iot')->data ( $data )->add ();
			$data ['id'] =$id;
			$devicelist['devicelist'][1]=$data; 
		 	success($devicelist);		  
		}else{
		    fail("设备已经存在");
		}
	}
	
	/**
     * 修改设备名称
     *
     * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=editDevice&id=5&title=123456
     * @param   str $id  设备id
     *
     * @param   str $title 设备名称
     *
     * @return   修改设备名称 info[result:true 成功,false 失败]
     */
    public function editDevice(){
        $id = $params['id'] = $this->_request('id');
        $params['title'] = $this->_request('title');
        M('wifi_iot')->where("id=$id")->data( $params)->save();
		$p['data'] = '名称修改成功';
		success($p);
    }
	
	/**
	 * 获取定时列表
	 *
	 * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=getUserTimerList&userid=1&device_mac=1212&fenlu=1
	 * @param id $userid 用户id
	 *   @param device_mac   设备mac地址
	 *   @param fenlu   设备分路
	 * @return 获取定时列表 info[result：true 成功，false 失败]
	 */
	function getUserTimerList(){
		$userid =  $this->_request("userid");
		$device_mac =  $this->_request("device_mac");
		$fenlu =  $this->_request("fenlu");
		 
	
	    $p['timerlist'] = M('wifi_iot_timer')->field("*")->where("userid=".$userid." and device_mac='$device_mac' and fenlu=$fenlu")->order("id desc")->limit(20)->select();
	 
	   if(count($p['timerlist'])){
			success($p);
		}else{
			fail('定时为空');
		}
	}
	/**
     * 添加定时
     *
     * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=addtimer&userid=5&device_mac=12345262&fenlu=1&zt=1&repeat=1&week=1&hour=2&min=3&timeid=1
     * @param   str $userid  用户id
	 * @param   str $device_mac  设备mac地址
     * @param   str $fenlu 分路
	 * @param   str $zt 状态开 1 关2
	 * @param   str $repeat 重复  1单次  2每周重复
	 * @param   str $week 星期
	 * @param   str $hour 小时
	 * @param   str $min 分钟
	 * @param   str $timeid 定时序号
     *
     * @return   修改设备名称 info[result:true 成功,false 失败]
     */
    public function addtimer(){
         $userid = $params['userid'] = $this->_request('userid');
		 $device_mac = $params['device_mac'] = $this->_request('device_mac');
		 $fenlu = $params['fenlu'] = $this->_request('fenlu');
		 $params['zt'] = $this->_request('zt');
		 
		 $params['repeat'] = $this->_request('repeat');
		 $params['week'] = $this->_request('week');
		 $params['hour'] = $this->_request('hour');
		 $params['timeid'] = $this->_request('timeid');
		 $params['close'] = $this->_request('close');
		 
		 $params['min'] = $this->_request('min');
		 
        M('wifi_iot_timer')->data( $params)->add();
		//找出所有定时
		$nweek = date("w");
		$nhour = date("H");
		$nmin = date("i");
		$tdata = array();
		$timerlist = M('wifi_iot_timer')->where("userid=$userid and device_mac='$device_mac' and fenlu=$fenlu")->select();
		foreach($timerlist as $key=>$rs){
			$tweek = $rs['week'];
			$hour = $rs['hour'];
			$min = $rs['min'];
			
			$cday = ($tweek+7-$nweek)%7;
			//$nowdate = date("Y-m-d ", time());
			//$catime = strtotime($nowdate);
			$tdata[$key]['dstime'] = ($cday*86400+$hour*3600+$min*60)-($nhour*3600+$nmin*60);
			$tdata[$key]['zt'] = $rs['zt'];
			$tdata[$key]['repeat'] = $rs['repeat'];
		}
		
		$p['timerlist'] = $tdata;
		success($p);
    }

 	/**
     * 修改定时
     *
     * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=modytimer&id=5&zt=1&repeat=1&week=1&hour=2&min=3
     * @param   str $userid  用户id
	 * @param   str $device_mac  设备mac地址
     * @param   str $fenlu 分路
	 * @param   str $zt 状态开 1 关2
	 * @param   str $repeat 重复  1单次  2每周重复
	 * @param   str $week 星期
	 * @param   str $hour 小时
	 * @param   str $min 分钟
     *
     * @return   修改定时 info[result:true 成功,false 失败]
     */
    public function modytimer(){
        
		 $id = $params['id'] = $this->_request('id');
		 $params['zt'] = $this->_request('zt');
		 
		 $params['repeat'] = $this->_request('repeat');
		 $params['week'] = $this->_request('week');
		 $params['hour'] = $this->_request('hour');
		  $params['timeid'] = $this->_request('timeid');
		 $params['close'] = $this->_request('close');
		 
		 $params['min'] = $this->_request('min');
		 
        M('wifi_iot_timer')->where("id=$id")->data( $params)->save();
		//找出所有定时
		$nweek = date("w");
		$nhour = date("H");
		$nmin = date("i");
		$tdata = array();
		$mydata = M('wifi_iot_timer')->where("id=$id")->select();
		$device_mac = $mydata[0]['device_mac'];
		$fenlu = $mydata[0]['fenlu'];
		$userid = $mydata[0]['userid'];
		$timerlist = M('wifi_iot_timer')->where("userid=$userid and device_mac='$device_mac' and fenlu=$fenlu")->select();
		foreach($timerlist as $key=>$rs){
			$tweek = $rs['week'];
			$hour = $rs['hour'];
			$min = $rs['min'];
			
			$cday = ($tweek+7-$nweek)%7;
			//$nowdate = date("Y-m-d ", time());
			//$catime = strtotime($nowdate);
			$tdata[$key]['dstime'] = ($cday*86400+$hour*3600+$min*60)-($nhour*3600+$nmin*60);
			$tdata[$key]['zt'] = $rs['zt'];
			$tdata[$key]['repeat'] = $rs['repeat'];
		}
		
		$p['timerlist'] = $tdata;
		success($p);
    }
	
	/**
	 * 删除定时
	 *
	 * @link http://manzhuji.maxhom.cn/index.php?g=App&m=Iot&a=delTimer&id=1
	 * @param id id
	 
	 * @return 删除定时 info[result：true 成功，false 失败]
	 */
	function delTimer(){
		$id =  $this->_request("id");
		 
	
	    $ret = $p['timerlist'] = M('wifi_iot_timer')->where("id=".$id." ")->delete();
	 
	   if($ret){
	   		$p['data'] = 'success';
			success($p);
		}else{
			fail('error');
		}
	}

}
?>
