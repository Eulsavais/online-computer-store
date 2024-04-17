<?php 
include_once('header.php');
?>

		<main class="page">

			<div class="_container">

				<div class="catalog">
					<h2 class="header-block__title">
						Каталог
					</h2>
					<div class="catalog__container">

						<?php 
						
							require('connect.php');


							$query = "SELECT id_каталог, название, обложка FROM каталог";
							$result = $mysqli->query($query);

							while ($row = $result->fetch_assoc()) {

							$query2 = "SELECT COUNT(*) AS count FROM товары WHERE FK_каталог=".$row['id_каталог'];
							$result2 = $mysqli->query($query2) or die("Не могу выполнить запрос1!");
							$row2 = $result2->fetch_assoc();
						?>

							<a href="podcatalog.php?id_catalog=<?php print $row["id_каталог"];?>" class="catalog__card">
								<div class="card__info">
									<div class="card_row">
										<div class="card-name"><?php print $row["название"];?></div>
										<div class="card-count"><?php print $row2['count'];?> товаров</div>
									</div>
								</div>
								<img class="catalogImg" src="img/products/catalog/<?php print $row["обложка"];?>" alt="">
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