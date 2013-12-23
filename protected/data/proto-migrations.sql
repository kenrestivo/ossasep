



drop table if exists language;

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_name` varchar(128) not null,
  `description` varchar(128) not null,
  UNIQUE KEY `code_name` (`code_name`),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



drop table if exists class_description;

CREATE TABLE `class_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext not null,
  `language_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `language_id` (`language_id`),
  UNIQUE KEY `idx_class_description` (`class_id`,`language_id`),
  CONSTRAINT `class_description_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  CONSTRAINT `class_description_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into language set id = 1, code_name = "en-us", description = "English";
insert into language set id = 2, code_name = "es-es", description = "Español";


insert into class_description (language_id, class_id, description) select 1, id, description from class_info;

-- this will be necessary
alter table class_info drop column description;
