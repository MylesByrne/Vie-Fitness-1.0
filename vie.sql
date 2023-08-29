GRANT ALL ON vie_fitness.* to 'root'@'localhost';
CREATE DATABASE vie_fitness;
USE vie_fitness;

CREATE TABLE users (
    users_id INTEGER AUTO_INCREMENT,
    PRIMARY KEY(users_id),
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    username VARCHAR(15) NOT NULL,
    pword VARCHAR(15) NOT NULL,
    sex CHAR(1) NOT NULL,
    height SMALLINT NOT NULL,
    birth_date DATE NOT NULL,
    current_points INT DEFAULT 0,
    bodyfat_pct INT DEFAULT -1,
    last_login DATE NOT NULL,
    current_weight INT NOT NULL,
    point_multiplier FLOAT DEFAULT 1,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE groups(
    g_id INTEGER AUTO_INCREMENT,
    PRIMARY KEY(g_id) ,
    g_name VARCHAR(15) NOT NULL,
    g_start_date DATE NOT NULL,
    g_end_date DATE NOT NULL,
    admin_uid INT,
    FOREIGN KEY(admin_uid) references users(users_id)
);

CREATE TABLE participates_in(
     u_id INT NOT NULL,
     g_id INT NOT NULL,
     FOREIGN KEY (u_id) REFERENCES users(users_id),
     FOREIGN KEY (g_id) REFERENCES groups(g_id)
);

CREATE TABLE strength_logs(
    log_id INTEGER AUTO_INCREMENT,
    s_date DATE NOT NULL,
    e_name VARCHAR(9) NOT NULL,
    s_value INT NOT NULL,
    reps INT NOT NULL,
    uid_s INT,
    FOREIGN KEY (uid_s) references users(users_id),
    PRIMARY KEY(log_id)
);

CREATE TABLE weight_logs(
    log_id INTEGER AUTO_INCREMENT,
    w_date DATE NOT NULL,
    w_value INT NOT NULL,
    uid_w INT,
    FOREIGN KEY (uid_w) references users(users_id),
    PRIMARY KEY(log_id)
);

CREATE TABLE conditioning_logs(
    log_id INTEGER AUTO_INCREMENT,
    c_date DATE NOT NULL,
    c_name VARCHAR(9) NOT NULL,
    c_value INT NOT NULL,
    uid_c INT,
    FOREIGN KEY (uid_c) references users(users_id),
    PRIMARY KEY(log_id)
);

INSERT INTO users(fname, lname, username, pword, sex, height, birth_date, bodyfat_pct, last_login, current_weight, email)
VALUES 
( "Myles", "Byrne", "mylesbyrne01", "charlie", "M", "72", "2000-06-01",  20, "2021-11-29", 198, "a@gmail.com"),
( "Tom", "Moloney", "tommybuns21", "echo", "M", "74", "2000-10-05",  18, "2021-11-27", 188,  "b@gmail.com"),
( "Mark", "Downey", "Markymark", "Alpha", "M", "67", "2001-08-01",  13, "2021-11-26", 150,  "c@gmail.com"),
( "Kevin", "Compton", "Compton", "Bravo", "M", "68", "2001-06-01",  16, "2021-11-25", 175,  "d@gmail.com"),
( "Kevin", "Barnes", "Kbarnes01", "Delta", "M", "72", "2001-07-16",  22, "2021-11-24", 190,  "e@gmail.com"),
( "Joe", "Miggs", "Joeymiggs", "foxtrot", "M", "65", "2000-12-06",  17, "2021-11-23", 155,  "f@gmail.com"),
( "Mason", "Domico", "MasonD", "Romero", "M", "73", "2000-11-14",  16, "2021-11-22", 150,  "g@gmail.com"),
( "Kenny", "Solosky", "Kdog", "Quebec", "M", "69", "2002-10-11",  22, "2021-11-21", 170,  "h@gmail.com"),
( "Colin", "Giombetti", "Cdog", "Golf", "M", "71", "2000-05-22",  16, "2021-11-20", 160,  "i@gmail.com"),
( "Matthew", "Ray", "Mray12", "Kilo", "M", "66", "2000-08-13",  19, "2021-11-19", 162,  "j@gmail.com"),
( "Matthew", "Saba", "Msaba", "India", "M", "73", "2000-02-01",  18, "2021-11-18", 200,  "k@gmail.com"),
( "Kieran", "Connor", "Kman12", "lima", "M", "67", "2000-09-16",  20, "2021-11-17", 154,  "l@gmail.com"),
( "Sarah", "Lubicich", "Sluby", "zulu", "F", "56", "2000-11-16",  19, "2021-11-16", 105,  "m@gmail.com"),
( "Jillbert", "Kelly", "Jill", "Yankee", "F", "55", "2000-10-14",  21, "2021-11-15", 112,  "n@gmail.com"),
( "Michaela", "Byrne", "Mb2019", "Juliet", "F", "55", "1997-10-01",  22, "2021-11-14", 120,  "o@gmail.com");


INSERT INTO groups (g_name, g_start_date, g_end_date , admin_uid)
VALUES
( "Guzman", "2021-11-29", "2021-12-29", 1),
( "Mcdermont", "2021-11-29", "2022-01-29", 4),
( "Mcvinny", "2021-11-29", "2022-01-29", 2);

INSERT INTO participates_in VALUES
(2,1),
(1,1),
(3,2),
(4,1),
(5,3),
(6,2),
(7,2),
(8,3),
(3,3),
(9,1),
(10,3),
(11,2),
(12,3),
(13,3),
(8,2),
(10,1),
(9,2),
(1,2),
(14,2),
(14,1),
(3,3),
(15,3);

INSERT INTO conditioning_logs(c_date,c_name, c_value, uid_c) VALUES
( '2021-11-28', "Tredmill", "20", 13),
( '2021-11-27', "bike", "22", 12),
( '2021-11-26', "bike", "25", 12),
( '2021-11-25', "stair", "30", 11),
( '2021-11-24', "walk", "40", 1),
( '2021-11-23', "run", "60", 1),
( '2021-11-22', "bike", "33", 10),
( '2021-11-21', "olyptical", "23", 8),
( '2021-11-20', "bike", "22", 3),
( '2021-11-19', "run", "28", 3),
( '2021-11-18', "walk", "22", 2);

INSERT INTO strength_logs(s_date,e_name,s_value,reps,uid_s) VALUES

( '2021-11-29', "benchpress", 225, 3, 1),
( '2021-11-28', "OHP", 135, 5, 2),
( '2021-11-27', "benchpress", 225, 4, 2),
( '2021-11-26', "pullup", 0, 10, 6),
( '2021-11-25', "deadlift", 300, 3, 2),
( '2021-11-24', "deadlift", 315, 3, 6),
( '2021-11-23', "pullup", 25, 8, 10),
( '2021-11-22', "benchpress", 225, 10, 12),
( '2021-11-21', "pushdown", 35, 19, 7),
( '2021-11-19', "shoulder press", 115, 3, 8),
( '2021-11-18', "pushups", 45, 8, 9),
( '2021-11-17', "row", 135, 10, 10);

INSERT INTO weight_logs(w_date, w_value, uid_w) VALUES
( '2021-11-29', 150, 1),
( '2021-11-28', 197, 2),
( '2021-11-27', 196, 3),
( '2021-11-26', 195, 4),
( '2021-11-25', 194, 4),
( '2021-11-24', 193, 5),
( '2021-11-23', 192, 1),
( '2021-11-22', 191, 6),
( '2021-11-21', 190, 7),
( '2021-11-19', 188, 8),
( '2021-11-18', 189, 9),
( '2021-11-29', 185, 10);