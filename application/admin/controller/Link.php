<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Link extends AdminBaseController {
    
    protected $mod;
    
    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\linkModel();
    }

    public function index() {
        $list = $this->mod->getLink();
        $this->assign('list', $list);
        return $this->adminTpl();
    }
  
    public function edit() {
        $id = input('id');
        $info = $this->mod->getOne($id);
        $this->assign('info', $info);
 		if (IS_POST) { //数据操作
            $data = input('post.');
            unset($data['id']);
            if ($id) { //更新数据
                $where['id'] = $id;
                $x = $this->mod->Dosave($data, $where);
            } else { //添加数据
                $data['c_time'] = time();
                $x = $this->mod->Doadd($data);
            }
            if ($x) {
                $this->success('操作成功', CONTROLLER_NAME . '/index', NULL, 1);
            } else {
                $this->error('操作失败');
            }
        } else {
            return $this->adminTpl();
        }
    }
    
    public function test() {
       // $this->assign('user', $this->user);
        $list = $this->mod->getLink();
        return dump($list);
    }
     
    public function delete($id){
      if(is_numeric($id)){
          if($this->mod->delLink($id)){
              $this->success('删除成功', CONTROLLER_NAME . '/index', NULL, 1);
          }else{
              $this->error('操作失败');
          }
      }else{
          $this->error('操作失败');
      }
     
    }
  
}
