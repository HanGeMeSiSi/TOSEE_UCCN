<?php
/**
 * 
 * Empty (空模块)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class EmptyAction extends Action
{	
	public function _empty()
	{
		R('Admin/Content/'.ACTION_NAME);
	}
}
?>