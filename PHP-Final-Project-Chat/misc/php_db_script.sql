create database php_project;

CREATE USER 'yevoli'@'localhost' IDENTIFIED BY 'yevoli123';

GRANT ALL ON php_project.* TO 'yevoli'@'localhost' IDENTIFIED BY 'yevoli123';

use php_project;

create table user (
id int AUTO_INCREMENT not null,
username varchar(70) not null,
password nvarchar(255) not null,
firstname varchar(70) not null,
lastname varchar(70) not null,
is_logged_in bit not null,
PRIMARY KEY (id)
);

-- MESSAGES FIRST METHOD
create table message (
id int AUTO_INCREMENT not null,
author_id int not null,
recipient_id int not null,
timestamp datetime not null,
message varchar(300) not null,
is_deleted bit not null,
viewed_by_recipient bit not null,
FOREIGN KEY (author_id) REFERENCES user(id),
FOREIGN KEY (recipient_id) REFERENCES user(id),
PRIMARY KEY (id)
);
-- END OF FIRST METHOD


-- MESSAGES SECOND METHOD START
create table message (
id int AUTO_INCREMENT not null,
author_id int not null,
timestamp datetime not null,
message varchar(300) not null,
is_deleted bit not null,
viewed_by_recipient bit not null,
FOREIGN KEY (author_id) REFERENCES user(id),
PRIMARY KEY (id)
);

create table conversation (
id int AUTO_INCREMENT not null,
user1_id int not null,
user2_id int not null,
message_id int not null,
FOREIGN KEY (user1_id) REFERENCES user(id),
FOREIGN KEY (user2_id) REFERENCES user(id),
FOREIGN KEY (message_id) REFERENCES message(id),
PRIMARY KEY (id)
);
-- END OF SECOND METHOD


--TO BE USED LATER MAYBE
create table friendship (
id int AUTO_INCREMENT not null,
timestamp datetime not null,
user1_id int not null,
user2_id int not null,
FOREIGN KEY (user1_id) REFERENCES user(id),
FOREIGN KEY (user2_id) REFERENCES user(id),
PRIMARY KEY (id)
);

create table post (
id int AUTO_INCREMENT not null,
author_id int not null,
post_content nvarchar(300) not null,
FOREIGN KEY (author_id) REFERENCES user(id),
PRIMARY KEY (id)
);

create table vote (
id int AUTO_INCREMENT not null,
value bit not null,
voter_id int not null,
post_id int not null,
FOREIGN KEY (voter_id) REFERENCES user(id),
FOREIGN KEY (post_id) REFERENCES post(id),
PRIMARY KEY (id)
);

create table comment (
id int AUTO_INCREMENT not null,
comment_content nvarchar(300) not null,
author_id int not null,
post_id int not null,
FOREIGN KEY (author_id) REFERENCES user(id),
FOREIGN KEY (post_id) REFERENCES post(id),
PRIMARY KEY (id)
);


use php;
drop table message;
drop table user;


/**** SELECTING LAST 20 MESSAGES
SELECT * FROM
(
    SELECT TOP 20 *
    FROM messages
    WHERE author_id = @user_id OR author_id = @user_id
    ORDER BY id DESC
) SQ
ORDER BY
     id ASC
*/
