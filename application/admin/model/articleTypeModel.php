<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class articleTypeModel extends CommonModel {

    protected $table = 'article_type';
    protected $pk = 'id'; 

    public function __construct() {
        parent::__construct();
    }

    public function getAll(){
        $ret = DbModel($this->table)->where("1 = 1")->select();
        $temp = 0;
        foreach($ret as $value){ 
          $ret[$temp] += array('num' => $this->getNum($value['id']));
          $temp++;
        } 
        return $ret;
    }

    public function getNum($id = '') {
         $info = isset($id) ? (int)DbModel("article")->where(['type' => $id])->count() : 0;
         return $info;
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

//删
    public function Dodel($id) {
        if ($id) {
            $where['id'] = $id;
        }
        $x = DbModel($this->table)->where($where)->delete();
        if ($x) {
            return true;
        } else {
            return false;
        }
    }

}
