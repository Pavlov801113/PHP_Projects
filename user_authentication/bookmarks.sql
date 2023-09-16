CREATE DATABASE bookmarks;
USE bookmarks;
CREATE TABLE user(
    username varchar(16) PRIMARY KEY,
    passwd char(40) NOT NULL,
    email varchar(100) NOT NULL
);
CREATE TABLE bookmark(
    username varchar(16) NOT NULL,
    bm_URL varchar(255) NOT NULL,
    INDEX (username),
    INDEX (bm_URL)
);
GRANT SELECT, INSERT, UPDATE, DELETE ON bookmarks.* TO root@localhost identified BY '';