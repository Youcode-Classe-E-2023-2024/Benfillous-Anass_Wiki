create table category
(
    category_id int auto_increment
        primary key,
    category    varchar(50) null
);

create table tag
(
    tag_id int auto_increment
        primary key,
    tag    varchar(50) null
);

create table users
(
    user_id  int auto_increment
        primary key,
    username varchar(50)                               null,
    email    varchar(50)                               null,
    password varchar(250)                              null,
    picture  varchar(50)                               null,
    role     enum ('admin', 'author') default 'author' not null
);

create table wiki
(
    wiki_id      int auto_increment
        primary key,
    title        varchar(50)          null,
    content      varchar(100)         null,
    creator      int                  null,
    category_id  int                  null,
    archived     tinyint(1) default 0 null,
    created_date bigint               null,
    updated_date bigint               null,
    constraint wiki_ibfk_1
        foreign key (creator) references users (user_id)
            on update cascade on delete cascade,
    constraint wiki_ibfk_2
        foreign key (category_id) references category (category_id)
            on update cascade on delete cascade
);

create index category_id
    on wiki (category_id);

create index creator
    on wiki (creator);

create table wiki_tag
(
    wiki_id int null,
    tag_id  int null,
    constraint wiki_tag_ibfk_1
        foreign key (wiki_id) references wiki (wiki_id)
            on update cascade on delete cascade,
    constraint wiki_tag_ibfk_2
        foreign key (tag_id) references tag (tag_id)
            on update cascade on delete cascade
);

create index tag_id
    on wiki_tag (tag_id);

create index wiki_id
    on wiki_tag (wiki_id);

