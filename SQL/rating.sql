CREATE TABLE rating (

ratingID     INT    AUTO_INCREMENT,

movieID     INT,

PRIMARY KEY(movieID, ratingID),

FOREIGN KEY(movieID)

REFERENCES  movies(movieID)

ON DELETE CASCADE,

blocRating      INT     NOT NULL,

imdbRating    INT     NOT NULL,

metaRating      INT     NOT NULL

); 