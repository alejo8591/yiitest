SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `trackman` ;
CREATE SCHEMA IF NOT EXISTS `trackman`;
USE `trackman` ;

-- -----------------------------------------------------
-- Table `trackman`.`tbl_project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trackman`.`tbl_project` ;

CREATE  TABLE IF NOT EXISTS `trackman`.`tbl_project` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NULL DEFAULT NULL ,
  `description` TEXT NULL DEFAULT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL ,
  `create_user_id` INT NULL DEFAULT NULL ,
  `update_time` DATETIME NULL DEFAULT NULL ,
  `update_user_id` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `trackman`.`tbl_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trackman`.`tbl_user` ;

CREATE  TABLE IF NOT EXISTS `trackman`.`tbl_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(256) NOT NULL ,
  `username` VARCHAR(256) NULL DEFAULT NULL ,
  `password` VARCHAR(256) NULL DEFAULT NULL ,
  `last_login_time` DATETIME NULL DEFAULT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL ,
  `create_user_id` INT NULL DEFAULT NULL ,
  `update_time` DATETIME NULL DEFAULT NULL ,
  `update_user_id` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `trackman`.`tbl_issue` 
-- Note: DEFAULT NULL removed from `project_id` statement as this was illegal.
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trackman`.`tbl_issue` ;

CREATE  TABLE IF NOT EXISTS `trackman`.`tbl_issue` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(256) NOT NULL ,
  `description` VARCHAR(2000) NULL DEFAULT NULL ,
  `project_id` INT NOT NULL  ,
  `type_id` INT NULL DEFAULT NULL ,
  `status_id` INT NULL DEFAULT NULL ,
  `owner_id` INT NULL DEFAULT NULL ,
  `requester_id` INT NULL DEFAULT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL ,
  `create_user_id` INT NULL DEFAULT NULL ,
  `update_time` DATETIME NULL DEFAULT NULL ,
  `update_user_id` INT NULL DEFAULT NULL ,
  -- PRIMARY KEY (`id`) ,
  -- INDEX `fk_issue_project` (`project_id` ASC) ,
  INDEX `fk_issue_project` (`id` ASC) ,
  INDEX `fk_issue_owner` (`owner_id` ASC) ,
  INDEX `fk_issue_requester` (`requester_id` ASC) ,
  CONSTRAINT `fk_issue_project`
    FOREIGN KEY (`id` )
    REFERENCES `trackman`.`tbl_project` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_issue_owner`
    FOREIGN KEY (`owner_id` )
    REFERENCES `trackman`.`tbl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_issue_requester`
    FOREIGN KEY (`requester_id` )
    REFERENCES `trackman`.`tbl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trackman`.`tbl_project_user_assignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trackman`.`tbl_project_user_assignment` ;

CREATE  TABLE IF NOT EXISTS `trackman`.`tbl_project_user_assignment` (
  `project_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL ,
  `create_user_id` INT NULL DEFAULT NULL ,
  `update_time` DATETIME NULL DEFAULT NULL ,
  `update_user_id` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`project_id`, `user_id`) ,
  INDEX `user_id` (`user_id` ASC) ,
  INDEX `fk_project_user` (`project_id` ASC) ,
  CONSTRAINT `fk_project_user`
    FOREIGN KEY (`project_id` )
    REFERENCES `trackman`.`tbl_project` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_user_project`
    FOREIGN KEY (`user_id` )
    REFERENCES `trackman`.`tbl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;