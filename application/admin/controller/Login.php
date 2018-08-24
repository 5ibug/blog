<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Login extends AdminBaseController {
    protected $mod;
    protected $user;
    public function __construct() {
        parent::__construct(FALSE);
    $this->mod = new \app\admin\model\userModel();
    }

    public function index() {
        return $this->fetch();
    }

    public function login() {
        if (IS_POST) {
            $username = input('post.username');
            $password = input('post.password');
            if (!$this->mod->getUserState($username,$password )) {
                $ret = ['code' => 0, 'msg' => '帐号或密码错误'];
                return json($ret);
            }
            $this->user = $this->mod->getUser($username);
            session('admin_uid', $this->user['id']);
            session('admin_username', $this->user['username']);
            session('admin_nickname', $this->user['nickname']);
            session('admin_email', $this->user['email']);
            $ret = ['code' => 1, 'msg' => '正在登陆'];
            return json($ret);
        }
    }

    public function out() {
        session('admin_uid', NULL);
        session('admin_username', NULL);
        session('admin_nickname', NULL);
        $url = url("login/index");
        $this->redirect($url);
    }

}
