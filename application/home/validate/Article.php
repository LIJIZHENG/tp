<?php
namespace app\home\validate;
use think\Validate;
class Article extends Validate{
    protected $rule = [
        ['username', 'require', '报修人不能为空!'],
        ['tel', 'require', '电话号码不能为空!'],
        ['address', 'require', '地址不能为空!'],
        ['reason', 'require', '报修原因不能为空!'],
    ];
}
