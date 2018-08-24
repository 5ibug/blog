<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Type extends AdminBaseController {
    
    protected $mod;
    
    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\articleTypeModel();
    }

    public function index() {
        $list = $this->mod->getAll();
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
                $data += array('time'=>time());
                $x = $this->mod->Dosave($data, $where);
            } else { //添加数据
                $data += array('time'=>time());
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
    
    public function delete($id){
      if(is_numeric($id)){
          if($this->mod->getNum($id) == 0){
              if($this->mod->Dodel($id)){
                  $this->success('删除成功', CONTROLLER_NAME . '/index', NULL, 1);
              }else{
                  $this->error('操作失败');
              }
          }else{
              $this->error('该分类下还有文章,删除失败!');
          }
      }else{
          $this->error('操作失败');
      }
     
    }
  
}
