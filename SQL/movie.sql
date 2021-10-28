CREATE TABLE movie ( 

movieID	INT			AUTO INCREMENT PRIMARY KEY,

title		VARCHAR(60)		NOT NULL    UNIQUE,

budget		INT             NOT NULL    UNIQUE, 

description	VARCHAR(300)	NOT NULL,

releaseDate	DATE			NOT NULL,

runtime	TIME			NOT NULL,

embargo	DATETIME,

cover   VARCHAR(100)

);

ALTER TABLE movie
    ADD CONSTRAINT UNIQUE (title, releaseDate);