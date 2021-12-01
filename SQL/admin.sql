CREATE TABLE admin ( 
    adminID		INT             PRIMARY KEY, 
    adminName   CHAR(5)         NOT NULL UNIQUE,
    pass      VARCHAR(60)       NOT NULL
); 

INSERT INTO movieblock.admin SET adminID = 0, adminName = 'Admin', pass = '$2y$10$KEuWEsF7uruhWRpl4zE7BuK2ZjQEfOiO8A0xOPFpRVGZLbxqaa3IO';