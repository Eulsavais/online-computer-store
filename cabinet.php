<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_GET['success']) && $_GET['success'] == 1) {
	echo "<script>alert('Данные были успешно изменены!');</script>";
}
if (isset($_GET['success']) && $_GET['success'] == 0) {
	echo "<script>alert('Заполните все поля!');</script>";
}


$username=&$_SESSION["username"];
$user_id=&$_SESSION["user_id"];


if(!isset($username)) 
{
	$success=false;
	echo "<script>alert('Вы не авторизованы!!!')</script>";
} else $success=true;

include_once("header.php"); 

if($success)
{
include("connect.php");
$strSQL="SELECT * FROM пользователи WHERE user_id='".$user_id."'";
$result=$mysqli->query($strSQL) or die("Не могу выполнить запрос!"); 
if($row=$result->fetch_assoc())
{
?>
<main>
<div class="_container">
<div class="personal_cab">
<form action="change.php" method=post>


<table class="personalAccTable">
	<tbody>
		<tr>
			<th colspan="2"><h2>Ваши личные данные</h2></th>
		</tr>
		<tr>
			<th>username:</th>
			<th>E-mail:</th>
		</tr>
		<tr>
			<td><input type=text name=username value="<?php print $row["username"] ?>"></td>
			<td><input type=text name=email value="<?php print $row["email"] ?>"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input class="btn-cart-pa" type="submit" value="сохранить изменения"></td></tr>
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>

<div class="_container">

<h2 align=center>Ваши заказы</h2>

<?php
$strSQL1="SELECT id_заказ, date_заказ FROM заказ WHERE FK_покупатель='".$user_id."' ORDER BY date_заказ DESC";
$result1=$mysqli->query($strSQL1) or die("Не могу выполнить запрос1!"); 
while($row1=$result1->fetch_assoc())
{
$order=$row1["id_заказ"];
$strSQL2="SELECT название, цена, количество, FK_заказ, id_товар FROM товары, состав_заказа WHERE id_товар=FK_товар
and FK_заказ='".$order."'";
$result2=$mysqli->query($strSQL2) or die("Не могу выполнить запрос2!");
?>

<table class="iksweb">
	<tbody>
	<colgroup>
    <col style="width: 30%;">
    <col style="width: 50%;">
    <col style="width: 10%;">
		<col style="width: 10%;">
  </colgroup>
		<tr>
			<th>Заказ №</th>
			<th>Продукт: </th>
			<th>Цена: </th>
			<th>Количество: </th>
		</tr>
	

<?php
$sum=0; while($row2=$result2->fetch_assoc())
{
?>

		<tr>
			<td><?php print $order?> от <?php print $row1["date_заказ"]?></td>
			<td><?php print $row2["название"];?></td>
			<td><?php print $row2["цена"];?></td>
			<td><?php print $row2["количество"];?></td>
		</tr>


<?php $sum=$sum+$row2["цена"]*$row2["количество"];
}

{?>

<?php }
?>
</div>
<tr>
	<td></td>
	<td>ИТОГО: </td>
	<td><?php print $sum;?></td>
	<td></td>
</tr>

</tbody>
</table>



<?php

}
}
mysqli_close($mysqli);
}
echo '
</div>
</main>';
include_once("footer.php");

include("popups.php");

echo '</div>';
?>
