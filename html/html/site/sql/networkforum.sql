PRAGMA foreign_keys = ON;


drop table if exists user;

create table user (
    email text PRIMARY KEY,
    username varchar NOT NULL UNIQUE,
    firstname text NOT NULL,
    lastname text NOT NULL,
    age integer CHECK(age>10 AND age<120),
    pwd text NOT NULL, 
    honoraverage integer CHECK(honoraverage>= 0 AND honoraverage<=5),
    totalnumberofrates integer CHECK(totalnumberofrates>=0)
);

drop table if exists forumpost;

create table forumpost (
    postid integer PRIMARY KEY AUTOINCREMENT,
    posttitle text NOT NULL,
    content text CHECK(LENGTH(content)>= 0 AND LENGTH(content)<20000),
    useremail integer REFERENCES user, 
    topic text REFERENCES topic, 
    postrate integer CHECK(postrate>=0 AND postrate <=5),
    forumpostcollection_id integer REFERENCES collection
    );

drop table if exists postevaluation;

create table postevaluation(
    useremail text REFERENCES user,
    postid integer REFERENCES forumpost,
    number integer CHECK(number>=0 AND number<=5)
);

drop table if exists comment;

create table comment(
    commentid integer PRIMARY KEY,
    useremail text REFERENCES user,
    postid integer REFERENCES forumpost NOT NULL,
    content text CHECK(LENGTH(content)>0 AND LENGTH(content)<1000),
    commentrate integer CHECK(commentrate>=0 AND commentrate <=5)

);

drop table if exists commentevaluation;

create table commentevaluation(
    useremail text REFERENCES user,
    commentid integer REFERENCES comment,
    number integer CHECK(number>=0 AND number<=5)
);

drop table if exists commenthistory;

create table commenthistory(
    useremail text REFERENCES user,
    commentid integer REFERENCES comment,
    date integer CHECK(date>=0)
);

drop table if exists collection;

create table collection (
    collectionid integer PRIMARY KEY,
    useremail references user
);

drop table if exists topic;

create table topic(
    name text PRIMARY KEY
);

drop table if exists keyword;

create table keyword(
    name text PRIMARY KEY
);

drop table if exists keywordgroup;

create table keywordgroup(
    name text PRIMARY KEY
);

drop table if exists postkeygroup;

create table postkeygroup(
    postid text REFERENCES forumpost,
    keywordname text REFERENCES keyword,
    groupname text REFERENCES keywordgroup
);
