<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Info extends BlogBaseController {

    protected $mod;
    protected $webs;
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $id = input('id');
        if (!$id) {
            return $this->jump404();
        }
        if (!isNumber($id)) {
            return $this->jump404();
        }
        $mod = new \app\admin\model\articleModel();
        $info = $mod->getOne($id);
        if (!$info) {
            return $this->jump404();
        }
        if ($info['status'] == 3){
            return $this->jump404();
        }
        $this->mod = new \app\Common\Model\siteinfoModel();
        $this->webs = $this->mod->getInfo();
        $this->webs +=[
            'userimg' => 'https://dn-qiniu-avatar.qbox.me/avatar/'.md5($this->webs['email']),
        ];
        $linkmod = new \app\admin\model\linkModel();
        $link = $linkmod->getLink();
      
        $this->assign('info', $info);
        $this->assign('type', $info['type']);
        $this->assign('title', $info['title']);
        $this->assign('link', $link);
        $this->assign('webs', $this->webs);
        return $this->blogTpl();
    }

}
