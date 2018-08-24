<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class linkModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'link';
    
  
    public function __construct() {
        parent::__construct();
    }
    
    public function getLink() {
        $data = DbModel($this->table)->where("1 = 1")->select();
        return $data;
    }
  
    public function delLink($id){
 		$data = DbModel($this->table)->where(['id'=>$id])->delete();
        return $data;
    }

    public function getOne($id = '', $where = '') {
        if ($where) {
            $info = DbModel($this->table)->where($where)->find();
        } else {
            $info = isset($id) ? DbModel($this->table)->find($id) : NULL;
        }
        return $info;
    }
  
    //更新
    public function Dosave($data, $where) {
        $ret = DbModel($this->table)->where($where)->strict(false)->update($data);
        return $ret;
    }

//增加
    public function Doadd($data) {
        $id = DbModel($this->table)->strict(false)->insertGetId($data);
        return $id;
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