CREATE TABLE t_student (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(128) NOT NULL,
    grade integer NOT NULL,
    emergency_1 VARCHAR(256) NOT NULL,
    emergency_2 VARCHAR(256) NOT NULL,
    emergency_2 VARCHAR(256) NOT NULL,
);

CREATE TABLE t_teacher (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(128) NOT NULL,
    email VARCHAR(256) NOT NULL,
    phone VARCHAR(256) NOT NULL,
);


CREATE TABLE t_class (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(128) NOT NULL,
    description VARCHAR(256) NOT NULL,
    grade_ranges VARCHAR(64) NOT NULL,
    dates_times VARCHAR(256) NOT NULL,
);
