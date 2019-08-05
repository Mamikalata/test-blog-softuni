CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL,
	`password_hash` VARCHAR(100) NULL DEFAULT NULL,
	`full_name` VARCHAR(200) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `username_UNIQUE` (`username`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=11
;

CREATE TABLE `posts` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(300) NOT NULL,
	`content` TEXT NOT NULL,
	`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `fk_users_posts_idx` (`user_id`),
	CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
;