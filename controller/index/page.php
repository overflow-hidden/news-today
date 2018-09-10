<?php
include '../core/db.php';

class page extends db{
    public function index(){
        if (isset($_GET['cid'])){
            $cid = $_GET['cid'];
        }else{
            $cid = 1 ;
        }
//分类
        $array= $this->pdo
            ->query('select * from news_category where is_default = "1"')
            ->fetchAll();

//总条数
        $num = $this->pdo
            ->query('select count(*) as total from news where cid='.$cid)
            ->fetch()['total'];
//总页数
        $page_total=ceil($num/2);
//新闻
        $course= $this->pdo
            ->query('select * from news where cid = '.$cid )
            ->fetchAll();

        include '../views/index/index.html';
    }
    public function category(){
        $category = $this->pdo
            ->query('select * from category where is_default="1"')
            ->fetchAll();
        $bottom = $this->pdo
            ->query('select * from category where is_default="0"')
            ->fetchAll();

        include '../views/index/category.html';
    }
    public function search(){

        include '../views/index/search.html';
    }
    public function add(){
        $top = $this->pdo
            ->query('select * from news_category where is_default="1"')
            ->fetchAll();
        $bottom = $this->pdo
                ->query('select * from news_category where is_default="0"')
            ->fetchAll();
        include '../views/index/channel.html';
    }
    public function channellist(){
        $this->pdo->query("update news_category set is_default=".$_GET['cid']." where id= ".$_GET['id']);
    }
}



