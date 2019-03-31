<?php
namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;
class Test extends Controller{
    public function index(){
        $this->db = new Sysdb;
        //         $res = $this->db->table('admin')->where(array('id'=>1))->lists();'username'=>$username
        $res1 = $this->db->table('admin')->where(array('id'=>1))->item();
        $res2 = $this->db->table('admin')->field('id,username')->lists();
        $res3 = $this->db->table('admin')->field('id,username')->cates('id');
        dump($res1);
        echo '<hr>';
        dump($res2);
        echo '<hr>';
        dump($res3);
        
    }
}