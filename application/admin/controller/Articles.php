<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Articles as M;
use app\admin\model\ArticleCats;

class Articles extends Controller{
	
    public function index(){
    	return $this->fetch('articles/list');
    }
    
    /**
     * 获取分页
     */
    public function pageQuery(){
    	$m = new M();
    	$rs = $m->pageQuery();
    	return $rs;
    }
    
    /**
     * 获取文章
     */
    public function get(){
    	$m = new M();
    	$rs = $m->get(Input("post.id/d",0));
    	return $rs;
    }
    
    /**
     * 设置是否显示/隐藏
     */
    public function editiIsShow(){
    	$m = new M();
    	$rs = $m->editiIsShow();
    	return $rs;
    }

    /**
     * 跳去新增/编辑页面
     */
    public function toEdit(){
    	$id = Input("get.id/d",0);
    	$m = new M();
    	if($id>0){
    		$object = $m->getById($id);
    	}else{
    		$object = $m->getEModel('articles');
    		$object['catName'] = '';
    	}
        $mc = new ArticleCats();
    	$this->assign('object',$object);
    	$this->assign('articlecatList',$mc->listQuery(0));
    	return $this->fetch("articles/edit");
    }
    
    /**
     * 新增
     */
    public function add(){
    	$m = new M();
    	$rs = $m->add();
    	return $rs;
    }
    
    
    /**
     * 编辑
     */
    public function edit(){
    	$m = new M();
    	$rs = $m->edit();
    	return $rs;
    }
    
    /**
     * 删除
     */
    public function del(){
    	$m = new M();
    	$rs = $m->del();
    	return $rs;
    }

    /**
     * 批量删除
     */
    public function delByBatch(){
        $m = new M();
        $rs = $m->delByBatch();
        return $rs;
    }
}
