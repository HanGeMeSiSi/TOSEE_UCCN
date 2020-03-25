<?php
/**
 *
 * Content(内容管理模块)
 *
 * @package      	maxhom
 * @author          dengweicai QQ:1519287158 <1519287158@qq.com>
 * @copyright     	Copyright (c) 2008-2011  (http://www.maxhom.com)
 * @license         http://www.maxhom.com/license.txt
 * @version        	maxhom企业网站管理系统 v1.0 2012-10-08 maxhom.cn $
 */
if(!defined("Maxhom")) exit("Access Denied");
class ContentAction extends AdminbaseAction
{
    protected  $dao,$fields;
    public function _initialize()
    {
        parent::_initialize();
		$module =$this->module[$this->moduleid]['name'];
		//设置模型描述
		$moduledescription=$this->module[$this->moduleid]['description'];
		$this->assign ('moduledescription',$moduledescription);
	
		$this->dao = D('Area');
		
		$fields = F($this->moduleid.'_Field');
	
		foreach($fields as $key => $res){
			$res['setup']=string2array($res['setup']);
			$this->fields[$key]=$res;
		}
		unset($fields);
		unset($res);
		$this->assign ('fields',$this->fields);
    }

    /*状态*/
    
    public function status(){
    	$name = MODULE_NAME;
    	$model = D ($name);
    	$_GET = get_safe_replace($_GET);
    	if($model->save($_GET)){
    		
    		$this->success(L('do_ok'));
    	}else{
    		$this->error(L('do_error'));
    	}
    }
    
    /**
     * 列表
     *
     */
    public function search()
    {
    	//$_REQUEST['where']='parentid=0';
    	$_REQUEST['order']='pos';
    	$_REQUEST ['sort']='desc';
    	$template =  file_exists(THEME_PATH.MODULE_NAME.'_index.html') ? MODULE_NAME.':index' : 'Content:index';
    	$this->_list(MODULE_NAME);
    
    	$this->display ($template);
    }
  
    public function index() {
        
        
       
        
    	
        $type=$_POST['type'];
      
        if($type==2){
                 
            $this->getfile();
        }
        $groupid= $_SESSION['groupid'];
        if($groupid==2){
            $this-> townindex();
            exit;
        }
    	$name = MODULE_NAME;
    		
    	$model = M ($name);
    	$_REQUEST['where']='pid=0';
    	$id=$model->getPk ();
    	$count = $model->where($_REQUEST['where'])->count();
    	import ( "@.ORG.Page" );
    	$p = new Page ( $count, 15 );
    	unset($_GET[C('VAR_PAGE')]);
    	$map=$_GET;
    	$map[C('VAR_PAGE')]='{$page}';
    	$p->urlrule = U($name.'/index',$map);
    	$page = $p->show ();
    	
    	$list = $model->where($_REQUEST['where'])->order("$id asc")->limit($p->firstRow . ',' . $p->listRows)->select();
    	$this->assign('list', $list);
    	$this->assign ( 'page', $page );
    	$this->display();
    }
    
