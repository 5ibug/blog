<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class optionsModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'options';
    public function __construct() {
        parent::__construct();
    }
    
    public function getWebOptions() {
        $data = DbModel($this->table)->find();
        return $data;
    }
  
    public function updateOptions($temp){
        $State = DbModel($this->table)->where('1 = 1')->update($temp);
        if($State == false){
            return false;
        }else{
            return true;
        }
    }
  

}