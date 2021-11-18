CREATE TABLE moviegenre ( 

movieID	INT, 

genreID	INT, 

PRIMARY KEY (movieID, genreID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID), 

FOREIGN KEY (genreID) REFERENCES genre(genreID)

); 

ALTER TABLE moviegenre
DROP FOREIGN KEY `movieID`,
DROP FOREIGN KEY `genreID`

ALTER TABLE moviegenre
ADD CONSTRAINT `movieID`
FOREIGN KEY(`movieID`)
REFERENCES `movie` (`movieID`)
ON DELETE CASCADE,
ADD CONSTRAINT `genreID`
FOREIGN KEY(`genreID`)
REFERENCES `genre` (`genreID`)
ON DELETE CASCADE