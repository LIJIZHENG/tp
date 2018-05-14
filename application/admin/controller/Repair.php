<?php
namespace app\admin\controller;
/**
 * 报修管理
 */
class Repair extends Admin{
    /**
     * 报修管理列表
     */
    public function index(){
        $list = \think\Db::name('Repair')->paginate(3);
        $this->assign('list', $list);
        $this->assign('meta_title' , '保修管理');
//        var_dump($list);die;
        return $this->fetch();
    }
    /**
     * 添加报修管理
     */
    public function add(){
        if(request()->isPost()){
            $Repair = model('repair');
            $post_data=\think\Request::instance()->post();
            $post_data['odd_number']=uniqid();
//            var_dump(uniqid());die;
            //自动验证
            $validate = validate('Repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_repair', 'repair', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        }else{
            $this->assign('info',null);
            $this->assign('meta_title', '新增报修');
            return $this->fetch('add');
        }
    }
    /**
     * 修改保修管理
     */
    public function edit($id = 0){
        if(request()->isPost()){
            $postdata = \think\Request::instance()->post();
            $Repair = \think\Db::name("Repair");

            $data = $Repair->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        }else{
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Repair')->find($id);
            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $pid = input('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = \think\Db::name('Repair')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            return $this->fetch();
        }
    }

    /**
     * 删除报修管理
     */
    public function del($id = 0){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Repair')->where($map)->delete()){
            //记录行为
            action_log('update_repair', 'Repair', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}
