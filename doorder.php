<?php 
session_start();
$username = &$_SESSION["username"];
$user_id = &$_SESSION["user_id"];
$id_cart = $_COOKIE["id_cookies"];


include("connect.php");



if (!isset($username)) {
		header("Location: order.php?success=9");
		exit();
} else {
    $strSQL1 = "SELECT COUNT(*) as count FROM корзина WHERE id_cookies='".$id_cart."'";
    $result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос2!");
    $row = $result1->fetch_assoc();
    
    if ($row["count"] == 0) {
        $message = "корзина пуста";
    } else {
        $order = uniqid("OR");
        $strSQL = "INSERT INTO заказ (id_заказ, date_заказ, FK_покупатель) VALUES ('".$order."', CURDATE(), ".$user_id.")";
        $mysqli->query($strSQL) or die("Не могу выполнить запрос1!");
        
        $strSQL = "SELECT * FROM корзина WHERE id_cookies='".$id_cart."'";
        $result = $mysqli->query($strSQL) or die("Не могу выполнить запрос2!");
        
        while ($row = $result->fetch_assoc()) {
            $strSQL = "INSERT INTO состав_заказа (FK_заказ, FK_товар, количество) VALUES ('".$order."', ".$row["FK_товар"].", ".$row["количество"].")";
            $mysqli->query($strSQL) or die("Не могу выполнить запрос3!");
        }
        
        $strSQL = "DELETE FROM корзина WHERE id_cookies='".$id_cart."'";
        $mysqli->query($strSQL) or die("Не могу выполнить запрос!");
        $uniq_ID = uniqid("ID");
        setcookie("id_cookies", $uniq_ID, time()+60*60*24*14);
				header("Location: cabinet.php?success=11");
				exit();
				
    }
		header("Location: order.php");
		exit();
}
	
?>
