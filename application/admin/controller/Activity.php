<?php
namespace app\admin\controller;

class Activity extends Admin{
    /**
     * 显示活动列表
     */
    public function index(){
        $list = \think\Db::name('Repair')->paginate(3);
        $this->assign('list', $list);
        $this->assign('meta_title' , '保修管理');
//        var_dump($list);die;
        return $this->fetch();
    }
}
