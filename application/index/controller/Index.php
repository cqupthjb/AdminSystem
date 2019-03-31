<?php
namespace app\index\controller;
// date_default_timezone_set('PRC');
class Index extends \think\Controller{
    public function index(){
        dump(\think\Config::get());
    }
    public function hello($name){
        if($name == 'hjb'){
            $this->success('验证成功！正在跳转页面...', 'login/ok');
        }else{
            $this->error('验证失败!正在返回登录界面 ...', 'login/login');
        }
    }
    public function test(){
        return date("Ymd");
    }
}