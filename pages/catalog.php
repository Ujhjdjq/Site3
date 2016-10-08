<?php
foreach ($_REQUEST as $k=>$v)
{
	if(substr($k,0,4)=='into')
	{
		$btnid=substr($k, 4);
		// echo $btnid;
		setcookie('cart'.$btnid, $btnid);
	}
}

echo '<form action="index.php?id=1" method="post">';
$pdo=Tools::connect('localhost', 'root', '123456','08948shop');
echo '<p>';
$res=$pdo->query('select * from groups');
echo '<select name="groupid">';
while ($row=$res->fetch())
{
	echo '<option value='.$row['id'].'>'.
	$row ['groupname'].'</option>';
}


echo '</select>';
echo '</p>';
$sel='select id from products';

$res=$pdo->query($sel);
while($row=$res->fetch())
{
	$product=Product::fromDB($row['id']);
	$product->draw();
}

echo '</form>';



?>