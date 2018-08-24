<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class userModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'user';
    protected $pk = 'id'; //主键
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserState($user,$password) {
       $where = [
            'username'  =>    $user,
            'password'  =>    $this->setPassword($password),
        ];
        $State = DbModel($this->table)->where($where)->find();
        if($State == null){
          return false;
        }else{
          return true;
        }
    }
  
    public function updateUser($temp){
        $data = [
            'username'  =>  htmlspecialchars($temp['username']),
            'nickname'  =>  $temp['nickname'],
            'email'		=>  $temp['email'],
            'synopsis'  =>  $temp['synopsis'],
        ];
        if($temp['password'] != ''){
            $data += ['password' => $this->setPassword($temp['password'])];
        }
        $State = DbModel($this->table)->where('username', session('admin_username'))->update($data);
        if($State == false){
            return false;
        }else{
            return true;
        }
    }
    
    public function getUser2($id) {
        $State = DbModel($this->table)->where(['id' => $id])->find();
        return $State;
    } 
  
    public function getUser($user) {
        $State = DbModel($this->table)->where(['username' => $user])->find();
        return $State;
    } 
    public function setPassword($val){
        return md5(base64_encode(md5($val)));
    }
}