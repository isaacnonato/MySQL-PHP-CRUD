CREATE TABLE people (
    id         INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name  CHAR(50)    NULL,
    allowed    TINYINT(1)  NOT NULL,
    notes      TEXT(100)   NULL
)