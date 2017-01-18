CREATE TABLE IF NOT EXISTS `CTF`.`challenges` (
	`chal_id` int(11) NOT NULL AUTO_INCREMENT,
	`chal_name` varchar(64) NOT NULL,
	`chal_points` int(11) NOT NULL,
	`chal_flag` varchar(64),
	PRIMARY KEY (`chal_id`)
);
