CREATE TABLE movieGenre ( 

movieID	INT, 

genreID	INT, 

PRIMARY KEY (movieID, genreID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID), 

FOREIGN KEY (genreID) REFERENCES genre(genreID) 

); 