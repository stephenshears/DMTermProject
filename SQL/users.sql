CREATE TABLE users ( 

    userID		INT		        AUTO_INCREMENT PRIMARY KEY, 

    username    VARCHAR(50)     NOT NULL UNIQUE,

    email 		VARCHAR(50)	    NOT NULL UNIQUE, 

    passwords   VARCHAR(70)     NOT NULL,

    adminFlag   BOOLEAN         NOT NULL DEFAULT 0

);

INSERT INTO users SET userID = 0, username = 'Admin', email = 'throwaway@gmail.com', passwords = '$2y$10$KEuWEsF7uruhWRpl4zE7BuK2ZjQEfOiO8A0xOPFpRVGZLbxqaa3IO', adminFlag = 1;

/* Admin username and password is Admin and Admin123 respectively */