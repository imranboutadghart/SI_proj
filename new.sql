create table
	products (
		p_id int primary key,
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
		pr_id int primary key,
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
		foreign key pr_id references purchase_rows (pr_id),
		foreign key receipt_id references receipts (receipt_id)
	);
