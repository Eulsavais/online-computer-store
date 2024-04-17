<?php 

require('connect.php');
?>
<?php 
$type = $_GET["type"];
$id_товар = $_GET["id_товар"];
$id_cookies = $_COOKIE["id_cookies"];

// положить в корзину
if($type==1) {
	$strSQL="SELECT * FROM корзина WHERE FK_товар =".$id_товар." AND id_cookies='".$id_cookies."'";
	$result=$mysqli->query($strSQL) or die("Не могу выполнить запрос1!");

	if ($row=$result->fetch_assoc()) {
		$strSQL="UPDATE корзина SET количество=количество+1 WHERE FK_товар=".$id_товар." AND id_cookies='".$id_cookies."'";
	}	else {
			$strSQL="INSERT INTO корзина (id_cookies, FK_товар, количество, дата_корзины) VALUES ('".$id_cookies."',".$id_товар.",1,CURDATE())";
		}
		$mysqli->query($strSQL);
		
		
		
}

// уменьшить количество
if($type==2) {

	$strSQL="SELECT * FROM корзина WHERE FK_товар=".$id_товар." AND id_cookies='".$id_cookies."'";
	$result=$mysqli->query($strSQL) or die("Не могу выполнить запрос1!"); 

	if ($row=$result->fetch_assoc()) { 
		if ($row["количество"]>1) {
			$strSQL="UPDATE корзина SET количество=количество+-1 WHERE FK_товар=".$id_товар." AND id_cookies='".$id_cookies."'";
		}	else {
			$strSQL="DELETE FROM корзина WHERE FK_товар=".$id_товар." AND id_cookies='".$id_cookies."'";
			}
	}

	$mysqli->query($strSQL);
	header("Location: cart.php");
	exit();

}

// удалить из корзины
if($type==3) {
	$strSQL="DELETE FROM корзина WHERE FK_товар=".$id_товар." AND id_cookies='".$id_cookies."'";
	$mysqli->query($strSQL);

	header("Location: cart.php");
	exit();
}

// очистить корзину
if($type==4) {
	$strSQL="DELETE FROM корзина WHERE id_cookies='".$id_cookies."'";
	$mysqli->query($strSQL);

	header("Location: cart.php");
	exit();
}

?>

<?php
 include("cart.php");
?>
