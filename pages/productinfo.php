<?php
include_once ("classes.php");
$pid=$_REQUEST['pid'];
$pdo=Tools::Connect('localhost', 'root', '123456','08948shop');
$sel='select * from products where id=?';
$res=$pdo->prepare($sel);
$res->execute(array($pid));
$row=$res->fetch();
echo '<p>Цена товара:'.$row['price'].'</p>';

/*
'select * from products where id='.pid

'select imagepath from images where productid='.pid



$p=Product::fromDB($pid);
$p->draw();

*/

?>