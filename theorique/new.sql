create table
	products (
		p_id int primary key auto_increment,
		p_image varchar(128),
		p_name varchar(64),
		p_price int
	);
create table
	employee (
		emp_id int primary key,
		emp_name varchar(64)
	);
create table
	purchase_rows (
		pr_id int primary key auto_increment,
		amount int not null,
		product_id int,
		foreign key (product_id) references products (p_id)
	);
create table
	receipts (
		receipt_id int primary key,
		receipt_date datetime default now(),
		emp_id int,
		foreign key emp_id references employee (emp_id)
	);
create table
	receipt_rows (
		pr_id int,
		receipt_id int,
		foreign key(pr_id) references purchase_rows (pr_id),
		foreign key(receipt_id) references receipts (receipt_id)
	);

insert into employee(emp_id, emp_name)
values	(1,"Mr Youness"),
		(2,"Mr Ahmed"),
		(3,"Mr Omar");

insert into products(p_id, p_image, p_name, p_price)
values	(1, "assets/4seasons.jpg"  , "pizza 4seasons", 100),
		(2, "assets/cheese.jpg"    , "pizza cheese", 60),
        (3, "assets/margarita.jpg" , "pizza margarita", 40),
        (4, "assets/peperoni.jpg"  , "pizza peperoni", 60),
        (5, "assets/poulet.jpg"    , "pizza poulet", 80),
        (6, "assets/thon.jpg"      , "pizza thon", 40),
        (7, "assets/vegetarian.jpg", "pizza vegetarian", 50);

