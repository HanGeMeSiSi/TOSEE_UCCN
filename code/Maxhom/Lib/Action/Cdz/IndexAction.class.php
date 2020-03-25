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
		self::logincomm(); 
		 
		$this->assign('bcid',0);//顶级栏目 
		$this->assign('ishome','home');
        $this->display();
    }
	public function main(){
		self::logincomm();
		
		 $openid = session('openid');
		 
		 $ip = get_client_ip ();
		 if ($ip == '127.0.0.1') { 
		 	$openid = "25";
		 }
		 
		 $userdata = M("user")->where("openid='$openid'")->find();
		 $this->assign('userdata',$userdata);
         $this->display();
	}
	
	
	//公共的登录函数
	function logincomm(){
		 $openid = session('openid');
		 $new = $this->_request("new");
		 $ip = get_client_ip ();
		//echo $openid;
		if ($ip != '127.0.0.1') { 
			if(!$openid && $new !=1){
			 
				$code = $_GET['code'];
				$state = $_GET['state'];
				if(!$code ){
					//换成自己的接口信息
				 
					$url = urldecode("http://xiaoyingjia.maxhom.cn/oauth.php");
					header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.APPID.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect');
				}else{
					//换成自己的接口信息
				 
					if (empty($code)) $this->error('授权失败');
					$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APPID.'&secret='.APPSECRET.'&code='.$code.'&grant_type=authorization_code';
					$token = json_decode(file_get_contents($token_url));
					if (isset($token->errcode)) {
					 echo '<h1>错误：</h1>'.$token->errcode;
					 echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
					 exit;
					}
					$access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.APPID.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
					//转成对象
					$access_token = json_decode(file_get_contents($access_token_url));
					if (isset($access_token->errcode)) {
					 echo '<h1>错误：</h1>'.$access_token->errcode;
					 echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
					 exit;
					}
					$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN'; //开源软件:phpfensi.com
					//转成对象
					$user_info = json_decode(file_get_contents($user_info_url));
					if (isset($user_info->errcode)) {
					 echo '<h1>错误：</h1>'.$user_info->errcode;
					 echo '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
					 exit;
					}
					$openid = $user_info->openid;
					//echo '$uopenid='.$uopenid;
				}
				$num = M("user")->where("openid='$openid'")->count();
				if($num<1){
					 session('openid',$openid);
					 $userdata["openid"] = $user_info->openid;
					 $userdata["nickname"] = $user_info->nickname;
					 $userdata["city"] = $user_info->city;
					 $userdata["province"] = $user_info->province;
					 $userdata["country"] = $user_info->country;
					 $userdata["avatar"] = $userdata["headimgurl"] = $user_info->headimgurl;
					 
					 $userdata["username"] = $user_info->nickname;
					 $userdata["sex"] = $user_info->sex;
					 $userdata["last_logintime"] =$userdata["createtime"] =$userdata["updatetime"] =time(); 
					 $userdata["lang"] =$userdata["status"] =1; 
					 $userdata["groupid"] =3;
					 
					 M("user")->data($userdata)->add();
				 }
				 
			}
 		}
	}
 
}
?>