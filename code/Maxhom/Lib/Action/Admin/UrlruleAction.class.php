<?php
/**
 * 
 * Urlrule(URL规则)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class UrlruleAction extends AdminbaseAction {

	protected $dao;
    function _initialize()
    {	
		parent::_initialize();
		$this->dao = D('Admin/urlrule');
    }
}
?>