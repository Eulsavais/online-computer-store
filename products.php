<?php 
	require_once('header.php');
?>

		<main class="page">

			<div class="_container">

				<?php
			
					$id_pc = $_GET['id_pc'];
					$catalog_id = $_GET['id_c'];
					require('connect.php');

					$stmt_pc_name = $mysqli->prepare("SELECT название FROM подкаталог WHERE id_подкаталог = ?");
					$stmt_pc_name->bind_param("i", $id_pc);
					$stmt_pc_name->execute();
					$stmt_pc_name->bind_result($pc_name);
					$stmt_pc_name->fetch();
					$stmt_pc_name->close();

				?>
				<div class="items_">
			
					<h2 class="header-block__title">
						<?php print $pc_name;?>
					</h2>
					<a href="podcatalog.php?id_catalog=<?php print $catalog_id?>" class="back-btn">назад</a>
					<div class="items__container">

						<?php
						
							$query = "SELECT id_товар, название, FK_каталог, FK_подкаталог, описание, цена, обложка, путь FROM товары WHERE FK_каталог = ? and FK_подкаталог = ?";
							$stmt = $mysqli->prepare($query);
							$stmt->bind_param("ii", $catalog_id, $id_pc);
							$stmt->execute();
							$result = $stmt->get_result();

							while ($row = $result->fetch_assoc()) {

						?>

						<div class="items__card">
							<div class="item_card_wrapper">
								<div class="items_img_container">
									<img class="items__card_img" src="img/products/<?php print $row["путь"];?>/<?php print $row["обложка"];?>" alt="">
								</div>
								<div class="items__card_about">
									<div class="items__card_about-title"><?php print $row["название"];?></div>
									<div class="items__card_about-subtitle"><?php print $row["описание"];?></div>
								</div>
							</div>
							<div class="items__card_cart">
								<div class="items__card_cart-price"><?php print $row["цена"];?> P</div>
								<a href="docart.php?type=1&id_товар=<?php print $row["id_товар"];?>" class="items__card_cart-btn">в корзину</a>
							</div>
						</div>

						<?php
							}
						?>

							<!-- <div class="items__card">
								<div class="items_img_container">
									<img class="items__card_img" src="img/products/complect/ssd.webp" alt="">
								</div>
								<div class="items__card_about">
									<div class="items__card_about-title">Накопитель SSD 500Gb Samsung 870 EVO (MZ-77E500BW)</div>
									<div class="items__card_about-subtitle">внутренний SSD, 2.5", 500 Гб, SATA-III, чтение: 560 МБ/сек,
										запись: 530 МБ/сек, TLC</div>
								</div>
								<div class="items__card_cart">
									<div class="items__card_cart-price">6460 P</div>
									<a href="#!" class="items__card_cart-btn">в корзину</a>
								</div>
							</div> -->
					</div>
				</div>


			</div>

		</main>

<?php

	require_once('footer.php');
	require('popups.php');
?>
