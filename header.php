<?php
header("Cache-control: no-cache");

if(!isset($_COOKIE['id_cookies'])) 
{
// cookie с именем 'usename' еще не установлено, устанавливаем ее
/* задаем значение cookie, определяя для нее уникальный ID для каждого отдального пользователя */
$cookie_value = uniqid("ID");
// создаем cookie с именем 'usename' с установленным уникальным ID
setcookie("id_cookies", $cookie_value, time() + 60*60*24*14); 
}

?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>

<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/form.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:regular,500,600,700,800&display=swap"
		rel="stylesheet" />


<div class="wrapper">
		<header class="header">
			<div class="header__container _container">
				<div class="header__con">
					<a href="index.php" class="header__logo">
						CompTech
					</a>

					<nav class="header__menu menu">
						<ul class="menu__list">

							<li class="menu__item">
								<a href="catalog.php" class="menu__link">Каталог</a>
							</li>
							<li class="menu__item">
								<a href="order.php" class="menu__link">Заказы</a>
							</li>
							<li class="menu__item">
								<a href="#footer" class="menu__link">Контакты</a>
							</li>

						</ul>
					</nav>
<!-- 
					<div class="header__open-menu">
						<div class="burger__menu">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div> -->
				</div>
				<div class="autorize__block">
				<?php
						if (session_status() == PHP_SESSION_NONE) {
								session_start();
						}
							
						if(!isset($_SESSION["user_id"]))
						{
							print '<a href="#popup" class="auto__link popup-link">Войти</a>';
						}
						if(isset($_SESSION["username"]))
						{
							print '<div class="logged username">'.$_SESSION["username"].'</div>';
							print '<a href="cabinet.php" class="logged login__link">Кабинет</a>';
							print '<a href="exit.php" class="auto__link login__link">Выход</a>';
							
						}
						
						require('connect.php');
						$query = "SELECT COUNT(*) as count FROM корзина";
						$result = $mysqli->query($query);
						$row = $result->fetch_assoc();
						$cart_count_sum = 0;

						if ($row['count'] != 0) {
							$query1 = "SELECT количество FROM корзина";
							$result1 = $mysqli->query($query1);

							while ($row1 = $result1->fetch_assoc()) {
								$cart_count_sum += $row1['количество'];
							}
						}


						if ($row['count'] == 0) {
							print '<a href="cart.php"><img class="cart-img" src="img/cart.png"></a>';
						} else {
							print '
						<div class="cart_count_wrapp">
							<div class="cart_count">'.$cart_count_sum.'</div>
							<a href="cart.php"><img class="cart-img" src="img/cart.png"></a>
						</div>';
						}
						 
						
						
					?>
					
					
				</div>
			</div>
		</header>