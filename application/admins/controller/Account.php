<?php 
namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;
/*  
 * 
 * */

class Account extends Controller{
    public function login(){
        return $this->fetch();
    }
    //管理员登录
    public function dologin(){
        $username = trim(input('post.username'));
        $pwd = trim(input('post.pwd'));
        $verifycode = trim(input('post.verifycode'));
        if($username == ''){
            exit(json_encode(array('code'=>1, 'msg'=>'用户名不能为空')));
        }
        if($pwd == ''){
            exit(json_encode(array('code'=>1, 'msg'=>'密码不能为空')));
        }
        if($verifycode == ''){
            exit(json_encode(array('code'=>1, 'msg'=>'请输入验证码')));
        }
        //验证验证码
        if(!captcha_check($verifycode)){
            exit(json_encode(array('code'=>1, 'msg'=>'验证码错误')));
        }
        //验证用户
        $this->db = new Sysdb;
        $admin = $this->db->table('admin')->where(array('username'=>$username))->item();
        if($admin['username'] != $username){
            exit(json_encode(array('code'=>1, 'msg'=>'用户不存在')));
        }
        if(md5($admin['username'].$pwd) != $admin['password']){
            exit(json_encode(array('code'=>1, 'msg'=>'密码错误')));
        }
        if($admin['status'] == 1){
            exit(json_encode(array('code'=>1, 'msg'=>'该用户已被禁用')));
        }
        //设置session
        session('admin', $admin);
        exit(json_encode(array('code'=>0, 'msg'=>'登录成功,正在跳转后台管理系统...')));
    }
    //退出后台系统
    public function logout(){
        session('admin', null);
        exit(json_encode(array('code'=>0, 'msg'=>'退出成功，正在跳转登录界面...')));
    }
}