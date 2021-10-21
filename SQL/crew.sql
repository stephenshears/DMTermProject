CREATE TABLE crew ( 

movieID		INT, 

starID		INT, 

jobTitle		VARCHAR(20)		NOT NULL, 

PRIMARY KEY (movieID, starID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID), 

FOREIGN KEY (starID) REFERENCES star(starID) 

); 