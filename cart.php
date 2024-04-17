<?php
		
	include_once('header.php');
	include('connect.php');

	$id_cookies = $_COOKIE["id_cookies"];
	
	$strSQL1 = "SELECT COUNT(*) as count FROM корзина WHERE id_cookies='".$id_cookies."'"; 
	$result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос1!");
	$row = $result1->fetch_assoc(); 

?>

		<main class="page cart-page">

			<div class="_container">

				<div class="cart">
					<h2 class="header-block__title">
						Корзина

					</h2>
					
				<?php if($row["count"] == 0) { ?>
					<div class="empty_cart">
						 Ваша корзина пуста!					
					</div>
				<?php
				} else {
					$strSQL1 = "SELECT id_товар, название, FK_каталог, FK_подкаталог, описание, цена, обложка, путь, количество, id_cookies FROM товары, корзина WHERE id_товар=FK_товар AND id_cookies='".$id_cookies."'";
					$result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос2!");
				
					
					echo '<div class="cart__container">';

					$sum = 0; 
					while($row = $result1->fetch_assoc()) {
					echo '<div class="cart__card ">
					<div class="underline"></div>
					<div class="cart_img_con">
						<img class="cart__card_img" src="img/products/'.$row['путь'].'/'.$row['обложка'].'" alt="">
					</div>

					<div class="cart__card_about ">
						<div class="card_text ">
							<div class="cart__card_about-title">'.$row['название'].'</div>
							<div class="cart__card_about-subtitle">'.$row['описание'].'</div>
						</div>

						<div class="cart_details">
							<div class="counter-wrapper">
								<a href="docart.php?type=2&id_товар='.$row["id_товар"].'" class="items__control">-</a>
								<div class="items__current">'.$row['количество'].'</div>
								<a href="docart.php?type=1&id_товар='.$row["id_товар"].'" class="items__control">+</a>
							</div>

							<div class="cart_details-price ">'.$row['цена']*$row['количество'].' P</div>

							<a href="docart.php?type=3&id_товар='.$row["id_товар"].'"> <ion-icon class="delete_btn" name="trash-outline"></ion-icon></a>

						</div>
					</div>

				</div>';
					
					}
					echo '
					<div class="checout">
						<a href="order.php" class="checout-btn">Оформить заказ</a>
						<a href="docart.php?type=4" class="clear_all-btn">Очистить корзину</a>		
					</div>
					';
				}
		?>
						
	
					</div>

					
				</div>

			
			</div>

		</main>
		<?php
				include_once('footer.php');
			include_once('popups.php');

		
		?>