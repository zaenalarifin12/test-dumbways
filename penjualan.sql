create database penjualan_sepeda;

create table users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(120),
    password TEXT
);

create TABLE merk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(100)
);

create TABLE cycle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price INT,
    stock INT,
    image VARCHAR(150),
    id_merk INT,
    FOREIGN KEY (id_merk) REFERENCES merk(id)
);


INSERT INTO merk (name) VALUES 
("Wimcycle"),
("Polygon"),
("United"),
("Odessy");

insert into cycle (name, price, stock, image, id_merk) VALUES 
("Xquarone EX9 2019",           102000000,  12, "image1", 2),
("XQUARONE EX9 SRAM XX1",       102000000,  2, "image1", 2),
("Collosus DH9 Team Edition",   100000000,  4, "image1", 2),
("XQUARONE EX9 Shimano XTR",    93000000,   34, "image1", 2), 

("MTB Hotrod 3.0",      3820000,   13,    "image1", 1) ,
("MTB Fatman",          3650000,   3,     "image1", 1) ,
("MTB Hotrod 3.0",      3600000,   4,     "image1", 1) ;

