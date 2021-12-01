CREATE TABLE userRatings (
    userID			INT				NOT NULL,
    movieID			INT				NOT NULL,
    username        VARCHAR(60)     NOT NULL,
    ratingDescr		VARCHAR(300)	NOT NULL,
    ratingScore		INT				NOT NULL
    CHECK (ratingScore >= 0 AND ratingScore < 10),
    PRIMARY KEY (userID, movieID),
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
    );