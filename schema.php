<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'config/init.php';

	$schema = new schema();
	$table = array(
		"users" => "CREATE TABLE  IF NOT EXISTS users
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			username varchar(50),
			email varchar(150),
			password text not null,
			activate_token text,
			password_reset_token text,
			session_token text,
			role enum('Admin','Staff') default 'Staff',
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		"user_unique" => "ALTER TABLE users ADD UNIQUE(email)",
		'alter_user'	=> "ALTER TABLE `users` ADD `last_login` DATETIME NULL DEFAULT NULL AFTER `session_token`, ADD `last_ip` VARCHAR(100) NULL DEFAULT NULL AFTER `last_login`",
		"customer" => "CREATE TABLE  IF NOT EXISTS customers
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			name varchar(50),
			contact varchar(15),
			address varchar(100),
			added_by int,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		"furniture" => "CREATE TABLE  IF NOT EXISTS furnitures
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			furniturename varchar(50),
			saleprice int,
			purchaseprice int,
			added_by int,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		"transaction" => "CREATE TABLE  IF NOT EXISTS transactions
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			customer_id int,
			furniture_id int,
			no_of_piece int,
			accountType enum('Debit','Credit'),
			type enum('sale','purchase'),
			added_by int,
			transaction_date varchar(20),
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		
	);
	foreach ($table as $key => $sql) {
		try{
			$success = $schema->create($sql);
			if ($success) {
				echo "<em>Query".$key." Executed Successfully.</em><br>";
			}else{
				echo "<em>Problem while Executing Query ".$key."<br>";
			}
		}catch (PDOException $e){
			error_log(date('M d, Y h:i:s A')." : ( run Query) : ".$e->getMEssage()."\r\n",3,ERROR_PATH.'error.log');
			return false;
		}catch(Exception $e){
			error_log(date('M d, Y h:i:s A')." : ( run Query) : ".$e->getMessage()."\r\n",3,ERROR_PATH.'error.log');
		}
	}