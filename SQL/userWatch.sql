CREATE TABLE userWatch ( 

userID		INT, 

movieID	INT, 

PRIMARY KEY (userID, movieID), 

FOREIGN KEY (userID) REFERENCES user(userID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID) 

); 