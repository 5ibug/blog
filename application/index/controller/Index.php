<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Index extends BlogBaseController {
    protected $mod;
    protected $webs;
    protected $link;
    public function __construct() {
        $this->mod = new \app\Common\Model\siteinfoModel();
        $this->webs = $this->mod->getInfo();
        $this->webs +=[
            'userimg' => 'https://dn-qiniu-avatar.qbox.me/avatar/'.md5($this->webs['email']),
        ];
        $linkmod = new \app\admin\model\linkModel();
        $this->link = $linkmod->getLink();
        parent::__construct();
    }

    public function index() {
        $page = input('route.page', 1) == 0 ? $this->jump404() :input('route.page', 1) ;
        $type = input('route.type', 0);//获取路由变量
        if (isset($type) && !isNumber($type)) {
            return $this->jump404();
        }
        $pageSize = 10; //每页显示5条数据 可自行修改
        $mod = new \app\admin\model\articleModel();
        $where[] = ['status', '=', 1];
        if ($type) {
            $where[] = ['type', '=', $type];
            $map[] = ['type', '=', $type];
        }
        $list = $mod->getList($where, $page, $pageSize);
        if (empty($list)) {
            return $this->jump404();
        }
      
        $count = $mod->getCount($where);
        $pageparam = $mod->_pageparam();
        $Page = new \think\paginator\driver\Bootstrap($list, $pageSize, $page, $count, FALSE, $pageparam);

        $show = $Page->render();
        
         
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->assign('type', $type);
        $this->assign('link', $this->link);
        $this->assign('webs', $this->webs);
        return $this->blogTpl();
    }
    
    public function search(){
        if(IS_POST){
			if(!isset($_POST['keyboard']) || empty($_POST['keyboard'])){
                header("Location:/");
            }
            $search_key = $_POST['keyboard'];
            $list = $this->mod->search($search_key);
            if(sizeof($list) == 0){
                $list = [
                '0' => [
                	'id'    => '..',
                    'title' => '没有搜索到内容',
                    'desc'  => '没有搜索到任何内容,请换个关键字重试',
                ]
                ];
            }
            $this->assign('list', $list);
            $this->assign('link', $this->link);
            $this->assign('webs', $this->webs);
            return $this->blogTpl();
        }else{
            $this->error('系统错误');
        }
    }
}
