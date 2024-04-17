<?php
$id_cart = $_COOKIE["id_cookies"];

include_once("header.php");
include("connect.php");

$strSQL1 = "SELECT COUNT(*) as count FROM корзина WHERE id_cookies='".$id_cart."'";
$result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос2!");
$row = $result1->fetch_assoc();

if($row["count"]==0) {
?>

<main>
<div class="_container">
	<div class="cart">
		<h2 class="header-block__title">
			Заказы
			<div class="empty_cart" style="text-align: center;">
				Корзина пуста.
			</div>
		</h2>
	</div>
</div>
</main>
<?php
} else {
    $strSQL1 = "SELECT путь, обложка, название, цена, количество, id_cookies, товары.id_товар FROM товары, корзина WHERE товары.id_товар=корзина.FK_товар AND id_cookies='".$id_cart."'";
    $result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос2!");
?>
<main>

<div class="_container">
	<div class="order_con">
		<table class="iksweb">
			<tbody>
				<tr>
					<th> </th>
					<th>Продукт: </th>
					<th>Цена: </th>
					<th>Количество: </th>
				</tr>

				<?php
						$sum = 0;
						while($row = $result1->fetch_assoc()) {
				?>
				<tr>
					<td><img class='mini-product-img' src="img/products/<?php print $row["путь"];?>/<?php print $row["обложка"];?>"></td>
					<td><?php print $row["название"];?></td>
					<td><?php print $row["цена"].' ₽'?></td>
					<td><?php print $row["количество"];?></td>
				</tr>
				<?php
								$sum = $sum + $row["цена"] * $row["количество"];
						}
				?>
				<tr>
					<td t></td>
					<td>ИТОГО: </td>
					<td><?php print $sum.' ₽'?></td>
					<td></td>
				</tr>
			</tbody>

		</table>

		<form action="doorder.php" method=post >  
			<center><input class="neartable-btn" type=submit value="отправить"></center>
		</form>
		</div>
		</div>
</main>	
<?php
}
include_once("footer.php");
include("popups.php")
?>