    public function getfile(){
       
        if (! empty ( $_FILES ['file_stu'] ['name'] )) {
            set_time_limit ( 600 );
            ini_set ( 'memory_limit', '-1' );
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
             
            /* 判别是不是.xls文件，判别是不是excel文件 */
            if (strtolower ( $file_type ) != "xls") {
                $this->error ( '不是Excel文件，重新上传' );
            }
             
            /* 设置上传路径 */
            // $savePath = SITE_PATH . '/public/upfile/Excel/';
            $savePath = UPLOAD_PATH . 'oftentel/';
             
            /* 以时间来命名上传的文件 */
            $str = date ( 'Ymdhis' );
            $file_name = $str . "." . $file_type;
             
            /* 是否上传成功 */
            if (! copy ( $tmp_file, $savePath . $file_name )) {
                $this->error ( '上传失败' );
            }
          
            $result = $this->sjorder_insert ( $file_type,$savePath . $file_name ); // 去处理数据;
            // header("refresh:2;url=/index.php?g=Admin&m=Daorucustomers&a=index&menuid=110");
            if ($result == 1) {
                print ('导入成功！') ;
                exit ();
            }
            // $this->success("导入成功!");
        }else{
            $this->error ( '没有文件' );
            
        }
    }
    public function  sjorder_insert($exts,$filename){
         
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        Include APP_PATH . '/Lib/Excel/PHPExcel.php';
        include APP_PATH . '/Lib/Excel/PHPExcel/IOFactory.php';
        //创建PHPExcel对象，注意，不能少了\
        $PHPExcel=new \PHPExcel();
        //如果excel文件后缀名为.xls，导入这个类
    
        if($exts == 'xls'){
            import("Excel.PHPExcel.Reader.Excel5");
            $PHPReader=new \PHPExcel_Reader_Excel5();
        }else if($exts == 'xlsx'){
            import("Excel.PHPExcel.Reader.Excel2007");
            $PHPReader=new \PHPExcel_Reader_Excel2007();
        }
         
         
         
         
        $PHPExcel=$PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            }
             
        }
         
        $this->save_import($data);
    }
    
    //保存导入数据
    public function save_import($data)
    {
        //print_r($data);exit;
        $level=$_POST['level'];
        $areaid=$_POST['areaid'];
        $info['areaid']=$areaid;
        $info['level']=$level;
       
        foreach ($data as $k=>$v){
            if($k >= 2){
                if(empty($v['A'])||empty($v['B'])){
                    continue;
                }
                $info['createtime']=$info['updatetime']=time();
                $info['status']=1;
                $info['lang']=1;
                $info['name']=$v['A'];
                $telephone=$info['telephone']=$v['B'];
               $count= M('oftentel')->where("telephone=$telephone")->count();
               if($count>0){
                   continue;
               }
                $result=M('oftentel')->data($info)->add();
               
            }
    
        }
    
        if($result){
            $this->success('电话导入成功');
        }else{
            $this->error('电话导入失败');
        }
        //print_r($info);
    
    }
    
    public function childindex() {
    	 
    	$name = MODULE_NAME;
    	$userid=$_SESSION['adminid'];
    	
    	$groupid= $_SESSION['groupid'];
        $parentid=$_REQUEST['parentid'];
       
        $area=M('Area')->where("pid=".$parentid)->find();
        
        $parentidbefore=$area['pid'];
        if(empty($parentidbefore)){
        	$parentidbefore=0;
        	
        }
        
        $this->assign('parentidbefore', $parentidbefore);
        $this->assign('parentid', $parentid);
    	$model = M ($name);
    	$_REQUEST['where']="pid=".$parentid;
    	$id=$model->getPk ();
    	$count = $model->where($_REQUEST['where'])->count();
    	import ( "@.ORG.Page" );
    	$p = new Page ( $count, 15 );
    	unset($_GET[C('VAR_PAGE')]);
    	$map=$_GET;
    	$map[C('VAR_PAGE')]='{$page}';
    	$p->urlrule = U($name.'/childindex',$map);
    	$page = $p->show ();
    
    	$list = $model->where($_REQUEST['where'])->order("$id asc")->limit($p->firstRow . ',' . $p->listRows)->select();
    	$this->assign('list', $list);
    	$this->assign ( 'page', $page );
    	$this->display();
    }
    
    public function townindex() {
    
        $name = MODULE_NAME;
        $userid=$_SESSION['adminid'];
         
        $groupid= $_SESSION['groupid'];
        $parentid=$_REQUEST['parentid'];
        if($groupid==2){
            $parentid=$_SESSION['town'];
        }
        $area=M('Area')->where("id=".$parentid)->find();
    
        $parentidbefore=$area['pid'];
        if(empty($parentidbefore)){
            $parentidbefore=0;
             
        }
    
        $this->assign('parentidbefore', $parentidbefore);
        $this->assign('parentid', $parentid);
        $model = M ($name);
        $_REQUEST['where']="id=".$parentid;
        $id=$model->getPk ();
        $count = $model->where($_REQUEST['where'])->count();
        import ( "@.ORG.Page" );
        $p = new Page ( $count, 15 );
        unset($_GET[C('VAR_PAGE')]);
        $map=$_GET;
        $map[C('VAR_PAGE')]='{$page}';
        if($groupid==2){
            $p->urlrule = U($name.'/childindextown',$map);
            $page = $p->show ();
            
            $list = $model->where($_REQUEST['where'])->order("$id asc")->limit($p->firstRow . ',' . $p->listRows)->select();
            $this->assign('list', $list);
            $this->assign ( 'page', $page );
           // dump(THEME_PATH.MODULE_NAME.'_childindextown.html');
            $template =  file_exists(THEME_PATH.MODULE_NAME.'_childindextown.html') ? MODULE_NAME.':edit' : 'Content:edit';
            $this->display ( THEME_PATH.MODULE_NAME.'_childindextown.html');
        }else{
            $p->urlrule = U($name.'/childindex',$map);
            
            $page = $p->show ();
            
            $list = $model->where($_REQUEST['where'])->order("$id asc")->limit($p->firstRow . ',' . $p->listRows)->select();
            $this->assign('list', $list);
            $this->assign ( 'page', $page );
            $this->display();
        }
       
       
       
      
    }
    
