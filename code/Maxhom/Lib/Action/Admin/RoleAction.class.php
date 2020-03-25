<?php
/**
 * 
 * Role(会员组管理)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class RoleAction extends AdminbaseAction {

	protected $dao;
    function _initialize()
    {	
		parent::_initialize();		
	
    }

	public function _before_insert()
    {
		$_POST['allowpost'] = $_POST['allowpost'] ? 1 : 0 ;
		$_POST['allowpostverify'] = $_POST['allowpostverify'] ? 1 : 0 ;
		$_POST['allowupgrade'] = $_POST['allowupgrade'] ? 1 : 0 ;
		$_POST['allowsendmessage'] = $_POST['allowsendmessage'] ? 1 : 0 ;
		$_POST['allowattachment'] = $_POST['allowattachment'] ? 1 : 0 ;
		$_POST['allowsearch'] = $_POST['allowsearch'] ? 1 : 0 ;
	}


	public function _before_update()
    {
		$_POST['allowpost'] = $_POST['allowpost'] ? 1 : 0 ;
		$_POST['allowpostverify'] = $_POST['allowpostverify'] ? 1 : 0 ;
		$_POST['allowupgrade'] = $_POST['allowupgrade'] ? 1 : 0 ;
		$_POST['allowsendmessage'] = $_POST['allowsendmessage'] ? 1 : 0 ;
		$_POST['allowattachment'] = $_POST['allowattachment'] ? 1 : 0 ;
		$_POST['allowsearch'] = $_POST['allowsearch'] ? 1 : 0 ;
	}

}
?>