<?php 

class m0003_products
{
	public function up()
	{
		$db = \App\Core\Application::$app->db;
		
		$sql = "CREATE TABLE products(
					id int PRIMARY KEY AUTO_INCREMENT,
					sku varchar(255) UNIQUE NOT NULL,
					name varchar(255) NOT NULL,
					price double NOT NULL,
				 	type varchar(50) NOT NULL,
				 	size double NULL,
				 	height double NULL,
				 	length double NULL,
				 	width double NULL,
				 	weight double NULL,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

				) ENGINE=INNODB";

		$db->pdo->exec($sql);
	}

	public function down()
	{
		$db = \App\Core\Application::$app->db;
		
		$sql = "DROP TABLE products;";

		$db->pdo->exec($sql);
	}
}