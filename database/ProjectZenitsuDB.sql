create database ProjectZenitsuDB;

/*create user 'ProjectZenitsuDB_User'@'localhost' identified by '1234';
grant update, insert, delete, select on ProjectZenitsuDB.* to ProjectZenitsuDB_User;*/

use ProjectZenitsuDB;

create table user(

    id_user int not null auto_increment primary key,
    username varchar(63) not null unique,
    email varchar(255) not null unique,
    password varchar(255),
    creation_time timestamp default current_timestamp,
    avatar_location varchar(127),
    biography varchar(255),
    role char not null default 'u'
);

create table label(

    id_label int not null auto_increment primary key,
    name varchar(127) not null unique,
    is_deleted tinyint(1) not null default 0,
    follower_count int default 0
);

create table user_follows_label(

    id_user int not null,
    id_label int not null,
    constraint id_user_ufl foreign key (id_user) references user(id_user),
    constraint id_label_ufl foreign key (id_label) references label(id_label)
);

create table post(

    id_post int not null auto_increment primary key,
    content varchar(255) not null,
    like_count int default 0,
    creation_time timestamp default current_timestamp,
    id_user int not null,
    id_label int not null,
    is_deleted tinyint(1) default 0,
    constraint id_user_p foreign key (id_user) references user(id_user),
    constraint id_label_p foreign key (id_label) references label(id_label)
);

create table user_likes_post(

    id_user int not null,
    id_post int not null,
    constraint id_user_ulp foreign key (id_user) references user(id_user),
    constraint id_post_ulp foreign key (id_post) references post(id_post)
);

create table comment(

    id_comment int not null auto_increment primary key,
    content varchar(255) not null,
    like_count int default 0,
    creation_time timestamp default current_timestamp,
    id_user int not null,
    id_post int not null,
    is_deleted tinyint(1) default 0,
    constraint id_user_c foreign key (id_user) references user(id_user),
    constraint id_post_c foreign key (id_post) references post(id_post)
);

create table user_likes_comment(

    id_user int not null,
    id_comment int not null,
    constraint id_user_ulc foreign key (id_user) references user(id_user),
    constraint id_comment_ulc foreign key (id_comment) references comment(id_comment)
);

create table user_follows_user(

    id_user_following int not null,
    id_user_followed int not null,
    constraint id_user_following foreign key (id_user_following) references user(id_user),
    constraint id_user_followed foreign key (id_user_followed) references user(id_user)
);

/* Triggers */

delimiter $$

/* Increments */

create trigger post_like_increment after insert on user_likes_post
for each row
begin
    update post set like_count = like_cunt + 1 where id_post = new.id_post;
end$$

create trigger comment_like_increment after insert on user_likes_comment
for each row
begin
    update comment set like_count = like_cunt + 1 where id_comment = new.id_comment;
end$$

create trigger label_follower_increment after insert on user_follows_label
for each row
begin
    update label set follower_count = follower_count + 1 where id_label = new.id_label;
end$$

/* Decrements */

create trigger post_like_decrement after delete on user_likes_post
for each row
begin
    update post set like_count = like_cunt - 1 where id_post = old.id_post;
end$$

create trigger comment_like_decrement after delete on user_likes_comment
for each row
begin
    update comment set like_count = like_cunt - 1 where id_comment = old.id_comment;
end$$

create trigger label_follower_decrement after delete on user_follows_label
for each row
begin
    update label set follower_count = follower_cunt - 1 where id_label = old.id_label;
end$$

delimiter ;