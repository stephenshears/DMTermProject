CREATE TABLE movieCompany ( 

movieID	INT, 

compID	INT, 

PRIMARY KEY (movieID, compID), 

FOREIGN KEY (movieID) REFERENCES movie(movieID), 

FOREIGN KEY (compID) REFERENCES productionCompany(compID) 

); 