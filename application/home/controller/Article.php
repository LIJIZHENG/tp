<?php
namespace app\home\controller;
use app\admin\model\AuthGroup;
use think\Db;
use think\Request;
use app\home\model\Document;
/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class Article extends Home {

    /* 文档模型频道页 */
	public function index(){
		/* 分类信息 */
		$category = $this->category();
		//频道页只显示模板，默认不读取任何内容
		//内容可以通过模板标签自行定制

		/* 模板赋值并渲染模板 */
		$this->assign('category', $category);
		return $this->fetch($category['template_index']);
	}

    public function tong(){
	    return view('category/fen');
    }

    public function shop(){
        return view('category/shop');
    }

    public function bian(){
        return view('category/huo');
    }
        /* 文档模型列表页 */
	public function lists($p = 1){
	    @session_start();
        $uid = session('uid');
	    if($uid !=null){
	        $per_page=$_GET['per_page']??1;
            /* 分类信息 */
            $category = $this->category();
//		var_dump($category);die;
            /* 获取当前分类列表 */
//            $Document = new Document();
//            $list = $Document->lists($category['id']);
            $list=Db::name("document")->where("category_id",'=',$category['id'])->where("status",'=',1)->paginate($per_page);
            if(false === $list){
                $this->error('获取列表数据失败！');
            }

            /* 模板赋值并渲染模板 */
            $this->assign('category', $category);
            $this->assign('list', $list);
//		 var_dump($category);
//		 var_dump($list);
//		 foreach ($list as $value){
//		     var_dump($value);
//         }
//		 die;
//		return $this->fetch($category['template_lists']);

//            var_dump($list);
            $v=[];
            foreach ($list as $value){
                $v[]=$value;
            }
             return $v;
//            return view('category/fen',['category'=>$category,'list'=>$list]);
        }else{
	        $this->error('请登录!','http://www.tp.cc/user/login/index.html');
        }
	}

	/* 文档模型详情页 */
	public function detail($id = 0, $p = 1){
		/* 标识正确性检测 */
		if(!($id && is_numeric($id))){
			$this->error('文档ID错误！');
		}

		/* 页码检测 */
		$p = intval($p);
		$p = empty($p) ? 1 : $p;

		/* 获取详细信息 */
		$Document = new Document();
		$info = $Document->detail($id);
		if(!$info){
			$this->error($Document->getError());
		}
		/* 分类信息 */
		$category = $this->category($info['category_id']);
		/* 获取模板 */
		if(!empty($info['template'])){//已定制模板
			$tmpl = $info['template'];
		} elseif (!empty($category['template_detail'])){ //分类已定制模板
			$tmpl = $category['template_detail'];
		} else { //使用默认模板
			$tmpl = 'article/'. get_document_model($info['model_id'],'name') .'/detail';
		}
		/* 更新浏览数 */
		$map = array('id' => $id);
		$Document->where($map)->setInc('view');
		/* 模板赋值并渲染模板 */
		$this->assign('category', $category);
		$this->assign('info', $info);
		$this->assign('page', $p); //页码
		return $this->fetch($tmpl);
	}

	/* 文档分类检测 */
	private function category($id = 0){
		/* 标识正确性检测 */
		$id = $id ? $id : input('param.category',0);
		if(empty($id)){
			$this->error('没有指定文档分类！');
		}

		/* 获取分类信息 */
		$category = model('Category')->info($id);
		if($category && 1 == $category['status']){
			switch ($category['display']) {
				case 0:
					$this->error('该分类禁止显示！');
					break;
				//TODO: 更多分类显示状态判断
				default:
					return $category;
			}
		} else {
			$this->error('分类不存在或被禁用！');
		}
	}
    /**
     * 在线报修
     */
    public function add(){
        @session_start();
        $uid = session('uid');
        if($uid !=null){
      if(request()->isPost()) {
          $Repair = model('repair');
          $post_data = \think\Request::instance()->post();
//          var_dump($post_data);die;
          $post_data['odd_number'] = uniqid();
          //自动验证
          $validate = validate('Article');
          if (!$validate->check($post_data)) {
              return $this->error($validate->getError());
          }
          $data = $Repair->create($post_data);
          if ($data) {
              $this->success('新增成功', url('/home/index'));
              //记录行为
              action_log('update_article', 'repair', $data->id, UID);
          } else {
              $this->error($Repair->getError());
          }

      }else{
         return view('article/add');
      }
        }else{
            $this->error('请登录!','http://www.tp.cc/user/login/index.html');
        }
    }
}
