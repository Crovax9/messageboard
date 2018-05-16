CREATE  TABLE messageboard.board ( 
    id INT  AUTO_INCREMENT  NOT  NULL  PRIMARY  KEY , 
    title VARCHAR ( 100 ),
    message VARCHAR ( 100 ),
    imageurl VARCHAR (1000),
    created_at TIMESTAMP  NOT  NULL  DEFAULT CURRENT_TIMESTAMP 
);