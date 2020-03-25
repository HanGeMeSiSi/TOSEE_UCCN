<?php
/**
 * 
 * Bank.php (银行汇款支付模块)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-01-09 maxhom.cn $
 * @此注解信息不能修改或删除,请尊重我们的劳动成果,你的修改请注解在此注解下面。
 */
class Bank extends Think {
	public $config = array()  ;
    public function __construct($config=array()) {
         $this->config = $config;
    }
	public function setup(){

		$modules['pay_name']    = L('Bank_pay_name');   
		$modules['pay_code']    = 'Bank';
		$modules['pay_desc']    = L('Bank_pay_desc');
		$modules['is_cod']  = '0';
		$modules['is_online']  = '1';
		$modules['author']  = 'Maxhom';
		$modules['website'] = '';
		$modules['version'] = '1.0.0';
		$modules['config']  = array();

		return $modules;
	}

	public function get_code(){
		return;
	}
	public function respond()
    {
		return;
	}
}
?>