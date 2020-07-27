use talhaBank;
CREATE TABLE IF NOT EXISTS `talhabank`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `person_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_name` (`user_name` ASC) ,
  UNIQUE INDEX `email` (`email` ASC) ,
  INDEX `person_id` (`person_id` ASC) ,
  UNIQUE INDEX `person_id_UNIQUE` (`person_id` ASC) ,
  CONSTRAINT `users_ibfk_1`
    FOREIGN KEY (`person_id`)
    REFERENCES `talhabank`.`person` (`id`))
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4