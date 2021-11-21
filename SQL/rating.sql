CREATE TABLE rating (

ratingID     INT    AUTO_INCREMENT,

movieID     INT,

PRIMARY KEY(movieID, ratingID),

FOREIGN KEY(movieID)

REFERENCES movies(movieID)

ON DELETE CASCADE,

blocRating      FLOAT     NOT NULL,

imdbRating    FLOAT     NOT NULL,

tomatoRating      INT     NOT NULL

); 