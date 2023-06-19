create database products_details;
use  products_details;
create table products(
id int auto_increment,
product_name varchar(255),
product_image varchar(255),
model_no varchar(255),
product_price int,
brand_name varchar(255),
manufacture_date DATE,
available_stock int,
primary key (id),
created_at timestamp ,
updated_at timestamp
)