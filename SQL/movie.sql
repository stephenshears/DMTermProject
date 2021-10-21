CREATE TABLE movie ( 

movieID	INT			AUTO INCREMENT PRIMARY KEY,

title		VARCHAR(60)		NOT NULL,

budget		INT             NOT NULL, 

description	VARCHAR(300)	NOT NULL,

releaseDate	DATE			NOT NULL,

runtime	TIME			NOT NULL,

embargo	DATETIME,

cover   VARCHAR(100)

); 