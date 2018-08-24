<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class User extends AdminBaseController {
    protected $user;
    protected $mod;
    
    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\userModel();
        $this->user = $this->mod->getUser(session('admin_username'));
    }

    public function index() {
        $this->assign('user', $this->user);
        return $this->adminTpl();
    }

    public function update() {
        if (IS_POST) {
            if($this->mod->updateUser($_POST)){
                $ret = ['code' => 1, 'msg' => '修改成功'];
                session('admin_username', $_POST['username']);
                session('admin_nickname', $_POST['nickname']);
                session('admin_email', $_POST['email']);
            }else{
                $ret = ['code' => 0, 'msg' => '信息无任何变更'];
            }
            return json($ret);
        }
    }

}
