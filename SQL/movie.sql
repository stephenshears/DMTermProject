CREATE TABLE movie ( 

movieID	        INT			    AUTO_INCREMENT PRIMARY KEY,

title		    VARCHAR(60)		NOT NULL    UNIQUE,

budget		    INT             NOT NULL, 

description	    VARCHAR(1000)	NOT NULL,

releaseDate	    DATE			NOT NULL,

runtime	        INT			    NOT NULL,

embargo	        DATETIME,

URL             VARCHAR(150)

);

ALTER TABLE movie
    ADD CONSTRAINT UNIQUE (title, releaseDate);