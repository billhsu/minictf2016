CREATE USER 'scoreboard'@'localhost' identified by 'chaWuwR3'
CREATE USER 'readonly'@'localhost' identified by 'password'

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)

create table scoreboard(id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY, TEAM VARCHAR(30) NOT NULL, COUNT INT(6) NOT NULL, UPDATED TIMESTAMP DEFAULT now() ON UPDATE now(), UNIQUE(TEAM));

create table team_status(id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY, TEAM VARCHAR(30) NOT NULL, LEVEL VARCHAR(30) NOT NULL, UPDATED TIMESTAMP DEFAULT now() ON UPDATE now());

GRANT ALL PRIVILEGES ON ctf.team_status TO 'scoreboard'@'localhost';
GRANT ALL PRIVILEGES ON ctf.scoreboard TO 'scoreboard'@'localhost';
GRANT SELECT ON ctf.user TO 'readonly'@'localhost';

insert into user(username, password) values('admin', 'ph8WafRa');