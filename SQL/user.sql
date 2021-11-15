CREATE TABLE users ( 

userID		INT		        AUTO_INCREMENT PRIMARY KEY, 

username    VARCHAR(50)     NOT NULL UNIQUE,

email 		VARCHAR(50)	    NOT NULL UNIQUE, 

passwords   VARCHAR(70)     NOT NULL

); 