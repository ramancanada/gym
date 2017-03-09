CREATE SCHEMA `Gym` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;



CREATE  TABLE `Gym`.`program` (
  `program_id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` VARCHAR(4) NOT NULL ,
  `program_name` VARCHAR(45) NOT NULL ,
  `program_days` VARCHAR(13) NULL ,
  `program_begin_time` VARCHAR(5) NULL ,
  `program_end_time` VARCHAR(5) NULL ,
  `is_opened` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`program_id`, `category_id`) );

INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Belly Dancing', '1,3,5', '18:00', '20:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Body Blast', '2,4', '18:00', '20:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Group Cycling', '1,3,5', '20:00', '22:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Hip Hop B-Boying', '2,4', '20:00', '22:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Physioball', '1,3,5', '22:00', '23:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Sculptiing with Weghts', '2,4', '22:00', '23:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0001', 'Salsa Dancing', '1,2,3,4,5,6,7', '18:00', '24:00', 'N');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0002', 'Training #1', '1,3,5', '18:00', '20:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0002', 'Training #2', '2,4', '18:00', '20:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0002', 'Training #3', '1,3,5', '20:00', '22:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0002', 'Training #4', '2,4', '20:00', '22:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0002', 'Training #5', '1,2,3,4,5,6,7', '18:00', '24:00', 'N');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0003', 'Yoga #1', '1,2,3,4,5,6,7', '18:00', '20:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0003', 'Yogo #2', '1,2,3,4,5,6,7', '20:00', '22:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0004', 'Aerobics #1', '1,2,3,4,5,6,7', '08:00', '09:00', 'Y');
INSERT INTO `Gym`.`program` (`category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`) VALUES ('0004', 'Aerobics #2', '1,2,3,4,5,6,7', '09:00', '10:00', 'Y');