//     public function index()
//     {
//     	$name = MODULE_NAME;
    	 
//     	$model = M ($name);
//     	$count = $model->where($_REQUEST['where'])->count();
//     	import ( "@.ORG.Page" );
//     	$p = new Page ( $count, 15000 );
//     	unset($_GET[C('VAR_PAGE')]);
//     	$map=$_GET;
//     	$map[C('VAR_PAGE')]='{$page}';
//     	$p->urlrule = U($name.'/index',$map);
//     	$page = $p->show ();
    	
//     	$list = $model->where($_REQUEST['where'])->order("pos desc,id asc")->limit($p->firstRow . ',' . $p->listRows)->select();
    	
//     	if($list){
//     		foreach($list as $r) {
//     			if($r['module']=='Page'){
//     				$r['str_manage'] = '<a href="?g=Admin&m=Page&a=edit&id='.$r['id'].'">'.L('edit_page').'</a> | ';
//     			}elseif($r['module']==''){
//     				$r['str_manage'] = '';
//     			}else{
//     				$r['str_manage'] = '<a href="?g=Admin&m='.$r['module'].'&a=add&catid='.$r['id'].'">'.L('add_content').'</a> | ';
//     			}
//     			$r['str_manage'] .= '<a href="'.U('Category/add',array( 'parentid' => $r['id'],'type'=>$r['type'])).'">'.L('add_catname').'</a> | <a href="'.U('Category/edit',array( 'id' => $r['id'],'type'=>$r['type'])).'">'.L('edit').'</a> | <a href="javascript:confirm_delete(\''.U('Category/delete',array( 'id' => $r['id'])).'\')">'.L('delete').'</a> ';
//     			$r['modulename']=$this->module[$r['moduleid']]['title'] ? $this->module[$r['moduleid']]['title'] : L('Module_url');
//     			$r['dis'] =  $r['ismenu'] ? '<font color="green">'.L('display_yes').'</font>' : '<font color="red">'.L('display_no').'</font>' ;
//     			$array[] = $r;
//     		}
//     		$str  = "<tr>
// 						<td width='40' align='center'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
// 						<td align='center'>\$id</td>
// 						<td >\$spacer\$catname &nbsp;</td>
// 						<td align='center'>\$modulename</td>
// 						<td align='center'>\$dis</td>
// 						<td align='center'><a href='\$url' target='_blank'>".L('fangwen')."</a></td>
// 						<td align='center'>\$str_manage</td>
// 					</tr>";
    		
