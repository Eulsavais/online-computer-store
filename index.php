<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>compTech</title>
</head>

<body>
	
		<?php
			include('header.php')
		?>

		<main class="page">
			<section class="page__main-block main-block">
				<div class="main-block__container _container">
					<div class="main-block__body">
						<h1 class="main-block__title">
							Магазин компьютерной техники
						</h1>
						<div class="main-block__text">
							Наша цель изменить жизнь людей, сделав простым доступ к огромному количеству качественных и недорогих
							товаров, предоставляя лучший сервис
						</div>
						<div class="main-block__buttons">
							<a href="catalog.php" class="main-block__button">Перейти в каталог</a>
				
						</div>
					</div>
				</div>
				<div class="main-block__image _ibg">
					<img src="img/mainblock/cover.jpg" alt="img">
				</div>
			</section>

			<section class="page__services services">
				<div class="services__container _container">
					<div class="services_body">
						<div class="services__column">
							<div class="services__item item-service">
								<div class="item-service__icon">
									<img src="img/services/01.svg" alt="s1">
								</div>
								<div class="item-service__title">Собственная курьерская служба</div>
								<div class="item-service__text">Парк автомобилей CompTech и отлаженная логистика.</div>
							</div>
						</div>
						<div class="services__column">
							<div class="services__item item-service">
								<div class="item-service__icon">
									<img src="img/services/02.svg" alt="s1">
								</div>
								<div class="item-service__title">Качественные товары</div>
								<div class="item-service__text">Мы работаем только с проверенными производителями</div>
							</div>
						</div>
						<div class="services__column">
							<div class="services__item item-service item-service_green">
								<div class="item-service__icon">
									<img src="img/services/03.svg" alt="s1">
								</div>
								<div class="item-service__title">Широкий ассортимент</div>
								<div class="item-service__text">Понятный и интуитивный интерфейс сайта. Представлены как новинки, так и проверенные временем товары</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="advantages">
				<div class="advatages__container _container">
					<div class="advatages__header header-block">
						<h2 class="header-block__title">
							Будьте с нами!
						</h2>
						<div class="header-block__subtitle">
							Более 20 лет успешной работы. <br> Главные ценности: нам доверяют, к нам возвращаются, нас советуют друзьям.
					</div>
					<div class="advatages__body">
						<div class="advatages__column">
							<div class="advatages__item">
								<div class="advatages__icon">
									<img src="img/advatages/01.svg" alt="a01">
								</div>
								<div class="advatages__value">4500 +</div>
								<div class="advatages__text">Пунктов выдачи заказов</div>
							</div>
						</div>
						<div class="advatages__column">
							<div class="advatages__item">
								<div class="advatages__icon">
									<img src="img/advatages/02.svg" alt="a01">
								</div>
								<div class="advatages__value">20000 +</div>
								<div class="advatages__text">Населенных пунктов </div>
							</div>
						</div>
						<div class="advatages__column">
							<div class="advatages__item">
								<div class="advatages__icon">
									<img src="img/advatages/03.svg" alt="a01">
								</div>
								<div class="advatages__value">100%</div>
								<div class="advatages__text">Проверенные производители </div>
							</div>
						</div>
						<div class="advatages__column">
							<div class="advatages__item">
								<div class="advatages__icon">
									<img src="img/advatages/04.svg" alt="a01">
								</div>
								<div class="advatages__value">60000 +</div>
								<div class="advatages__text">Различных товаров на складе</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

		<?php
		
		include_once('footer.php');
		include_once('popups.php');
		?>
	
	
</body>
</html>