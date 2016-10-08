
<?php

echo '<div class="container-fluid">';
echo '<h2>New goods</h2>';
	echo '<div class="row-fluid">';
		echo '<form action="index.php?id=4" method="post">';
			echo '<div class="form-group">';
				echo '<label for="group_id">Select group:&nbsp</label>';
					echo '<select name="group_id">';
						$pdo=Tools::connect('localhost', 'mysql', 'mysql','lakishop');
						$resault=$pdo->query('select *from groups');
						while($row = $resault->fetch())
						{
							echo '<option value="'.$row['id'].'">'.$row['groupname'].'</option>';
						}
					echo '</select>';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<label for="product">Product</label>';
				echo '<input class="form-control" type="text" name="product" placeholder="write new product">';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<label for="country">Country</label>';
				echo '<input class="form-control" type="text" name="country" placeholder="manufacturer country">';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<label for="pricr">Product price</label>';
				echo '<input class="form-control" type="text" name="price" placeholder="price">';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<label for="info">Info</label>';
				echo '<textarea class="form-control" name="info" placeholder="add info"></textarea>';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<input class="btn btn-warning" type="reset" name="reset" value="Reset">';
				echo '<input class="btn btn-primary" type="submit" name="addproduct" value="Add">';
			echo '</div>';
		echo '</form>';
		if(isset($_POST['addproduct']))
		{
			$product=trim(htmlspecialchars($_POST['product']));
			$country=trim(htmlspecialchars($_POST['country']));
			$info=trim(htmlspecialchars($_POST['info']));
			if(empty($product)) return;
			$insert='insert into Products(group_id, product, country, price, discount, info, datein)
			 values('.$_POST['group_id'].',"'.$product.'", "'.$country.'", '.$_POST['price'].', 0, "'.$info.'", "'.@date('Y/m/d').'")';
			$pdo->query($insert);
		}

	echo '</div>';
	echo '<hr>';
	echo '<div class="row-fluid">';
		echo '<form class="form-inline" action="index.php?id=4" method="post" enctype="multipart/form-data">';
			echo '<div class="form-group">';
				echo '<label for="product_id">Select product:&nbsp</label>';
					echo '<select name="product_id">';
						$pdo=Tools::connect('localhost', 'mysql', 'mysql','lakishop');
						$resault=$pdo->query('select gr.groupname, pr.product, pr.id
											from groups gr, products pr
											where pr.group_id=gr.id');
						while($row = $resault->fetch())
						{
							echo '<option value="'.$row['id'].'">'.$row['groupname']." ".$row['product'].'</option>';
						}
					echo '</select>';
			echo '</div>';
			echo '<div class="form-group">';
				echo '<input class="form-group" type="file" name="file[]" multiple="multiple" accept="image/*">';
// загрузка картинок по несколько штук file[]
// accept="image/*" указывает что можно добовлять графические файлы
				echo '<input class="btn btn-primary" type="submit" name="addimg" value="add image">';
			echo '</div>';
		echo '</form>';
// загрузка картинок по несколько штук
		if(isset($_POST['addimg']))
			{
				$path= "image/";
				$count = 0;
				$product_id= $_POST['product_id'];
				foreach ($_FILES['file']['name'] as $key => $value)
				{
					if($_FILES['file']['error'][$key] >0) continue; // если во втором файле ошибка идем дальше
					if(move_uploaded_file($_FILES['file']['tmp_name'][$key], $path.$value))
					{
						$count ++;
						$ins= 'insert into images(product_id, imagepath) values('.$product_id.', "'.$path.$value.'")';
			 			//заполняем БД images
						$pdo->query($ins);
					}
				}
			}
			echo '</div>';
			echo '<div class="row-fluid">';

			echo '</div>';
echo '</div>';
echo'<div>';
echo '</div>';

?>