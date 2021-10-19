CREATE TABLE rating (
rid     INT     PRIMARY KEY,
mtitle      FOREIGN KEY(title)
REFERENCES  movies(title),
blocRating      INT     NOT NULL,
tomatoRating    INT     NOT NULL,
metaRating      INT     NOT NULL
); 