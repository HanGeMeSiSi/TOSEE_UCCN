<?php
/**
 * 
 * Empty (空模块)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2011-03-01 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class EmptyAction extends AppAction
{	
	public function _empty()
	{ 
		//空操作 空模块
		if(MODULE_NAME!='Urlrule'){
			$Mod = F('Mod');			
			 
			if(!$Mod[MODULE_NAME]){ 
				throw_exception('404');
			}
		}

		$a=ACTION_NAME;
		$id =  intval($_REQUEST['id']);
		$catid = intval($_REQUEST['catid']);
		$moduleid =  intval($_REQUEST['moduleid']);
		if(MODULE_NAME=='Urlrule'){
			if(APP_LANG){
				$l =get_safe_replace($_REQUEST['l']);
				$lang= $l ? '_'.$l : '_'.C('DEFAULT_LANG');
			}
			$catdir =get_safe_replace($_REQUEST['catdir']);
			if($catdir){
				$Cat = F('Cat'.$lang);
				$catid = $catid ? $catid : $Cat[$catdir];
				unset($Cat);
			}
			if($_REQUEST['module']){
				$m=get_safe_replace($_REQUEST['module']);						
			}elseif($moduleid){
				$Module =F('Module');
				$m=$Module[$moduleid]['module'];
				unset($Module);
			}elseif($catid){
				$Category = F('Category'.$lang);
				$m=$Category[$catid]['module'];
				unset($Category);
			}else{
				throw_exception('404');
			}
			if($a=='index') $id=$catid;
		}else{				
			if(empty($id)){
				$Cat = F('Cat'.$lang);
				$id = $Cat[$id];
				unset($Cat);
			}
			$m=MODULE_NAME;			
		}
		import('@.Action.Base');
		$bae=new BaseAction();
		if(!method_exists($bae,$a)){
			throw_exception('404');
		}
		$bae->$a($id,$m);
	 
	}
	
}
?>