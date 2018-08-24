<?php

namespace app\Common\Controller;
class AdminBaseController extends BaseController {
    public function __construct($checkLogin = True) {
        parent::__construct();
        if ($checkLogin) {
            $this->isLogin();
        }
        $mod = new \app\admin\model\optionsModel();
        $tempname = '/' . strtolower(CONTROLLER_NAME) . '/' . strtolower(ACTION_NAME);
        $this->assign('tempname', $tempname);
        $this->assign('admin_title', $mod->getWebOptions()['webname']);
        $this->assign('admin_nickname', session('admin_nickname'));
        $this->assign('admin_userimg', "https://dn-qiniu-avatar.qbox.me/avatar/".md5(session('admin_email')));
    }

    protected function isLogin() {
        $admin_uid = session('admin_uid');
        if (empty($admin_uid)) {
            $url = url('Login/index');
            $this->redirect($url);
            exit;
        }
    }

    public function jump404() {
        //只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
        abort(404, '页面异常');
    }

    public function adminTpl() {
        //直接引入头部和底部文件，在新建页面模版的时候省去重复引入的环节
        $contrroller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);
        return $this->fetch('public:head') . $this->fetch($contrroller . '_' . $action) . $this->fetch('public:foot');
    }

    //空方法
    public function _empty() {
        return $this->jump404();
    }

}
