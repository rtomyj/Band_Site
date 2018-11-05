<<<<<<< HEAD
/*DROP TABLE vendor;
=======
DROP TABLE event;
DROP TABLE vendor;
>>>>>>> 52035775edf74fc170dde3d9b6511b73cec5c291
DROP TABLE location;
DROP TABLE manager;
DROP TABLE band;
DROP TABLE artist;
DROP TABLE agent;
*/
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
INSERT INTO artist
(first_name, middle_initial, last_name, street, city, state, zip, email, cell_phone, concert_rate, agent_id, gender)
VALUES
('Prince', '', '', '7801 Audubon Rd', 'Chanhassen,', 'MN', '55317', 'thelovesymbol@prince.com', '5555551234', 1000.00, 1, 'M'),
('Janelle', '', 'Monae', '1717 Sunshine Rd', 'Kansas City,', 'KS', '55317', 'droid@monae.com', '5555559876', 350.00, 1, 'F');


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
INSERT INTO band
(band_name, agent_id, leader, members, concert_rate, speacial_notes)
VALUES
('of Montreal', '2', 'Kevin Barnes', 'Clayton Rychlik, Jojo Glidewell, Davey Pierce, Nicolas Dobbratz', 30.00, 'Requires lots of booze'),
('Bloc Party', '2', 'Kele Okereke', 'Russell Lissack, Justin Harris, Louise Bartle', 50.00, '');


CREATE TABLE manager(
	manager_id int AUTO_INCREMENT,
	first_name VARCHAR(25) NOT NULL,
	middle_initial VARCHAR(1) NOT NULL,
	last_name VARCHAR(25) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password varchar(25) NOT NULL,
	phone_number VARCHAR(10) NOT NULL,
	PRIMARY KEY(manager_id)
);
INSERT INTO manager
(first_name, middle_initial, last_name, password, email, phone_number)
VALUES
('Javi', '', 'Gomez', '1234', 'test123@icloud.com', '6307546535'),
('Zach', '', 'Dick', '0000', 'itworks@gmail.com', '6304716565');


CREATE TABLE location(
	location_id int AUTO_INCREMENT,
	location_name VARCHAR(50) NOT NULL,
	street VARCHAR(50) NOT NULL,
	city VARCHAR(25) NOT NULL,
	state VARCHAR(2) NOT NULL,
	zip VARCHAR(5) NOT NULL,
	PRIMARY KEY(location_id)
);
INSERT INTO location
(location_name, street, city, state, zip)
VALUES
('Thalia Hall', '1807 S Allport St.', 'Chicago', 'IL', '60608'),
('Aragon Ballroom', '1106 W Lawrence Ave.', 'Chicago', 'IL', '60640'),
('Lincoln Hall', '2424 N Lincoln Ave.', 'Chicago', 'IL', '60614');


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
INSERT INTO vendor
(vendor_name, street, city, state, zip, vendor_type, email, representative_name, representative_phone_number, representative_email, speacial_notes)
VALUES
<<<<<<< HEAD
()
=======
('Stage Master', '167 S Main St', 'Chicago', 'IL', '60608', 'Stage Setup', 'stagemaster@gmail.com', 'Stacy Gwen', '7205734902', 'stacy@gmail.com', ''),
('Stages! Stages!! Stages!!!', '1491 W Central Blvd', 'Chicago', 'IL', '60608', 'Stage Setup', 'stages@gmail.com', 'Stan Roger', '7205736734', 'stanrog11@gmail.com', 'Works only with stages'),
('Concert Equipment Plus', '1451 Circle Ln', 'Chicago', 'IL', '60614', 'Equipment', 'concertequipmentplus@gmail.com', 'Dan Smith', '7208971001', 'dsmith12@gmail.com', ''),
('2 Bright', '1756 W Ogden Ave', 'Chicago', 'IL', '60614', 'Lighting', '2bright@exchange.com', 'Dawn Parks', '7208971391', 'dawnp73@gmail.com', ''),
('I Can\'t Hear You!', '1420 S Taylor St', 'Chicago', 'IL', '60640', 'Sound', 'icanthearyou@exchange.com', 'Bryan Lavery', '7208971332', 'sportsfan1234@gmail.com', ''),
('Speaker Pros', '967 W Roosevelt Rd', 'Chicago', 'IL', '60640', 'Sound', 'speakerpros@exchange.com', 'Becky Craven', '7208975332', 'punkgurl@gmail.com', '');


CREATE TABLE event(
	event_id INT AUTO_INCREMENT,
	artist_id INT,
	band_id INT,
	performer_type CHAR NOT NULL,
	event_name VARCHAR(50) NOT NULL,
	tickets_sold INT NOT NULL,
	date_created DATE NOT NULL,
	event_date DATE NOT NULL,
	start_time TIME NOT NULL,
	event_location INT NOT NULL,
	capacity INT NOT NULL,
	event_manager INT NOT NULL,
	stage_vendor INT,
	equipment_vendor INT,
	lighting_vendor INT,
	sound_vendor INT,
	event_status VARCHAR(25) NOT NULL,
	notes VARCHAR(500),
	PRIMARY KEY(event_id),
	FOREIGN KEY(artist_id) REFERENCES artist(artist_id),
	FOREIGN KEY(band_id) REFERENCES band(band_id),
	FOREIGN KEY(event_location) REFERENCES location(location_id),
	FOREIGN KEY(event_manager) REFERENCES manager(manager_id),
	FOREIGN KEY(equipment_vendor) REFERENCES vendor(vendor_id),
	FOREIGN KEY(lighting_vendor) REFERENCES vendor(vendor_id),
	FOREIGN KEY(sound_vendor) REFERENCES vendor(vendor_id)

);
>>>>>>> 52035775edf74fc170dde3d9b6511b73cec5c291
