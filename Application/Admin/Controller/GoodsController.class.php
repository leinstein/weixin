<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;

class GoodsController extends AdminController {
    public function showlist(){

        $goods = D('Goods');

         $totalRows = $goods->count();
         $rollPage  = 7;
         $page = new \Think\Page($totalRows,$rollPage);



//        $info = $goods->limit($k,$rollPage)->order('goods_id desc')->select();
        $info = $goods->page($_GET['p'],$rollPage)->order('goods_id desc')->select();
        $pagelist = $page->show();
        $this->assign('pagelist',$pagelist);

//        $info = $goods->where("goods_price > 1000")->select();
//        $info = $goods->where("goods_name like '诺%'")->select();
//        $info = $goods->where("goods_name like '诺%' and goods_price > 1000")->select();
//        $info = $goods->limit(5)->select();
//        $info = $goods->field("goods_name,goods_price")->select();
//          $info = $goods->order("goods_price desc")->select();
//        $info = $goods->field("goods_brand_id,count(*)")->group("goods_brand_id")->select();

//        $info = $goods
//            ->field("goods_name,goods_price")
//            ->limit(3)
//            ->where("goods_name like '诺%'")
//            ->order("goods_price desc")
//            ->select();
//        $info = $goods->where("goods_name like '诺%'")->sum('goods_price');
//        dump($info);
//        $a = $goods->count();
//        $b = $goods->avg('goods_price');
//        $c = $goods->max('goods_price');
//        $d = $goods->min('goods_price');
//        $e = $goods->sum('goods_price');
//        dump($a);
//        dump($b);
//        dump($c);
//        dump($d);
//        dump($e);
        $this->assign('info',$info);


        $this->display();
    }
    public function tianjia(){
        $goods = D('Goods');
        
        if(IS_POST){
            $shuju = I('post.');
            $shuju['goods_create_time'] = time();

            if($_FILES['goods_logo']['error'] == 0){


                $cfg = array(
                    'rootPath'      =>  './Public/Upload/', //保存根路径

                );
                $up = new \Think\Upload($cfg);
                $z = $up->uploadOne($_FILES['goods_logo']);

                $shuju['goods_big_img'] = $up->rootPath.$z['savepath'].$z['savename'];

                $im = new \Think\Image();
                $im -> open($shuju['goods_big_img']);
                $im -> thumb(70,70,6);
                $im -> water('./Public/Upload/1.png');
//                $im -> text('郭襄','__VERIFY__/zhttfs/simfang.ttf', 20,'red');
                $smallPathName = $up->rootPath.$z['savepath'].'small_'.$z['savename'];
                $im->save($smallPathName, null, 800,true);
                $shuju['goods_small_img'] = $smallPathName;
            }



                

            $newid = $goods->add($shuju);
            if($newid){
                $this->success('添加成功',U('showlist'),4);
            }else{
                $this->error('添加失败',U('tianjia'),2);
            }
        }else{
            $this->display();
        }
//        $shuju = array(
//            'goods_name'   =>   '华为荣耀',
//            'goods_price'   =>   '2000',
//            'goods_weight'   =>   '102',
//            'goods_bunber'   =>   '12',
//        );

//        $newid = $goods->add($shuju);
//        $goods->goods_name   =   '小米手机';
//        $goods->goods_price   =   '2500';
//        $goods->goods_weight   =   '106';
//        $goods->goods_bunber   =   '13';
//        $goods->add();
////        dump($newid);
//        $this->display();
    }
    public function upd(){
        $goods = D('goods');
        if(IS_POST){

            $shuju = I('post.');
            $shuju['goods_last_time'] = time();
            

            $newid = $goods->save($shuju);

            if($newid){
                $this->success('修改成功',U('showlist'),4);
            }else{
                $this->error('修改失败',U('upd'),2);
            }
        }else{
            $goods_id = I('get.goods_id');

            $data = $goods->where('goods_id='.$goods_id)->find();

            $this->assign('data',$data);
            
            $this->display();
        }



    }

    public function del(){
        $goods = D('goods');
        $goods_id = I('get.goods_id');
        $res = $goods->where('goods_id='.$goods_id)->delete();
        if($res){
            $this->redirect('admin/goods/showlist');
        }else{
            $this->redirect('admin/goods/showlist');

        }

    }

}