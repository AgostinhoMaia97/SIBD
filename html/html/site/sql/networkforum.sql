PRAGMA foreign_keys = ON;

drop table if exists user;

create table user (
    username text PRIMARY KEY,
    firstname text NOT NULL,
    lastname text NOT NULL,
    age integer CHECK(age>10 AND age<120),
    pwd text NOT NULL, 
    email text NOT NULL
  
);

INSERT into user(username, firstname, lastname, age, pwd, email) VALUES ("maia77", "filipe", "maia", 23, "434235faa527ab5af15d3efd77212c4b064d852a", "filipemaia@gmail.com");
INSERT into user(username, firstname, lastname, age, pwd, email) VALUES ("brunomauricio", "bruno", "mauricio", 22, "95f407c1ffa7689a0a3f2f21b1bf582fe8359351", "brunomauricio@gmail.com");


drop table if exists topic;

create table topic(
    name text PRIMARY KEY
);

INSERT into topic(name) VALUES("SDN");
INSERT into topic(name) VALUES("VPN");
INSERT into topic(name) VALUES("Wireless");



drop table if exists forumpost;

create table forumpost (
    postid integer PRIMARY KEY AUTOINCREMENT,
    posttitle text NOT NULL,
    content text CHECK(LENGTH(content)>= 0 AND LENGTH(content)<20000),
    username text REFERENCES user, 
    published INTEGER, -- date when the article was published in epoch format
    topic text REFERENCES topic, 
    postrate integer CHECK(postrate>=0 AND postrate <=5)
    );

INSERT into forumpost(postid, posttitle, username, published, topic) VALUES (NULL, "SDN rocking!", "maia77", "2020-11-11", "SDN");
INSERT into forumpost(postid, posttitle, username, published, topic) VALUES (NULL, "VPN rocking!", "maia77", "2020-11-12", "VPN");
INSERT into forumpost(postid, posttitle, username, published, topic) VALUES (NULL, "Wireless rocking!", "maia77", "2018-11-11", "Wireless");



drop table if exists postevaluation;

create table postevaluation(
    username text REFERENCES user,
    postid integer REFERENCES forumpost,
    number integer CHECK(number>=0 AND number<=5)
);

INSERT into postevaluation(username, postid, number) VALUES ("maia77", 1, 5);
INSERT into postevaluation(username, postid, number) VALUES ("maia77", 1, 4);
INSERT into postevaluation(username, postid, number) VALUES ("maia77", 2, 4);
INSERT into postevaluation(username, postid, number) VALUES ("maia77", 2, 3);



drop table if exists comment;

create table comment(
    commentid integer PRIMARY KEY,
    username text REFERENCES user,
    postid integer REFERENCES forumpost NOT NULL,
    content text CHECK(LENGTH(content)>0 AND LENGTH(content)<1000),
    published INTEGER, -- date when news item was published in epoch format
    commentrate integer CHECK(commentrate>=0 AND commentrate <=5)

);

drop table if exists commentevaluation;

create table commentevaluation(
    username text REFERENCES user,
    commentid integer REFERENCES comment,
    number integer CHECK(number>=0 AND number<=5)
);

drop table if exists commenthistory;

create table commenthistory(
    username text REFERENCES user,
    commentid integer REFERENCES comment,
    date integer CHECK(date>=0)
);

drop table if exists collection;

create table collection (
    collectionid integer PRIMARY KEY AUTOINCREMENT,
    name text not null,
    username text references user
);


drop table if exists postcollection;

create table postcollection(
 collectionid integer not null references collection,
 forumpostid integer not null REFERENCES forumpost,
PRIMARY KEY(collectionid, forumpostid)  
);
