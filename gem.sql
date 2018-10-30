DROP TABLE artist;
DROP TABLE agent;

CREATE TABLE agent(
	agent_id INT AUTO_INCREMENT,
	first_name VARCHAR(25) NOT NULL,
	middle_initial VARCHAR(2) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(10) NOT NULL,
	email VARCHAR(25) NOT NULL,
	office_phone INT NOT NULL,
	cell_phone INT NOT NULL,
	agent_type VARCHAR(15) NOT NULL,
	PRIMARY KEY(agent_id)
);


CREATE TABLE artist(
	artist_id INT AUTO_INCREMENT,
	first_name VARCHAR(25) NOT NULL,
	middle_initial VARCHAR(2) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(10) NOT NULL,
	email VARCHAR(25) NOT NULL,
	cell_phone INT NOT NULL,
	concert_rate DOUBLE NOT NULL,
	agent_name VARCHAR(25) NOT NULL,
	gender CHAR(1) NOT NULL,
	PRIMARY KEY(artist_id)
);