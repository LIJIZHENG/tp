<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;
use app\home\model\Category;
use app\home\model\Document;
use OT\DataDictionary;
use think\Config;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Index extends Home{

	//系统首页
    public function index(){
        @session_start();
        $uid = session('uid');
        $category = model('Category')->where('pid',42)->select();
        $document = new Document();
        $lists= $document->lists(null);
        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('uid',$uid);//列表
        $this->assign('page',model('Document')->page);//分页
        return $this->fetch();
    }
}
