
-- Create Table
CREATE TABLE users (
    userID INT PRIMARY KEY AUTO_INCREMENT ,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    last_signin DATE CURRENT_DATE()
    )