//     		import ( '@.ORG.Tree' );
//     		$tree = new Tree ($array);
//     		unset($array);
//     		$tree->icon = array('&nbsp;&nbsp;&nbsp;'.L('tree_1'),'&nbsp;&nbsp;&nbsp;'.L('tree_2'),'&nbsp;&nbsp;&nbsp;'.L('tree_3'));
//     		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
//     		$categorys = $tree->get_tree(0, $str);
//     		$this->assign('list', $categorys);
//     	}
//     	$this->display();
//     }

	public function add()
    {
		$vo['catid']= intval($_GET['catid']);
		
		$form=new Form($vo);
		
		$form->isadmin=1;
		$this->assign ( 'pid', $_GET['parentid'] );
		$this->assign ( 'level', $_GET['level'] );
		$this->assign ( 'form', $form );
		$template =  file_exists(THEME_PATH.MODULE_NAME.'_edit.html') ? MODULE_NAME.':edit' : 'Content:edit';
		
		$this->display ( $template);
	}


	public function edit()
    {
		
		$id = $_REQUEST ['id'];		
		if(MODULE_NAME=='Page'){
					$Page=D('Page');
					$p = $Page->find($id);
					if(empty($p)){
					$data['id']=$id;
					$data['title'] = $this->categorys[$id]['catname'];
					$data['keywords'] = $this->categorys[$id]['keywords'];
					$Page->add($data);	
					}
		}
		$vo = $this->dao->getById ( $id );
		
 		$form=new Form($vo);
		
       
		$this->assign ( 'vo', $vo );
		$this->assign ( 'form', $form );
		$template =  file_exists(THEME_PATH.MODULE_NAME.'_edit.html') ? MODULE_NAME.':edit' : 'Content:edit';
		$this->display ( $template);
	}

    /**
     * 录入
     *
     */
    public function insert($module='',$fields=array(),$userid=0,$username='',$groupid=0)
    {
		$model = $module ?  M($module) : $this->dao;
		
		$fields = $fields ? $fields : $this->fields ;
       
		if($fields['verifyCode']['status'] && (md5($_POST['verifyCode']) != $_SESSION['verify'])){
			$this->assign ( 'jumpUrl','javascript:history.go(-1);');
			$this->error(L('error_verify'));
        }

		$_POST = checkfield($fields,$_POST);
		if(empty($_POST)) $this->error (L('do_empty'));
		
		$_POST['createtime'] = time();	
		$_POST['status'] =1;
		$_POST['lang'] =1;
		$_POST['updatetime'] = $_POST['createtime'];	
        $_POST['userid'] = $module ? $userid : $_SESSION['userid'];
		$_POST['username'] = $module ? $username : $_SESSION['username'];
		if($_POST['style_color']) $_POST['style_color'] = 'color:'.$_POST['style_color'];
		if($_POST['style_bold']) $_POST['style_bold'] =  ';font-weight:'.$_POST['style_bold'];
		if($_POST['style_color'] || $_POST['style_bold'] ) $_POST['title_style'] = $_POST['style_color'].$_POST['style_bold'];
 
		$module = $module? $module : MODULE_NAME ;
		if(GROUP_NAME=='User')$_POST['status'] = $this->Role[$groupid]['allowpostverify'] ? 1 : 0;
		
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		$_POST['id'] = $id= $model->add();

		if ($id !==false) {
			$catid = $module =='Page' ? $id : $_POST['catid'];



			if($_POST['aid']) {
				$Attachment =M('Attachment');		
				$aids =  implode(',',$_POST['aid']);
				$data['id']=$id;
				$data['catid']= $catid;
				$data['status']= '1';
				$Attachment->where("aid in (".$aids.")")->save($data);
			}
			
			$tablename=C('DB_PREFIX').strtolower($module);
			$db=D('');
			$db =   DB::getInstance();
			$tables = $db->getTables();			
			$Fields=$db->getFields($tablename); 
			
			if(isset($Fields['url'])){
				$data='';
				$cat = $this->categorys[$catid];
				$url = geturl($cat,$_POST,$this->Urlrule);
				$data['id']= $id;
				$data['url']= $url[0];
				$model->save($data);
			}

			
			if($_POST['keywords'] && $module !='Page'){
				$keywordsarr=explode(',',$_POST['keywords']);
				$i=0;
				$tagsdata =M('Tags_data');
				$tagsdata->where("id=".$id)->delete();
				foreach((array)$keywordsarr as $tagname){
					if($tagname){
						$tagidarr=$tagdatas=$where=array();
						$where['name']=array('eq',$tagname);
						$where['moduleid']=array('eq',$cat['moduleid']);
						$tagid=M('Tags')->where($where)->field('id')->find();
						$tagidarr['id']=$id;
						if($tagid){
							$num = $tagsdata->where("tagid=".$tagid[id])->count();
							$tagdatas['num']=$num+1;
							M('Tags')->where("id=".$tagid[id])->save($tagdatas);
							$tagidarr['tagid']=$tagid['id'];
						}else{
							$tagdatas['moduleid']=$cat['moduleid'];
							$tagdatas['name'] = $tagname;
							$tagdatas['slug'] = Pinyin($tagname);
							$tagdatas['num']=1;
							$tagdatas['lang']=$_POST['lang'];
							$tagdatas['module']= $cat['module'];
							$tagidarr['tagid']=M('Tags')->add($tagdatas);
						}
						$i++;
						$tagsdata->add($tagidarr);
					}
				}
			}

			if($cat['presentpoint']){
				$user =M('User');
				if($cat['presentpoint']>0) $user->where("id=".$_POST['userid'])->setInc('point',$cat['presentpoint']);
				if($cat['presentpoint']<0) $user->where("id=".$_POST['userid'])->setDec('point',$cat['presentpoint']);
			}
 
			if($cat['ishtml'] && $_POST['status']){
				if($module!='Page'   && $_POST['status'])	$this->create_show($id,$module);				
				$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
				foreach($arrparentid as $catid) {
					if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
				}
 			}
			//if($this->sysConfig['HOME_ISHTML']) $this->create_index();
 			$pid=$_POST['pid'];
 			
			if(GROUP_NAME=='Admin'){
			    if($pid==0){
			        $this->assign ( 'jumpUrl', U($module.'/index?parentid='.$pid) );
			    }else{
			        $this->assign ( 'jumpUrl', U($module.'/childindex?parentid='.$pid) );
			    }
				
			}elseif(GROUP_NAME=='User'){
				$this->assign ( 'jumpUrl',$_SERVER['HTTP_REFERER']);
				//$this->assign ( 'jumpUrl', U(GROUP_NAME.'-'.MODULE_NAME.'/add?moduleid='.$cat['moduleid']) );
			}
			$this->success (L('add_ok'));
		} else {
			$this->error (L('add_error').': '.$model->getDbError());
		}
	
    }

