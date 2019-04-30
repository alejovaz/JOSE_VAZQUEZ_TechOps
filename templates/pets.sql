CREATE TABLE `pets` (
	`name` VARCHAR(40) NOT NULL,
	`favorite_color` VARCHAR(40) NOT NULL,
	`cat_dog` VARCHAR(10) NOT NULL DEFAULT 'dog',
	UNIQUE KEY `name` (`name`) USING BTREE,
	PRIMARY KEY (`name`)
) ENGINE=InnoDB;
