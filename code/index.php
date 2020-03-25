<?php
/**
 *
 * index(入口文件)
 *
 * @package      	Maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!is_file('./Cache/config.php'))header("location: ./Install");
header("Content-type: text/html;charset=utf-8");
ini_set('memory_limit','32M');


 

error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('Maxhom',true);
define('UPLOAD_PATH','./Uploads/');
define('VERSION','v1.0 Released');
define('UPDATETIME','20130715');
define('APP_NAME','Maxhom');
define('APP_PATH','./Maxhom/');
define('APP_LANG',true);
define('APP_DEBUG',true);

// 微信分享和登录
// 驰骋网络
define('APPID',"wx2d3bfa50b994c16a");
define('APPSECRET',"14a75f3487d63911f4f3520c9aa82f1c");

// 校影家
/* define('APPID',"wx47973d02a232fbb9");
define('APPSECRET',"2ced8877c751dcf17588ad762424ead5");*/

define('THINK_PATH','./Core/');
require(THINK_PATH.'Core.php');
?>
