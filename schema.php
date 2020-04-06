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
		'banners' => "CREATE TABLE  IF NOT EXISTS banners
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			title text,
			link text,
			status enum('Active','Inactive') default 'Active',
			image varchar(100),
			added_by int,
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		
		'advertisement' => "CREATE TABLE  IF NOT EXISTS advertisement
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			link text,
			image varchar(100),
			status enum('Active','Inactive') default 'Active',
			added_by int,
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		'view' => "CREATE TABLE  IF NOT EXISTS view
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			remote_addr text,
			request_url text,
			http_user_agent text,
			logitude text,
			latitude text,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		'video' => "CREATE TABLE  IF NOT EXISTS video
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			link text,
			status enum('Active','Inactive') default 'Active',
			added_by int,
			created_date datetime default current_timestamp,
			updated_date datetime on update current_timestamp
		)",
		"institute" => "CREATE TABLE  IF NOT EXISTS institute
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			Name text,
			abbr varchar(30),
			location varchar(200),
			map text,
			status enum('Active','Inactive') default 'Active',
			ishead enum('Head','Branch'),
			estd varchar(50),
			gmail varchar(50),
			image varchar(100),
			director varchar(50),
			phone varchar(10),
			added_by int,
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		
		"enquiry" => "CREATE TABLE  IF NOT EXISTS enquiry
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			name varchar(50),
			email varchar(50),
			contact varchar(15),
			courses varchar(50),
			message text,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		
		"contact" => "CREATE TABLE  IF NOT EXISTS contact
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			name varchar(50),
			email varchar(50),
			subject varchar(50),
			message text,
			web varchar(50),
			contact varchar(15),
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		
		"notice" => "CREATE TABLE  IF NOT EXISTS notice
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			notice text,
			image varchar(50),
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		"category" => "CREATE TABLE  IF NOT EXISTS categories
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			name varchar(50),
			isparent enum('parent','child') default 'parent',
			show_in_menu enum('show','hide') default 'show',
			parentId int default 0,
			added_by int,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		"subscriber" => "CREATE TABLE  IF NOT EXISTS subscriber
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			email varchar(50),
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)",
		
		"mail" => "CREATE TABLE  IF NOT EXISTS mail
		(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			notice_id int,
			subscriber_id int,
			status enum('Active','Inactive') default 'Active',
			created_date datetime default current_timestamp,
			updated_date datetime on UPDATE current_timestamp
		)"
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