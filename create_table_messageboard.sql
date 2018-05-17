CREATE DATABASE messageboard;

CREATE  TABLE messageboard.board ( 
    id INT  AUTO_INCREMENT  NOT  NULL  PRIMARY  KEY , 
    title VARCHAR ( 100 ),
    message VARCHAR ( 100 ),
    created_at TIMESTAMP  NOT  NULL  DEFAULT CURRENT_TIMESTAMP 
);