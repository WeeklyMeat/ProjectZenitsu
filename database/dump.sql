use ProjectZenitsuDB;

INSERT INTO `user` VALUES (1,'Admin','admin@mail.com','$2y$10$UDmf1W3sE3pqBpdjp3kW8uOUiSt78y.9mU9HR0DcbR1/YLI/Rcz3.','2020-06-11 09:05:00',NULL,'Hi! I\'m the Admin of this website :)',0,'u'),(2,'ExampleUser','example@mail.com','$2y$10$rhNQVAYTAX9MAFOCTQWjVuRyDppphzMIn7tpDkoJ6uR0WOd9GmnIS','2020-06-11 09:15:24',NULL,NULL,0,'u');
INSERT INTO `label` VALUES (1,'Programming','2020-06-11 09:08:21',NULL,'A small forum about Programming',0,2),(2,'Manga','2020-06-11 09:10:25',NULL,'Here you can talk about Mangas :)',0,1),(3,'Politics','2020-06-11 09:10:52',NULL,'A place to discuss politics!',0,1);
INSERT INTO `post` VALUES (1,'I like PHP <3',0,'2020-06-11 09:14:00',1,1,0),(2,'I\'m not interested in politics!',0,'2020-06-11 09:14:50',1,3,0),(3,'I think boku no hero is a good manga :)',0,'2020-06-11 09:20:02',1,2,0),(4,'I\'m very interested in politics!',0,'2020-06-11 09:21:07',2,3,0);
INSERT INTO `comment` VALUES (1,'That\'s sad :c',0,'2020-06-11 09:17:52',2,2,0),(2,'I like C# more, but do your thing man!',0,'2020-06-11 09:18:20',2,1,0);
INSERT INTO `user_follows_label` VALUES (1,1),(1,2),(2,3),(2,1);
INSERT INTO `user_follows_user` VALUES (2,1);