<?php
// PDO работа с базой данных через ООП

class Tools
{
	static function connect($host,$user,$pass,$dbname)
	{
		$dsn= 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8;'; // первый строковый параметр, все без пробелов
		$option= array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8');
		// 4 параметр настройки работы с PDO если возникла ошибка указывай на исключительную ситуацию,
		// создаем ассоциативный массив 
		// третий указанте на работу с кирилицей
		
		$pdo= new PDO($dsn, $user, $pass, $option);
		return $pdo;
	}
	static function createTable($query)
	{
		$pdo= Tools::connect('localhost', 'root','123456','08948shop');
		$pdo->query($query);
	}
}
class Product
{
	private $id, $groupid, $country, $product, $price, $discount, $info, $datein;

	function __construct($groupid, $country, $product, $price=0, $info="", $id=0)
	{
		$this->groupid=$groupid;
		$this->country=$country;
		$this->product=$product;
		$this->price=$price;
		$this->info=$info;
		$this->id=$id;
		$this->discount=0;
		$this->datein=@date("Y/m/d");
	}

	function intoDB()
	{
		$ins='insert into products (groupid, product, country, price, discount, info, datein) values 
		('.$this->groupid.',"'.$this->product.'","'.$this->country.'",'.$this->price.', 
		'.$this->discount.',"'.$this->info.'","'.$this->datein.'")';
		
		$pdo=Tools::connect('localhost', 'root','123456','08948shop');
		$pdo->query($ins);
	}
	static function fromDB($id)
	{
		$pdo= Tools::connect('localhost', 'root','123456','08948shop');
		// $p=Product
		$sel='select * from products where id=?';
		$res=$pdo->prepare($sel);
		$res->execute(array($id));
		$groupid='';
		$country='';
		$product='';
		$price='';
		$info='';
		$id='';
		
		foreach ($res as $v)
		{
			$groupid=$v['groupid'];
			$country=$v['country'];
			$product=$v['product'];
			$price=$v['price'];
			$info=$v['info'];
			$id=$v['id'];

		}

		$product = new Product($groupid, $country, $product, $price, $info, $id);
		return $product;
	}
	
	function draw()
	{
		echo '<div class="product">';
		echo '<p class="ptitle">'.$this->product.'</p>';
		$pdo= Tools::connect('localhost', 'root','123456','08948shop');
		$res=$pdo->prepare('select * from images where productid=?');
		$res->execute(array($this->id));
		foreach($res as $v)
		{
			echo '<img src="'.$v['imagepath'].'" width = 200px alt="picture"/>';
			break;
		}


		echo '<p><span>'.$this->country
			.'</span><span class="pprice">'.$this->price
			.'</span></p>';
		echo '<div class="pinfo">'.$this->info.'</div>';
		echo '<a target="_blanc" href="pages/productinfo.php?pid='.
		$this->id.'">Подробнее</a>';
		echo '<button type="submit" name="into'.$this->id.'" class="btn btn-success btn-xs"> Add to Cart</button>';

		echo '</div>';
	}
	function forCart($id)
	{
		$pdo= Tools::connect('localhost', 'root','123456','08948shop');
		$sel='select * from products where id=?';
		$res=$pdo->prepare($sel);
		$res->execute(array($id));
		echo '<div>';
		foreach ($res as $v)
		{

			echo $v['product'];
			echo $v['price'];
			echo '<a href="pages/productinfo.php?pid='.$v['id'].'" target="_blanc">info</a>';
		}

		$res=$pdo->prepare('select * from images where productid=?');
		$res->execute(array($this->id));
		foreach ($res as $v)
		{
			echo '<img src="'.$v['imagepath'].'" width"50px" alt="picture"/>';
			break;
		}
		echo '<button type="submit" class"btn btn-danger" name="del"'.$id.' >X</button>';
		echo '</div>';


	}
}

?>