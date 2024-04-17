<?php
session_start();

require('connect.php');

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Подготовка запроса
$stmt = $mysqli->prepare("SELECT user_id, username, password FROM пользователи WHERE email = ?");
$stmt->bind_param("s", $email);

// Выполнение запроса
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Пользователь найден, проверка пароля
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Пароль верный, сохранение данных в сессии
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
				
				header("Location: index.php?success=0");
				exit();

    } else {
			// неправильный пароль
				header("Location: index.php?success=2");
				exit();
    }
} else {
    // пользователь не найден
		header("Location: index.php?success=1");
		exit();
}

// Закрытие соединения
$stmt->close();
$mysqli->close();
?>