public	function update($module='',$fields=array(),$userid=0,$username='')
	{  
		
		$model = $module ?  M($module) : $this->dao;
		

		

		$olddata = $model->find($_POST['id']);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		

		// 更新数据
		$list=$model->save ();

		if (false !== $list) {
			$id= $_POST['id'];
			$catid = $module =='Page' ? $id : $_POST['catid'];

			if($olddata['keywords']!=$_POST['keywords']  && $module !='Page'){
				 

				$tagidarr=$tagdatas=$where=array();
				$where['name']=array('in',$olddata['keywords']);
				$where['moduleid']=array('eq',$cat['moduleid']);
				$where['lang']=array('eq',$_POST['lang']);
				M('Tags')->where($where)->setDec('num'); 

				$tagsdata =M('Tags_data');
				$tagsdata->where("id=".$id)->delete();

				$keywordsarr=explode(',',$_POST['keywords']);			
				foreach((array)$keywordsarr as $tagname){
					if($tagname){
						$tagidarr=$tagdatas=$where=array();
						$where['name']=array('eq',$tagname);
						$where['moduleid']=array('eq',$cat['moduleid']);
						$where['lang']=array('eq',$_POST['lang']);
						$tagid=M('Tags')->where($where)->field('id')->find();
						$tagidarr['id']=$id;
						if($tagid['id']>0){
							M('Tags')->where("id=".$tagid[id])->setInc('num'); ;
							$tagidarr['tagid']=$tagid['id'];
						}else{
							$tagdatas['moduleid']=$cat['moduleid'];
							$tagdatas['name'] = $tagname;
							$tagdatas['slug'] = Pinyin($tagname);
							$tagdatas['num']=1;
							$tagdatas['lang']=$_POST['lang'];
							$tagdatas['module']= $cat['module'];
							$tagidarr['tagid']=M('Tags')->add($tagdatas);
						}
						$tagsdata->add($tagidarr);
					}
				}
				M('Tags')->where('num<=0')->delete();
			}

			if($_POST['aid']) {
				$Attachment =M('Attachment');		
				$aids =  implode(',',$_POST['aid']);
				$data['id']= $id;
				$data['catid']= $catid;
				$data['status']= '1';
				$Attachment->where("aid in (".$aids.")")->save($data);
			}
			$cat = $this->categorys[$catid];
			if($cat['ishtml']){
				if($module!='Page'  && $_POST['status'])	$this->create_show($_POST['id'],$module);
				$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
				foreach($arrparentid as $catid) {
					if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
				}
 			}
			if($this->sysConfig['HOME_ISHTML']) $this->create_index();
			$this->assign ( 'jumpUrl', $_POST['forward'] );
			$this->success (L('edit_ok'));
		} else {
			//错误提示
			$this->success (L('edit_error').': '.$model->getDbError());
		}
	}

 
	function statusallok(){

		$module = MODULE_NAME;
		$model = M ( $module );
		$ids=$_POST['ids'];
		if(!empty($ids) && is_array($ids)){
			$id=implode(',',$ids);
			$data = $model->select($id);
			if($data){				
				foreach($data as $key=>$r){	
					$model->save(array(id=>$r['id'],status=>1));
					if($this->categorys[$r['catid']]['ishtml'] && $r['status'])$this->create_show($r['id'],$module);	
				}
				$cat =  $this->categorys[$r['catid']];
				if($cat['ishtml']){			
					if($this->sysConfig['HOME_ISHTML']) $this->create_index();
					$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
					foreach($arrparentid as $catid) {
						if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
					}
				}
				$this->success(L('do_ok'));
			}else{
				$this->error(L('do_error').': '.$model->getDbError());
			}
		}else{
			$this->error(L('do_empty'));
		}
	}

	/*状态*/

	public function pos(){
		$module = MODULE_NAME;
		$model = D ($module);
		if($model->save($_GET)){
			$_POST ='';
			$_POST = $model->find($_GET['id']);
			$_POST['pos']=$_GET['pos'];
			$model->save($_POST);

			$this->success(L('do_ok'));
		}else{
			$this->error(L('do_error'));
		}
	}


}?>