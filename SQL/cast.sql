CREATE TABLE cast ( 

movieID		INT, 

starID		INT, 

characterName	VARCHAR(40)		NOT NULL, 

PRIMARY KEY (movieID, starID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID), 

FOREIGN KEY (starID) REFERENCES star(starID) 

); 