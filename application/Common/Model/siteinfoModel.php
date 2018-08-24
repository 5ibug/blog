<?php

namespace app\Common\Model;

use think\Model;

class SiteinfoModel extends Model {
    
  
    public function __construct() {
        parent::__construct();
    }
    public function getInfo(){
    $mod = new \app\admin\model\optionsModel();
    $temp = $mod->getWebOptions();
    $mod = new \app\admin\model\userModel();
    $temp2 = $mod->getUser2('1');//id1 博主
    $date = [
        'title' => $temp['webname'],
        'description'=>$temp['description'],
        'keywords'=>$temp['keywords'],
        'email' => $temp2['email'],
        'nickname' => $temp2['nickname'],
        'synopsis'=>$temp2['synopsis'],
    ];
      return $date;
    }
  
    public function search($data){
        return DbModel('article')->where('title','like','%'.$data.'%')->whereOr('content','like','%'.$data.'%')->order('id desc')->select();
    }

}
