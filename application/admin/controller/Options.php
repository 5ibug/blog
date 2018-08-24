<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Options extends AdminBaseController {
    
    protected $mod;
    
    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\optionsModel();
    }

    public function index() {
        $this->assign('weboptions', $this->mod->getWebOptions());
        return $this->adminTpl();
    }
    
    public function test() {
       // $this->assign('user', $this->user);
        return dump();
    }
     
    public function update() {
        if (IS_POST) {
            if($this->mod->updateOptions($_POST)){
                $ret = ['code' => 1, 'msg' => '修改成功'];
            }else{
                $ret = ['code' => 0, 'msg' => '信息无任何变更'];
            }
            return json($ret);
        }
    }
  
}
