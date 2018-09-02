DROP TABLE if exists USER;
DROP TABLE if exists PRODUCT;
DROP TABLE if exists MANUFACTURER;
DROP TABLE if exists PRODUCT_REVIEW;
DROP TABLE if exists REVIEW;


CREATE TABLE USER (
    id                      INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name                    VARCHAR(20)	NOT NULL,
    gender                  VARCHAR(10) NOT NULL,
    age                     CHAR(3) NOT NULL
);

CREATE TABLE MANUFACTURER (
id	                                    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
manufacturer_name			            VARCHAR(20)	NOT NULL,
manufacturer_country	                VARCHAR(10)
);

CREATE TABLE PRODUCT (
id	                        INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
product_name			    VARCHAR(20)	NOT NULL,
product_type                VARCHAR(20) NOT NULL,
manufacturer_id             INT(3),
FOREIGN KEY (manufacturer_id )  REFERENCES MANUFACTURER(id)
);

CREATE TABLE PRODUCT_REVIEW (
product_id                  INTEGER NOT NULL,
review_id                   INTEGER NOT NULL,

PRIMARY KEY (product_id, review_id),
FOREIGN KEY (product_id) REFERENCES PRODUCT(id)
FOREIGN KEY (review_id) REFERENCES REVIEW(id)
);

CREATE TABLE REVIEW(
id                           INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
product_id                   INT(3),
user_id                      INT(3),
review_detail                text default '',
review_date                  VARCHAR(20),
rate                         INT(1),

FOREIGN KEY (product_id) REFERENCES PRODUCT(id)
FOREIGN KEY (user_id) REFERENCES USER(id)
);


INSERT INTO USER VALUES (null,	'Amy',		'Female',	41);
INSERT INTO USER VALUES (null,	'Bob',		'Male',		22);
INSERT INTO USER VALUES (null,	'Candy',	'Female',	63);
INSERT INTO USER VALUES (null,	'Dina',		'Female',	14);
INSERT INTO USER VALUES (null,	'Edwin',	'Male',		15);
INSERT INTO USER VALUES (null,	'Frank',	'Male',		16);
INSERT INTO USER VALUES (null,	'Gigi',		'Female',	27);
INSERT INTO USER VALUES (null,	'Helen',	'Female',	48);
INSERT INTO USER VALUES (null,	'Ivy',		'Female',	59);
INSERT INTO USER VALUES (null,	'Jacky',	'Male',		10);
INSERT INTO USER VALUES (null,	'Kelly',	'Female',	11);
INSERT INTO USER VALUES (null,	'Louis',	'Male',		12);
INSERT INTO USER VALUES (null,	'Lily',		'Female',	13);
INSERT INTO USER VALUES (null,	'Mary',		'Female',	14);
INSERT INTO USER VALUES (null,	'Nancy',	'Female',	16);


INSERT INTO MANUFACTURER VALUES (null,	'Apple',	'America');
INSERT INTO MANUFACTURER VALUES (null,	'Samsung',	'Korea');
INSERT INTO MANUFACTURER VALUES (null,	'Huawei',	'China');
INSERT INTO MANUFACTURER VALUES (null,	'Oppo',	    'China');
INSERT INTO MANUFACTURER VALUES (null,	'Canon',	'Japan');
INSERT INTO MANUFACTURER VALUES (null,	'Sony',	    'Japan');


INSERT INTO PRODUCT VALUES (null,	'Apple iPhone X',		'mobile phone',    1);
INSERT INTO PRODUCT VALUES (null,	'Samsung Galacy 9',		'mobile phone',    2);
INSERT INTO PRODUCT VALUES (null,	'Oppo X21',		        'mobile phone',    4);
INSERT INTO PRODUCT VALUES (null,	'Apple iPhone 5',		'mobile phone',    1);
INSERT INTO PRODUCT VALUES (null,	'Huawei mate 10',		'mobile phone',    3);
INSERT INTO PRODUCT VALUES (null,	'Apple  Macbook',	         ' labtop',    1);
INSERT INTO PRODUCT VALUES (null,	'Canon EOS 750D',		      'camera',    5);
INSERT INTO PRODUCT VALUES (null,	'Sony ILCE-7M3',		      'camera',    6);

INSERT INTO PRODUCT_REVIEW VALUES (1,		1);
INSERT INTO PRODUCT_REVIEW VALUES (2,		2);
INSERT INTO PRODUCT_REVIEW VALUES (3,		5);
INSERT INTO PRODUCT_REVIEW VALUES (4,		1);
INSERT INTO PRODUCT_REVIEW VALUES (5,		4);
INSERT INTO PRODUCT_REVIEW VALUES (6,		2);
INSERT INTO PRODUCT_REVIEW VALUES (7,		2);
INSERT INTO PRODUCT_REVIEW VALUES (8,		1);
INSERT INTO PRODUCT_REVIEW VALUES (9,		3);
INSERT INTO PRODUCT_REVIEW VALUES (10, 	    6);


INSERT INTO REVIEW VALUES (null,  5,  6,    "I bought this phone about a month ago and it is amazing.", "23-8-2017",    5);
INSERT INTO REVIEW VALUES (null,  6,  2,    "it very fast and this is the best labtop that I never have.",  "23-9-2018",    2);
INSERT INTO REVIEW VALUES (null,  4,  7,    "I bought this phone today and have to say that it has exceeded my expectations.",  "10-8-2017",    4);
INSERT INTO REVIEW VALUES (null,  8,  9,    "I wasn't expecting much for the price point but this a fantastic camera and is value for money.",  "23-3-2018",    4);
INSERT INTO REVIEW VALUES (null,  3,  11,   "It works perfect, very fast and comfortable, very easy to use.",   "25-10-2017",    2);
INSERT INTO REVIEW VALUES (null,  2,  4,    "I bought the phone yesterday and have loved it since, the screen is great and the ui is fantastic.",   "23-5-2018",    3);
INSERT INTO REVIEW VALUES (null,  1,  3,    "Bought this a couple of weeks ago and have been enjoying it.", "2-5-2017",    5);
INSERT INTO REVIEW VALUES (null,  5,  15,   "Purchased last month. The build quality is top notch. Display is bright & clear.", "23-9-2018",    5);
INSERT INTO REVIEW VALUES (null,  7,  10,   "best quality photo, and really good for company or advertising companies.",    "13-3-2017",    4);
INSERT INTO REVIEW VALUES (null,  6,  1,    "it is really good for work.",  "13-4-2018",    5);
