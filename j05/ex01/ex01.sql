CREATE TABLE db_frahaing.ft_table (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    login CHAR(8) NOT NULL,
    `group` ENUM('staff', 'student', 'other') NOT NULL,
    creation_date DATE NOT NULL
);
