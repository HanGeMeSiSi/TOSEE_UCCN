<?php

/**
 * 
 * Config(系统配置文件)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class ConfigAction extends AdminbaseAction {
	
	protected $dao, $config,$seo_config ,$user_config, $site_config, $mail_config, $attach_config;
    function _initialize()
    {	
		parent::_initialize();
		$this->dao = M('Config');
		$this->assign($this->Config);

    }
	public function index() {
	  
		$this->config = $config = $this->dao->select();

		foreach($config as $key=>$r) {
			if($r['groupid']==1)$this->user_config[$r['varname']]=$r;
			if($r['groupid']==2){
				if(APP_LANG){
					if($r['lang']==LANG_ID) $this->site_config[$r['varname']]=$r;
				}else{
					$this->site_config[$r['varname']]=$r;
				}
			}
		}
		//$this->assign('user_config',$this->user_config);
		$this->assign('site_config',$this->site_config);
		$this->display(); 
	}
	
	public function appIndex() {
		 
		$this->config = $config = $this->dao->select();
	
		foreach($config as $key=>$r) {
			if($r['groupid']==1)$this->user_config[$r['varname']]=$r;
			
		}
		$this->assign('user_config',$this->user_config);
		
		$this->display();
	}

	public function sys() {
		$sysconfig = F("sys.config");
		$Urlrule=array();
		foreach((array)$this->Urlrule as $key => $r){
			$urls=$r['showurlrule'].':::'.$r['listurlrule'];
			if(empty($r['ishtml']))$Urlrule[$urls]=L('URL_SHOW_URLRULE').":".$r['showexample'].", ".L('URL_LIST_URLRULE').":".$r['listexample'];
		}
		$this->assign('Urlrule',$Urlrule); 

		$this->assign('Lang',F('Lang')); 
		$this->assign('yesorno',array(0 => L('no'),1  => L('yes')));
		$this->assign('openarr',array(0 => L('close_select'),1  => L('open_select')));
		$this->assign('enablearr',array(0 => L('disable'),1  => L('enable')));
		$this->assign('urlmodelarr',array(0 => L('URL_MODEL0').'(m=module&a=action&id=1)',1  => L('URL_MODEL1').'(index.php/Index_index_id_1)',2 => L('URL_MODEL2').'(Index_index_id_1)'));
		$this->assign('readtypearr', array(0=>'readfile',1=> 'redirect'));
		$this->assign($sysconfig);
		$this->display();
	}
 
 
	public function add() {		 
		$this->display();
	}

	public function delete() {		
		
		$name = MODULE_NAME;
		$model = M ( $name );
		$id = $_REQUEST ['varname'];
		if (isset ( $id )) {
			if(false!==$model->where("varname='$id'")->delete()){
				if(in_array($name,$this->cache_model)) savecache($name);
				$this->success(L('delete_ok'));
			}else{
				$this->error(L('delete_error').': '.$model->getDbError());
			}
		}else{
			$this->error (L('do_empty'));
		}
		 
	}

	public function insert() {

		if(APP_LANG)$_POST['lang']=LANG_ID; 

		if (false === $this->dao->create ()) {
			$this->error ( $this->dao->getError () );
		}
		$list=$this->dao->add ();
		savecache('Config');
		if ($list!==false) {
			$this->success (L('add_ok'));
		}else{
			$this->error (L('add_error'));
		}
	}

	public function member() {
		
		if(APP_LANG)$where = ' and lang='.LANG_ID; 
		$config = $this->dao->where("groupid=3".$where)->select();
		$this->assign('member_config',$config);
		$this->display();
	}

	public function attach(){
		$this->display();
	}
	

	public function mail() {
		$this->display();
	}
 
 	public function dosite() {
		if(C('TOKEN_ON') && !$this->dao->autoCheckToken($_POST))$this->error (L('_TOKEN_ERROR_'));
	
		if(APP_LANG && (isset($_POST['site_name']) || isset($_POST['member_emailchecktpl'])))$where = ' and lang='.LANG_ID;
		foreach($_POST as $key=>$value){			
			$data['value']=$value;
			$f = $this->dao->where("varname='".$key."'".$where)->save($data);				 
		}
		$f = savecache(MODULE_NAME);
		if(isset($_POST['HOME_ISHTML']) && $_POST['HOME_ISHTML']=='')@unlink(__ROOT__.'index.html');
		if($_POST['DEFAULT_LANG'])routes_cache($_POST['URL_URLRULE']);

		if($f){
			$this->success(L('do_ok'));
		}else{
			$this->error (L('do_error'));
		}
	}

	public function testmail(){		

		$mailto = $_GET['mail_to'];
		$message = 'maxhom test mail';
		
		$r = sendmail($mailto,$this->Config['site_name'],$message,$_POST); 
		
		if($r==true){
			$this->ajaxReturn($r,L('mailsed_ok'),1);
		}else{
			$this->ajaxReturn(0,L('mailsed_error').$r,1);
		}
	}
	function uploadAPP() {
	
		
		import ( "@.ORG.UploadFile" );
	
		$upload = new UploadFile();// 实例化上传类
	
	
		$upload->maxSize  = 31457286 ;// 设置附件上传大小
		$upload->allowExts  = array('apk');// 设置附件上传类型
		$upload->savePath =  './download/';// 设置附件上传目录
		$upload->uploadReplace=true;
		//$upload->savename="FreeStore.apk";
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功
			//
			$uploadList=$upload->getUploadFileInfo();
			$name=$uploadList[0]['name'];
			if($name=="youzhuan.apk"){
				$this->success('上传成功！');
			}else{
				$this->error("上传失败，文件名【".$name."】错误，必须为：youzhuan.apk");
			}
				
		}
	}
}
?>