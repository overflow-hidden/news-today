<?php


class Page{

//    连接数据库
    public $pdo;
    public function __construct()
    {
        $db = array(
            'dsn' => 'mysql:host=localhost;dbname=wui1805;port=3306;charset=utf8',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        try{
            $this->pdo= new PDO($db['dsn'], $db['username'], $db['password'], $options);
        }catch(PDOException $e){
            die('数据库连接失败:'.$e->getMessage());
        }
    }

//    推荐
    public function recommend(){
        include("HTML/recommend.html");
    }
//    视屏
    public function video(){
        include("HTML/video.html");

    }
    public function xinwen(){
        include("HTML/xinwen.html");

    }
    public  function  actionview(){
        $stmt = $this->pdo->query('select * from news');
        $rows = $stmt->fetchAll();//返回值是一个数组
        include("HTML/xinwen.html");
    }
}

$page =new Page();
//echo $mathed;
if (isset($_GET["r"])){
    $mathed=$_GET['r'];
}else{
    $mathed='actionview';
}
$page->$mathed();




//
//echo "<pre>";
//var_dump($_SERVER);
//$_SERVER['REQUEST_URI'];可以获取到本页面的本地地址
//echo "</pre>";