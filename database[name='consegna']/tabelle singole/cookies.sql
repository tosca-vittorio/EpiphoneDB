create table cookies
(
  id integer AUTO_INCREMENT PRIMARY KEY,
  hash varchar(255) not null,
  user integer not null,
  expires bigint not null,
  FOREIGN KEY(user) REFERENCES users(id) on delete cascade on update cascade
);
