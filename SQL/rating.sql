CREATE TABLE rating (

movieID     INT,

PRIMARY KEY(movieID),

FOREIGN KEY(movieID)

REFERENCES movies(movieID)

ON DELETE CASCADE,

blocRating      FLOAT     NOT NULL,

imdbRating    FLOAT     NOT NULL,

tomatoRating      INT     NOT NULL

); 