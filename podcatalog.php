<?php 
include_once('header.php')
?>

		<main class="page">

			<div class="_container">

				<div class="catalog">

				<?php 
					$id_catalog = $_GET['id_catalog'];
					require('connect.php');

					$stmt_catalog_name = $mysqli->prepare("SELECT название FROM каталог WHERE id_каталог = ?");
					$stmt_catalog_name->bind_param("i", $id_catalog);
					$stmt_catalog_name->execute();
					$stmt_catalog_name->bind_result($catalog_name);
					$stmt_catalog_name->fetch();
					$stmt_catalog_name->close();

				?>
					<h2 class="header-block__title">
						<?php print $catalog_name;?>
					</h2>
					<a href="catalog.php" class="back-btn">назад</a>
					<div class="catalog__container">

					
					<?php
					

						$query = "SELECT id_подкаталог, название, FK_каталог, обложка, путь FROM подкаталог WHERE FK_каталог = ".$id_catalog;
						$result = $mysqli -> query($query);

						while ($row = $result->fetch_assoc()) {

							$query2 = "SELECT COUNT(*) AS count FROM товары WHERE FK_подкаталог=".$row['id_подкаталог'];
							$result2 = $mysqli->query($query2) or die("Не могу выполнить запрос1!");
							$row2 = $result2->fetch_assoc();
							
					?>

						<a href="products.php?id_c=<?php print $id_catalog?>&id_pc=<?php print $row["id_подкаталог"];?>" class="catalog__card">
							<div class="card__info">
								<div class="card-name"><?php print $row["название"];?></div>
								<div class="card-count"><?php print $row2["count"];?> товаров</div>
							</div>
							<img class="catalogImg" src="img/products/<?php print $row["путь"];?>/<?php print $row["обложка"];?>" alt="">

						</a>

						<?php		
							}
							$mysqli->close();
						?>

					</div>
				</div>


			</div>

		</main>

		<?php
		
		include_once('footer.php');
		include_once('popups.php');
		?>