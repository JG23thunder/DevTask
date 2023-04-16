<?php 

class m0001_initial
{
	public function up()
	{
		$db = \App\Core\Application::$app->db;
		
		$sql = "CREATE TABLE users(
					id int PRIMARY KEY AUTO_INCREMENT,
					firstname varchar(255) NOT NULL,
					lastname varchar(255) NOT NULL,
					email varchar(255) NOT NULL,
					password varchar(255) NOT NULL,
					status TINYINT NOT NULL,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

				) ENGINE=INNODB";

		$db->pdo->exec($sql);
	}

	public function down()
	{	
		$db = \App\Core\Application::$app->db;
		
		$sql = "DROP TABLE users;";

		$db->pdo->exec($sql);
	}	
}