DROP TABLE vendor;
DROP TABLE manager;
DROP TABLE band;
DROP TABLE artist;
DROP TABLE agent;

CREATE TABLE agent(
	agent_id INT AUTO_INCREMENT,
	first_name VARCHAR(25) NOT NULL,
	middle_initial VARCHAR(1) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(5) NOT NULL,
	email VARCHAR(50) NOT NULL,
	office_phone VARCHAR(10) NOT NULL,
	cell_phone VARCHAR(10) NOT NULL,
	agent_type VARCHAR(15) NOT NULL,
	PRIMARY KEY(agent_id)
);
INSERT INTO agent
(first_name, middle_initial, last_name, street, city, state, zip, email, office_phone, cell_phone, agent_type)
VALUES 
('Imakeu', 'A', 'Star', '123 Fake St.', 'Springfield', 'IL', '62704', 'ichargealot@gmail.com', '6301234567', '', 'For Artist'), 
('Imakeu', 'A', 'Legend', '456 Scam Blvd.', 'Chicago', 'IL', '60601', 'numba1@gmail.com', '3122589141', '3122589142', 'For Band'),
('Ineeda', 'A', 'Job', '789 Rock Ln.', 'Rosemont', 'IL', '60018', 'plshireme@yahoo.com', '3122589151', '3122589152', 'Other')
;


CREATE TABLE artist(
	artist_id INT AUTO_INCREMENT,
	first_name VARCHAR(25) NOT NULL,
	middle_initial VARCHAR(1) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(5) NOT NULL,
	email VARCHAR(50) NOT NULL,
	cell_phone VARCHAR(10) NOT NULL,
	concert_rate DOUBLE(12,2) NOT NULL,
	agent_id int,
	gender CHAR(1) NOT NULL,
	PRIMARY KEY(artist_id),
	FOREIGN KEY (agent_id) REFERENCES agent(agent_id)
);


CREATE TABLE band(
	band_id INT AUTO_INCREMENT,
	band_name VARCHAR(50) NOT NULL,
	agent_id INT,
	leader VARCHAR(50),
	members VARCHAR(500),
	concert_rate DOUBLE(12,2) NOT NULL,
	speacial_notes VARCHAR(500) NOT NULL,
	PRIMARY KEY(band_id),
	FOREIGN KEY(agent_id) REFERENCES agent(agent_id)
);

CREATE TABLE manager(
	manager_id int AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	phone_number VARCHAR(10) NOT NULL,
	PRIMARY KEY(manager_id)
);


CREATE TABLE vendor(
	vendor_id INT AUTO_INCREMENT,
	vendor_name VARCHAR(25) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(5) NOT NULL,
	vendor_type VARCHAR(25) NOT NULL,
	email VARCHAR(50) NOT NULL,
	representative_name VARCHAR(50) NOT NULL,
	representative_phone_number VARCHAR(10) NOT NULL,
	representative_email VARCHAR(50) NOT NULL,
	speacial_notes VARCHAR(500) NOT NULL,
	PRIMARY KEY(vendor_id)
);



INSERT INTO band VALUES('of Montreal', 0)