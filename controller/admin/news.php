<?php
include '../core/db.php';

class news extends db{
    public function index(){
        echo '这是首页';
    }
    public function delete(){
        $this->pdo->query("delete from  news where id = ".$_GET['id']);
    }
    public  function  update(){
        $stmt = $this->pdo->prepare("update news set  ". $_GET['k'] ."= ? where id =?");
        $stmt->bindValue(1, $_GET['v']);
        $stmt->bindValue(2, $_GET['id']);
        echo $stmt->execute();
    }
    public function insert(){
        $stmt = $this->pdo->prepare("insert into news(cid,title,dsc,image,url,create_time,content)values(?,?,?,?,?,?,?)");
        $stmt->bindValue(1, '');
        $stmt->bindValue(2, '');
        $stmt->bindValue(3, '');
        $stmt->bindValue(4, '');
        $stmt->bindValue(5, '');
        $stmt->bindValue(6, '');
        $stmt->bindValue(7, '');
        echo $stmt->execute();
    }

}