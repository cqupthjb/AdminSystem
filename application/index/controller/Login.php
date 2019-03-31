<?php
namespace app\index\controller;
class Login extends \think\Controller{
    public function ok(){
        return '欢迎来到后台管理界面！';
    }
    public function login(){
        return '登录界面！';
    }
}