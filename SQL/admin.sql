CREATE TABLE admin ( 

adminID		INT     PRIMARY KEY, 
pass        VARCHAR(20)     NOT NULL
); 

INSERT INTO movieblock.admin SET adminID = 0, pass = 'PASSWORD'