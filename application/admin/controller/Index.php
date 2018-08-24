<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Index extends AdminBaseController {
    protected $mod;
    protected $data;
    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\optionsModel();
        $this->data = $this->mod->getWebOptions();
    }

    public function index() {
       // return dump(config(''));
        return $this->adminTpl();
    }

}
