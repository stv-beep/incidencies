create database alojthunberg;

create table incidencies(
id int not null auto_increment,
Titol varchar(255) not null,
nom varchar(30) not null,
cognom varchar(50) not null,
telefon int(20),
correu varchar(100) not null,
comentari varchar(255) not null,
tecnic varchar(100),
Estat varchar(10) not null default 'no resolt',
data_obert date,
data_tancat varchar(50),
primary key(id));