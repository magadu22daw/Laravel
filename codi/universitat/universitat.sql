use mysql;
create user 'administrador'@'localhost' identified by "FjeClot23#";
create database universitat;
use universitat;
grant all privileges on universitat.* to 'administrador'@'localhost';
