<?php
/**
 * 
 *Maxhom  app的其他接口
 *  
 */
if(!defined("Maxhom")) exit("Access Denied");
class DiyappAction extends MaxhomAction
{

	
    //下面是其他的接口  上面是通用的接口
 	// http://localhost/index.php?g=App&m=Diyapp&a=syncData
	 //  同步数据到文章里面
    public function syncData(){
       	// 随机一个数，然后取100条。
		 //  1600 yige 
		 //  truncate table maxhom_article_all_bak;
		 //  Insert into maxhom_article_all_bak(title,description,content) select title,description,content from maxhom_article_all;
		 //  truncate table maxhom_article_all;
		 //  Insert into maxhom_article_all(title,description,content) select title,description,content from maxhom_article_all_bak;
		 M()->query("truncate table maxhom_article_all_bak");
		 M()->query("Insert into maxhom_article_all_bak(title,description,content) select title,description,content from maxhom_article_all");
		  M()->query("truncate table maxhom_article_all");
		 M()->query("Insert into maxhom_article_all(title,description,content) select title,description,content from maxhom_article_all_bak");
		 
		 
		 
		$num = 1; 
		 
        $list = M('article_all')->where("id>$num")->limit(400)->select();
		//echo M("article_all")->getlastsql();exit;
		foreach($list as $rs){
			$tdata['createtime'] = time();
			$tdata['title'] = $tdata['description'] = $rs['title'];
			$tdata['content'] = trim(str_replace("?","",$rs['content']));
			$tdata['lang'] = 1;
			M("article")->data($tdata)->add();
			//echo M("article")->getlastsql();exit;
			M('article_all')->where("id=".$rs['id'])->delete();
		}
		 
		 echo "ok :$num-".count($list);
    }
	
	 
 	// http://localhost/index.php?g=App&m=Diyapp&a=fabu
	 //  发布文章
    public function fabu(){
       
		 
	 //  27  28  29 33 34
	 	$rand = array('27','28','29','33','34');
		$cat = rand(0, 4);
        $list = M('article')->where("status=0")->limit(3)->select();
		//echo M("article_all")->getlastsql();exit;
		foreach($list as $rs){
			$tdata['updatetime'] = $tdata['createtime'] =time();
			$tdata['catid'] = $rand[$cat];
			$tdata['url'] = "/Article/show/".$rs['id'].".html";
			$tdata['hits'] = $cat;
			 
			$tdata['status'] = $tdata['recommend']= $tdata['tuijian'] = 1;
			M("article")->where("id=".$rs['id'])->data($tdata)->save();
			 
		}
		 
		 echo "ok ";
    }


}
?>
