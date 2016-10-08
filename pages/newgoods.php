<!-- <h2>New goods</h2> -->
<?php
// include_once('pages/classes.php');
?>
<div class="container">
	<div class="row">
		<?php
			echo'<form action="index.php?id=4" method="POST">';
			echo'<div class="formgroup">';
			echo'<label for="groupid">Select Group</label>';
			echo '<select name="groupid">';
			$pdo=Tools::connect('localhost', 'root','123456','08948shop');
			$res=$pdo->query('select * from groups');
				while($row = $res->fetch())
				{
					echo '<option value="'.$row['id'].'">'.$row['groupname'].'</option>';
				}


			echo '</select>';
			echo'</div>';

			echo '<div class="form-group">';
			echo'<label for="product">Product Name</label>';
			echo'<input type="text" name="product"/>';
			echo'</div>';

			echo '<div class="form-group">';
			echo'<label for="country">Maker</label>';
			echo'<input type="text" name="country"/>';
			echo'</div>';

			echo '<div class="form-group">';
			echo'<label for="price">Product Price</label>';
			echo'<input type="text" name="price"/>';
			echo'</div>';

			echo '<div class="form-group">';
			echo'<label for="info">Product info</label>';
			echo'<input type="text" name="info"/>';
			echo'</div>';

			echo '<div class="form-group">';
			echo'<label for="submit">addproduct</label>';
			echo'<input type="submit" name="addproduct"/>';
			echo'</div>';

			echo '</form>';

		if (isset($_POST['addproduct']))
		{
			$product=trim(htmlspecialchars($_POST['product']));
			$country=trim(htmlspecialchars($_POST['country']));
			$info=trim(htmlspecialchars($_POST['info']));
			if(empty($product)) return;
			$ins='insert into products (groupid, product, country, price, discount, info, datein) values 
		('.$_POST['groupid'].',"'.$product.'","'.$country.'",'.$_POST['$price'].', 
		0,"'.$info.'","'.@date('Y/m/d').'")';
		
		$pdo=Tools::connect('localhost', 'root','123456','08948shop');
		$pdo->query($ins);

		}

// Laki

// /echo '</div>';
	echo '<hr>';
	echo '<div class="row-fluid">';
		echo '<form class="form-inline" action="index.php?id=4" method="post" enctype="multipart/form-data">';
			echo '<div class="form-group">';
				echo '<label for="productid">Select product:&nbsp</label>';
					echo '<select name="productid">';
						$pdo=Tools::connect('localhost', 'root', '123456','08948shop');
						$resault=$pdo->query('select gr.groupname, pr.product, pr.id
											from groups gr, products pr
											where pr.groupid=gr.id');
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
				$product_id= $_POST['productid'];
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
?>
	<div class="row">
		<?php

		?>

	</div> 
	<div class="row">
		<?php

		?>

	</div> 
</div> 

