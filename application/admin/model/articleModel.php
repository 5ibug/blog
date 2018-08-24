<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class articleModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'article';
    protected $pk = 'id'; //主键
    protected $mod;
  
    public $notes = array(
        'type' => array(),
        'status' => array(1 => '正常', 2 => '隐藏', 3=> '禁止访问'),
    );
    
    public function __construct() {
        $this->mod = new \app\admin\model\articleTypeModel();
        $test = $this->mod->getAll();
        foreach($test as $value){ 
             $this->notes['type'] += array($value['id']=>$value['name']);
        } 
        parent::__construct();
    }
    
  	public function getList2($where = '') {
        $list = DbModel($this->table)->where($where);
        return $list;
    }
    

    
    public function getList($where = '', $page = 1, $pageSize = 20, $order = '') {
        if (!$order) {
            $order = $this->pk . " DESC";
        }
        $list = DbModel($this->table)->where($where)->page($page)->limit($pageSize)->order($order)->select();
        return $list;
    }

    public function getCount($where = array()) {
        $count = DbModel($this->table)->where($where)->count();
        return $count;
    }

    public function getField($where = "", $field = "*", $order = '', $limit = '') {
        if (!$order) {
            $order = $this->pk . " DESC";
        }
        $list = DbModel($this->table)->where($where)->order($order)->limit($limit)->column($field);
        return $list;
    }

//读取
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
