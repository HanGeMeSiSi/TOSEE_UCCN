<?php
/**
 * 
 * IndexAction.class.php (前台首页)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2011-03-01 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class IndexAction extends BaseAction
{
    public function index()
    {
		$this->assign('bcid',0);//顶级栏目 
		$this->assign('ishome','home');
        $this->display();
    }
 
}
?>