CREATE TABLE t_student (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(128) NOT NULL,
    grade integer NOT NULL,
    emergency_1 VARCHAR(256) NOT NULL,
    emergency_2 VARCHAR(256) ,
    emergency_3 VARCHAR(256) 
);

CREATE TABLE t_teacher (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(128) NOT NULL,
    email VARCHAR(256),
    phone VARCHAR(256)
);


CREATE TABLE t_class (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(128) NOT NULL,
    description longtext,
    min_grade_allowed int not null,
    max_grade_allowed int not null,
    dates_times VARCHAR(256),
    cost decimal(19,2),
    max_students int
);

CREATE TABLE t_check (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    amount decimal(19,2) not null,
    payer VARCHAR(128) NOT NULL,
    check_num int
);


CREATE TABLE t_deposit (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    amount decimal(19,2) not null,
    deposit_date date not null
);



