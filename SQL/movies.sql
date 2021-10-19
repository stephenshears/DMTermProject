CREATE TABLE movie (
    title   VARCHAR(100)    PRIMARY KEY,
    releaseDate   DATE   NOT NULL,
    embargo     DATETIME,
    runtime     INT     NOT NULL
);